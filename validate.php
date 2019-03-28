<?php 
$db=mysqli_connect("localhost","root","test","");
$username=mysqli_real_escape_string($db,$_POST['username']);
$password=($_POST['password']); 
$sql="SELECT * FROM users WHERE username='$username' AND password='$password'"; 
$query=mysqli_query($db,$sql);
if($query){
//successful login 
} else{
	// unsuccessful login
} 
?> 