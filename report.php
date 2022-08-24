<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sentiment Analysis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<div class="p-5 bg-primary text-white text-center">
  <h1>Sentiment Identification System</h1>
  <p>Automatically Identify & Analyze Customer Sentiment from E-Commerce App Reviews!!!</p> 
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
	<div class="container-fluid">
		<a href="#" class="navbar-brand">UNKLAB</a>
		<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse5">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse5">
			<div class="navbar-nav">
				<a href="./index.php" class="nav-item nav-link">Home</a>
				<a href="./data.php" class="nav-item nav-link">Data</a>
				<a href="./about.php" class="nav-item nav-link">About</a>
			</div>
			<div class="d-flex ms-auto">
				<button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#modal-contact-us">Contact Us</button>
			</div>
		</div>
	</div>        
</nav>

<div class="container mt-3 mb-5 col-sm-12">
	<div class="row">
	  <div class="col-sm-4">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title">Sentiment Percentage (%)</h5>
			<p class="card-text">
				<img src="./image/pie.png" class="rounded" style="display: block; max-width: 100%; height: auto;"> 
			</p>
			<button type="button" class="btn btn-primary" id="btn-preview-pie">Preview</button>
		  </div>
		</div>
	  </div>
      <div class="col-sm-4">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title">Positive Keywords</h5>
			<p class="card-text">
				<img src="./image/pos_sentiment.png" class="rounded" style="display: block; max-width: 100%; height: auto;">
			</p>
			<button type="button" class="btn btn-primary" id="btn-preview-pos">Preview</button>
		  </div>
		</div>
	  </div>
      <div class="col-sm-4">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title">Negative Keywords</h5>
			<p class="card-text">
				<img src="./image/neg_sentiment.png" class="rounded" style="display: block; max-width: 100%; height: auto;">
			</p>
			<button type="button" class="btn btn-primary" id="btn-preview-neg">Preview</button>
		  </div>
		</div>
	  </div>
    </div>
	
	<div class="row mt-4">
		<div class="d-flex mb-2 ms-auto">
			<input type="text" id="txt-input-search" class="form-control me-sm-2" placeholder="Search in table">
			<button type="button" id="btn-search-table" class="btn btn-success">Search</button>
		</div>
	<div class="table-responsive-sm">
		<?php

		$file_to_read = fopen('./data/output_final_data.csv', 'r');
		
		if($file_to_read !== FALSE){
			$flag = true;
			$row_number = 1;
			$columns = array(3, 4, 5, 6, 7, 8);
			echo "<table class='table table-bordered table-hover table-striped'>\n";
			echo "<thead class='table-info'>";
			echo "  <tr>";
			echo "	<th class='text-center'>Review/Feedback</th>";
			echo "	<th class='text-center'>Rating</th>";
			echo "	<th class='text-center'>Date/Time</th>";
			echo "	<th class='text-center'>Predicted</th>";
			echo "	<th class='text-center'>Positive</th>";
			echo "	<th class='text-center'>Negative</th>";
			echo "  </tr>";
			echo "</thead>";
			echo "<tbody id='myTable'>";
			while(($data = fgetcsv($file_to_read, 1000, ',')) !== FALSE){
				if($flag) { $flag = false; continue; }
				echo "<tr>";
				//echo "<td class='text-center align-middle'>".$row_number."</td>";
				for($i = 0; $i < count($data); $i++) {
					if (in_array($i+1, $columns)) {
						if($i+1 == 3){
							echo "<td class='align-middle'><b><sup>[".$row_number."]</sup></b> ".$data[$i]."</td>";
						
						}else{
							echo "<td class='text-center align-middle'>".$data[$i]."</td>";
						}
					}
				}
				echo "</tr>\n";
				$row_number++;
			}
			echo "</tbody>";
			echo "</table>\n";

			fclose($file_to_read);
		}
		?>
    </div>
	</div>
</div>

<!-- Modal Preview Dialog -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content"> 
		<div class="modal-header">
			<h5 class="modal-title" id="staticBackdropLabel">Preview Image</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
      <div class="modal-body">
			<img src="" class="imagepreview" style="display: block; max-width: 100%; height: auto;">
			
      </div>
    </div>
  </div>
</div>

<!-- The Modal Contact Us-->
<div class="modal" id="modal-contact-us">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Contact Us</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        Sentiment analysis is used to identify and extract subjective information in source text (review/feedback), and helping a business to understand the social sentiment of their product or service. This prediction system can be used for monitoring the customer sentiment from most relevant reviews (comments, feedbacks or reactions from your customers) in Google play store. Sentiment identification system was designed using machine learning algorithms and natural language processing (NLP) technique to determine whether data is positive or negative sentiment.
		</br></br>
		<b>Contact:</b> semmy@unklab.ac.id
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="./js/report_actions.js"></script>
  
</body>

</html>