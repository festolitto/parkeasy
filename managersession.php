<?php
SESSION_START();
include 'dbconn.php';
if(isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	 if(!empty($username) && !empty($password)){
	   $query="SELECT * from parklotmanager where username='$username' and password='$password'";
	   $result=mysqli_query($conn,$query);
	        if($result){
				$row=mysqli_num_rows($result);
				if($row==0){
					echo "<div id='invalid'>INVALID USERNAME OR PASSWORD</div>";
				}
				 else{
					$_SESSION['username']=$username;
					$_SESSION['success']="You are logged In";
					header('location:Manager_View.php');
				}
			}
	 }
	
}
?>