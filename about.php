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
				<a href="./about.php" class="nav-item nav-link active">About</a>
			</div>
			<div class="d-flex ms-auto">
				<button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#modal-contact-us">Contact Us</button>
			</div>
		</div>
	</div>        
</nav>

<div class="container mt-3 mb-5 col-sm-8">
	<h2>System Development Scope & Dependencies</h2>
	<p>In this sentiment identification system, we have used some python packages (python dependencies) to perform some tasks. Python dependencies are all of the software library/package required by our project in order to work and to avoid runtime errors. We provide below list of some packages that may help you to start.</p>
	<h4>Python Packages:</h4>
	<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class='text-center'>Package</th>
			<th class='text-center'>How to install?</th>
			<th class='text-center'>Version</th>
			<th class='text-center'>Package info?</th>
		</tr>
	</thead>
		<tbody>
		  <tr class="table-primary text-center">
			<td>google-play-scraper</td>
			<td>pip install google-play-scraper</td>
			<td>1.1.0</td>
			<td>Google-Play-Scraper provides python APIs to easily crawl and download the Google Play Store review data without any external dependencies.</td>
		  </tr>
		  <tr class="table-success text-center">
			<td>WordCloud</td>
			<td>pip install wordcloud</td>
			<td>1.8.2.2</td>
			<td>Python wordcloud is a data visualization technique used to create tag clouds.</td>
		  </tr>
		  <tr class="table-danger text-center">
			<td>Seaborn</td>
			<td>pip install seaborn</td>
			<td>0.11.2</td>
			<td>Seaborn is a Python data visualization library based on matplotlib.</td>
		  </tr>
		  <tr class="table-info text-center">
			<td>Matplotlib</td>
			<td>pip install matplotlib</td>
			<td>3.4.3</td>
			<td>Matplotlib is a comprehensive library for creating static, animated, and interactive visualizations in Python.</td>
		  </tr>
		  <!--https://www.tutorialspoint.com/scikit_learn/scikit_learn_introduction.htm-->
		  <tr class="table-warning text-center">
			<td>Scikit-learn</td>
			<td>pip install scikit-learn</td>
			<td>1.0.2</td>
			<td>Scikit-learn (Sklearn) is the most useful and robust library for machine learning in Python. </td>
		  </tr>
		  <tr class="table-secondary text-center">
			<td>NLTK (Natural Language Toolkit)</td>
			<td>pip install --user -U nltk</td>
			<td>3.7</td>
			<td>Natural Language Processing with Python provides a practical introduction to programming for language processing.</td>
		  </tr>
		  
		</tbody>
	</table>
	</br>
	<h4>Tools/Services:</h4>
	<ol class="list-group list-group-numbered">
	  <li class="list-group-item">Google Colaboratory (colab), to generate machine learning model.</li>
	  <li class="list-group-item">Spyder text editor</li>
	  <li class="list-group-item">Notepad++ text editor</li>
	  <li class="list-group-item">JQuery 3.6.0 (Support ajax to execute python script from PHP)</li>
	  <li class="list-group-item">Bootstrap v5.0 (Front-end web design & development.)</li>
	</ol>
	</br>
	<h4>Programming Languages:</h4>
	<ol class="list-group list-group-numbered">
	  <li class="list-group-item">Python</li>
	  <li class="list-group-item">PHP: Hypertext Preprocessor</li>
	  <li class="list-group-item">Javascript</li>
	</ol>
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