<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- jQuery -->
<title>phpzag.com : Demo Create Autocomplete Search with Bootstrap Typeahead, PHP and MySQL</title>

<?php include('container.php');?>
<div class="container">
	<h2>Autocomplete Search with Bootstrap Typeahead</h2>	
	<div class="row">
		<div class="col-xs-2">    	
			<br/>
			<label>Search Name</label>
			<input class="typeahead form-control" type="text" placeholder="Search Name....">
		</div>
	</div>
	
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/autocomplete-search-with-bootstrap-typeahead" title="">Back to Tutorial</a>			
	</div>		
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<!-- <script type="text/javascript" src="script/script.js"></script> -->
<?php include('search_data.php');?>
<?php include('footer.php');?>
<script src="script.js"></script>
