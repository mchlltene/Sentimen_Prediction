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
				<a href="./data.php" class="nav-item nav-link active">Data</a>
				<a href="./about.php" class="nav-item nav-link">About</a>
			</div>
			<div class="d-flex ms-auto">
				<button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#modal-contact-us">Contact Us</button>
			</div>
		</div>
	</div>        
</nav>

<div class="container mt-3 mb-5 col-sm-8">
	<h2>Data for Building AI System</h2>
	<p>To build our machine learning-based model, we have downloaded the review data from some pupular E-commerce apps on Google Play Store, whcih come from multiple sources including Shopee, Lazada, Bukalapak, Blibli and Tokopedia. There are numbers of training data used to train an algorithm or machine learning model for predicting the customor sentiment in reviews/feedback data. Using testing data, we measure the performance of our predictive model. </p>
	<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class='text-center'>Google Play Store (ID)</th>
			<th class='text-center'>E-Commerce Apps</th>
			<th class='text-center'>Total (samples)</th>
			<th class='text-center'>After Data Preprocessing</th>
		</tr>
	</thead>
		<tbody>
		  <tr class="table-primary text-center">
			<td>com.shopee.id</td>
			<td>Shopee</td>
			<td>4000</td>
			<td>Neg (1574), Pos (975)</td>
		  </tr>
		  <tr class="table-success text-center">
			<td>com.bukalapak.android</td>
			<td>Bukalapak</td>
			<td>4000</td>
			<td>Neg (1156), Pos (1450)</td>
		  </tr>
		  <tr class="table-danger text-center">
			<td>blibli.mobile.commerce</td>
			<td>Blibli</td>
			<td>4000</td>
			<td>Neg (1018), Pos (1651)</td>
		  </tr>
		  <tr class="table-info text-center">
			<td>com.lazada.android</td>
			<td>Lazada</td>
			<td>4000</td>
			<td>Neg (1134), Pos (1411)</td>
		  </tr>
		  <tr class="table-warning text-center">
			<td>com.tokopedia.tkpd</td>
			<td>Tokopedia</td>
			<td>4000</td>
			<td>Neg (1126), Pos (1463)</td>
		  </tr>
		  
		</tbody>
	</table>
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


</body>

</html>