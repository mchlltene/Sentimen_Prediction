<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sentiment Analysis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="./js/func_actions.js"></script>

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
				<a href="./index.php" class="nav-item nav-link active">Home</a>
				<a href="./data.php" class="nav-item nav-link">Data</a>
				<a href="./about.php" class="nav-item nav-link">About</a>
			</div>
			<div class="d-flex ms-auto">
				<button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#modal-contact-us">Contact Us</button>
			</div>
		</div>
	</div>        
</nav>

<div class="container mt-3 mb-5 col-sm-6">
	<h2>Parameter Input System</h2>
	    <div class="mb-3">
		  <label for="email">Email:</label>
		  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
		</div>
		<div class="mb-3">
		  <label for="datetime">Date/time:</label>
		  <input type="text" class="form-control" id="datetime" placeholder="" name="datetime" disabled>
		</div>
		<div class="mb-3">
		  <label for="threshold">Decision Threshold (0 - 1):</label>
		  <input type="text" class="form-control" value="0.75" disabled>
		</div>
		<div class="mb-3 mt-3">
			<label for="email">Download most melevant reviews (Google play store):</label>
			<select class="form-select" id="id-data-source" name="melevant-reviews">
			  <option value="com.shopee.id">Shopee</option>
			  <option value="com.bukalapak.android">Bukalapak</option>
			  <option value="blibli.mobile.commerce">Blibli</option>
			  <option value="com.lazada.android">Lazada</option>
			  <option value="com.tokopedia.tkpd">Tokopedia</option>
			</select>
		</div>
		<div class="mb-3">
			<label for="email">Number of reviews (between 10 and 150):</label>
			<input type="number" class="form-control" id="max-sample-size" min="10" max="150">
		</div>
		<div class="mb-3">
			<label for="email">Filter score with:</label>
			<select class="form-select" id="rating" name="filter-score">
			  <option value="0">None (random all rating)</option>
			  <option value="1">Rating 1 Only</option>
			  <option value="2">Rating 2 Only</option>
			  <option value="3">Rating 3 Only</option>
			  <option value="4">Rating 4 Only</option>
			  <option value="5">Rating 5 Only</option>
			</select>
		</div>
		<button id="btn-predict" class="btn btn-primary" data-backdrop="static" data-keyboard="false">Start Prediction</button>
</div>

<!-- Modal Message Dialog -->
<div class="modal fade" id="message-dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 id="title-modal" class="modal-title"></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div id="body-modal"></div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Progress Bar -->
<!-- Modal -->
<div class="modal fade" id="static-progress-bar-dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Please Wait, in progress !!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="progress" style="height:30px">
			<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%;height:30px"></div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-cancel-predict" class="btn btn-secondary" data-bs-dismiss="modal">Cancel Prediction</button>
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
  
</body>

</html>