$(document).ready(function(e) {
	
	$("#uploadimage").on('submit',(function(e) {
		e.preventDefault();
		
		$('#loading').show();
		$("#message").empty();

		$.ajax({
			url: "StoreImage.php", 	  // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
				$('#loading').hide();
				$("#message").html(data);
			}
		});
	}));
	
	$("#downloadimage").on('submit',(function(e) {
		e.preventDefault();
		
		$('#dloading').show();
		
		var form = this;
		var json = ConvertFormToJSON(form);

		$.ajax({
			url: "RetrieveImage.php", // Url to which the request is send
			type: "GET",             // Type of request to be send, called as method
			data: json, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			dataType: "html",
			success: function(data)   // A function to be called if request succeeds
			{
				$('#dloading').hide();
				$('#image_show').html(data); //Can also use .append here
			}
		});
	}));
	
	function ConvertFormToJSON(form)
	{
		 var array = jQuery(form).serializeArray();	
		 var json = {};
		    
		 $.each(array, function() {
		        json[this.name] = this.value || '';
		    });
		    
		 return json;
	}

	$("#file").change(function() {
	
		$("#message").empty(); // To remove the previous error message
		var file = this.files[0];
		var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];

		if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
		{
			$('#previewing').attr('src','noimage.png');
			$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
			return false;
		}
		else	
		{
			var reader = new FileReader();
			reader.readAsDataURL(this.files[0]);
			reader.onload = imageIsLoaded;
		}
	});

	function imageIsLoaded(e) 
	{
		$("#file").css("color","green");
		$('#previewImg').attr('src', e.target.result); //e.target == this (FileReader Object)
		$('#previewImg').attr('width', '200px');
		$('#previewImg').attr('height', '200px');
	};
});//End document.ready