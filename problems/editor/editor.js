function resetEditor() {
	$(".previewWrapper").html("");
	$(".editorForm").each(function() { this.reset(); });
	$("#getProblemID").val("");
	$("h1").show();
	$(".editorFormWrapper").children().not("h2").hide();
	$(".editorFormWrapper").show();
	$("#resetButton").hide();
	$(".editorFormWrapper h2").on({
		mouseenter: function() {
			$(this).css("color", "blue");
			$(this).css("cursor", "pointer");
		},
		mouseleave: function() {
			$(this).css("color", "black");
			$(this).css("cursor", "default");
		}
	});
	$("#deleteProblemID").val("");
	$(".removeImageButton").click();
	$(".imageAction").val("0");
}

function grabProblem(id) {
	$.ajax({
		type : "GET",
		url : "/php/getProblemAsJSON.php",
		data : "id=" + id + "&addType=id",
		dataType : "json",
		success : function(problem) {
			var form = $("#editProblemForm");
			// TODO: clear out current values before refilling them from database
			form.siblings().addBack().show();
			$("#problemIDLabel").text(problem.id);
			form.find("[name=problemID]").val(problem.id);
			form.find("[name=title]").val(problem.title);

			// Put the problem and solution text in the textarea and resize
			form.find("[name=probText]").val(problem.probtext);
			form.find("[name=solText]").val(problem.soltext);
			autosize.update($("#editProblemForm textarea"));

			form.find("[name=probImageSize]").val(problem.probimagesize);

			// Set the values for the image uploads
			// TODO: Set image sizing to visible / invisible
			if (problem.probimage) {
				form.find("#editProbImageLabel").text("Current image on server");
			} else {
				form.find("#editProbImageLabel").text("No image");
			}

			
			if (problem.solimage) {
				form.find("#editSolImageLabel").text("Current image on server");
			} else {
				form.find("#editSolImageLabel").text("No image");
			}

			// if there is already an image, set the value in the form
			form.find("[name=originalProbImage]").val(problem.originalProbImage);
			form.find("[name=originalSolImage]").val(problem.originalSolImage);

			// Check any tags that are already set to the problem
			for (var i = 0; i < problem.tags.length; i++) {
				$("input[name=" + problem.tags[i] + "]")[0].checked = true;
				//console.log(problem.tags[i]);
			}

			// Show preview
			showPreview(form);

			//console.log(problem);
		},
		error : function(msg) {
			console.log(msg);
		}
	});
}

function showPreview(form) {
	var previewDiv = form.siblings(".previewWrapper");
	var problemID = form.find("[name=problemID]").val();
	var title = form.find("[name=title]").val();
	var probText = form.find("[name=probText]").val();
	var probImage = form.find("[name=probImage]")[0];
	var solText = form.find("[name=solText]").val();
	var solImage = form.find("[name=solImage]")[0];
	var originalProbImage = form.find("[name=originalProbImage]").val();
	var originalSolImage = form.find("[name=originalSolImage]").val();

	// Figure out how to handle the image inputs
	//probImageInput.val();
	// console.log(form.find("[name=solImage]").val());
	previewDiv.html("<span id=\"previewTitle\"></span>"
			+ "<p id=\"previewProbText\"></p>"
			+ "<p id=\"previewSolText\"></p>");
	$("#previewTitle").html(problemID + " &ndash; <b>" + title + "</b>");
	$("#previewProbText").html(probText);
	$("#previewSolText").html(solText);

	if (form.find("[name=probImageAction]").length == 0 || form.find("[name=probImageAction]")[0].value != "-1") {
		if (probImage.files && probImage.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$("<img src=" + e.target.result + ">").insertAfter("#previewProbText");
			};
			reader.readAsDataURL(probImage.files[0]);
		} else if (originalProbImage) {
			$("<img src=" + originalProbImage + ">").insertAfter("#previewProbText");
		}
	}

	if (solImage.files && solImage.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$("<img src=" + e.target.result + ">").insertAfter("#previewSolText");
		};
		reader.readAsDataURL(solImage.files[0]);
	} else if (originalSolImage) {
		$("<img src=" + originalSolImage + ">").insertAfter("#previewSolText");
	}

	previewDiv.children("p").each(function() {
		MathJax.Hub.Queue(["Typeset", MathJax.Hub, this]);
	});

}

var refreshSn = function () {
	var time = 60000;
	settimeout( function() {
		$.ajax({
			url: "refresh_session.php",
			cache: false,
			complete: function() { refreshSn(); }
		});
		console.log("I refreshed!");
	},
	time
	);
};

$(document).ready(function() {
	$(".editorFormWrapper h2").click(function() {
		$("h1").hide();
		$(this).mouseleave();
		$(this).off("mouseenter mouseleave");
		$(".editorFormWrapper").not($(this).parent()).hide();
		
		// For the edit/delete form, just show the button to get a problem
		if ($(this).siblings("form").length && $(this).siblings("form")[0].id == "editProblemForm") {
			$("#problemSelector").show();
		} else {
			$(this).siblings().show();
		}
		$("#resetButton").show();
	});

	$("#grabProblemButton").click(function() {
		$(this).parent().next()[0].reset();
		$(".imageAction").val("0");
		grabProblem($("#getProblemID").val());
	});

	// Enter key functionality for editProblemForm
	$("#getProblemID").keyup(function(event) {
		if (event.which == 13) { grabProblem($(this).val()); }
	});


	$(".previewButton").click( function() {
		showPreview($(this).prev("form"));
	});

	// The textarea resize that actually works!
	// Courtesy of http://www.jacklmoore.com/autosize/
	autosize($(".editorForm textarea"));

	$("#resetButton").click(resetEditor);
	resetEditor();

	$(".clearFormButton").click(function() {
		var form = $(this).closest("form")[0];
		form.reset();
		$(form).siblings(".previewWrapper").html("");
	});

	$("#addProblemForm").submit(function(event) {
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "addProblem.php",
			type: "POST",
			data: formData,
			dataType: "json",
			cache: false,
			contentType: false,
			processData: false
		}).done(function(result) {
			if (result.success) { resetEditor(); }
			alert(result.message);
		});

	});

	$("#editProblemForm").submit(function(event) {
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "editProblem.php",
			type: "POST",
			data: formData,
			dataType: "json",
			cache: false,
			contentType: false,
			processData: false
		}).done(function(result) {
			if (result.success) { resetEditor(); }
			alert(result.message);
		});
	});

	$("#deleteProblemButton").click(function() {
		$.ajax({
			url: "deleteProblem.php",
			type: "POST",
			data: { problemID: $("#deleteProblemID").val() },
			dataType: "json"
		}).done(function(result) {
			if (result.success) { resetEditor(); }
			alert(result.message)
		});
	});

	$(".selectImageButton").click(function() {
		$(this).prev().click();
	});

	$(".imageInput").change(function() {
		var fileName = $(this).val();
		$(this).siblings("span").text(fileName.split("\\").pop());
		$(this).siblings(".imageAction").val("1");
	});

	$(".removeImageButton").click(function() {
		$(this).siblings(".imageAction").val("-1");
		var fileElement = $(this).siblings(".imageInput");
		// For some reason, you need to `reinitialize' the input element,
		// so you can't just write fileElement.val('')...
		fileElement.replaceWith($(this).siblings(".imageInput").val('').clone(true));
		$(this).siblings("span").text("No Image");
	});

	setInterval(function() { $.post('refresh_session.php'); }, 600000);

});

