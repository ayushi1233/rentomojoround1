<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<style>
#loading-img{
display:none;
}
.response_msg{
margin-top:10px;
font-size:13px;
background:#E5D669;
color:#ffffff;
width:250px;
padding:3px;
display:none;
}
button
{
	float: right;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-8">
<h3><a href="#"><span class="glyphicon glyphicon-arrow-left"></span></a>Add a new contact</h3>
<br>
<form name="contact-form" action="" method="post" id="contact-form">
<div class="form-group">
<label for="Name">Name</label>
<input type="text" class="form-control" name="your_name" placeholder="Name" required>
</div>
<div class="form-group">
	<label for="exampleInputDOB">DOB</label>
<input type="date" class="form-control" id="start" name="trip-start"
       value="2020-05-22"
       min="1947-01-01" max="2020-05-28">


<div class="form-group">
<label for="Phone">Mobile Number</label>
<input type="text" class="form-control" name="your_phone" placeholder="Phone" required><span class="glyphicon glyphicon-plus-sign">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" name="your_email" placeholder="Email" required><span class="glyphicon glyphicon-plus-sign">
</div>

<button type="submit" class="btn btn-success" name="submit" value="Submit" 
id="submit_form">Save</button>
<img src="img/loading.gif" id="loading-img">
</form>
<div class="response_msg"></div>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#contact-form").on("submit",function(e){
e.preventDefault();
if($("#contact-form [name='your_name']").val() === '')
{
$("#contact-form [name='your_name']").css("border","1px solid red");
}
else if ($("#contact-form [name='your_email']").val() === '')
{
$("#contact-form [name='your_email']").css("border","1px solid red");
}
else
{
$("#loading-img").css("display","block");
var sendData = $( this ).serialize();
$.ajax({
type: "POST",
url: "get_response.php",
data: sendData,
success: function(data){
$("#loading-img").css("display","none");
$(".response_msg").text(data);
$(".response_msg").slideDown().fadeOut(3000);
$("#contact-form").find("input[type=text], input[type=email], textarea").val("");
}
});
}
});
$("#contact-form input").blur(function(){
var checkValue = $(this).val();
if(checkValue != '')
{
$(this).css("border","1px solid #eeeeee");
}
});
});
</script>
</body>
</html>