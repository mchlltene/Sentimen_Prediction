// A $( document ).ready() block.
$( document ).ready(function() {
	
	// function to view modal
	function showMessageDialog(title, body) {
		document.getElementById('title-modal').innerHTML = ""+title;
		document.getElementById('body-modal').innerHTML = ""+body;
		var mes_diag = new bootstrap.Modal(document.getElementById('message-dialog'))
		mes_diag.show();
	}

	// get current date and time
	var now = new Date(Date.now());
	var strDate = now.getFullYear() + "/" + (now.getMonth()+1) + "/" + now.getDate();
	var strTime = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
	$('#datetime').val(""+strDate+" "+strTime);

	// default
	$('#max-sample-size').val("10");		
			
	// handle button start prediction
	$("#btn-predict").click(function(){
		var txtEmail = $("#email").val();
		var txtDateTime = $("#datetime").val();
		var txtID = $('#id-data-source').find(":selected").val();
		var txtSampleSize = $("#max-sample-size").val();
		var txtRating = $('#rating').find(":selected").val();
		
		console.log("Email: "+txtEmail);
		console.log("Date/Time: "+txtDateTime);
		console.log("ID E-Comerce: "+txtID);
		console.log("Sample Size: "+txtSampleSize);
		console.log("Rating: "+txtRating);
		
		if(txtEmail.length === 0) {
			showMessageDialog("Warning Message", "Please, provide your email address.");
		}else if(txtSampleSize.length === 0) {
			showMessageDialog("Warning Message", "Please, provide number of input sample.");
		}else if(!$.isNumeric(txtSampleSize)) {
			showMessageDialog("Warning Message", "Please enter only numbers into number of samples.");
		}else if(parseInt(txtSampleSize, 10)==null || parseInt(txtSampleSize, 10) < 10 || parseInt(txtSampleSize, 10) > 150) {
			showMessageDialog("Warning Message", "Sample size must be between 10 and 150.");
		}else{
			// buat array
			var arr_data = { 
				email     : ""+txtEmail,
				datetime  : ""+txtDateTime,
				id        : ""+txtID,
				size      : ""+txtSampleSize,
				rating    : ""+txtRating
			};
			
			// run progress bar
			var prog_diag = new bootstrap.Modal(document.getElementById('static-progress-bar-dialog'))
			prog_diag.show();
					
					
			// ajax function
			$.ajax({
				url: "./predict-actions.php",
				type: "post",
				data: arr_data,
				success: function (response){
					if(response.includes("success")){
						window.location.href = "report.php";
					}else{
						console.log(""+response);
						alert("Sorry, we found an error. Please try again.");
						location.reload();
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert("Sorry, we found an error.");
				   console.log(textStatus, errorThrown);
				   location.reload();
				}
			});
		}
	});


    // handle button 'cancel prediction'
	$('#btn-cancel-predict').click(function() {
		location.reload();
	});

	var diag_prog_bar = document.getElementById('static-progress-bar-dialog');
	diag_prog_bar.addEventListener('hidden.bs.modal', function (event) {
	  location.reload();
	});

});


