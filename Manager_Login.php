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
<html>
 <head>
  <title>ParkEasy
  </title>
  <link rel="shortcut icon" href="icon.png" />
  <link rel="stylesheet" type="text/css" href="mystylesheet.css">
 <style>
#invalid{
	position:absolute;
	top:42%;
	left:45%;
	color:red;
	font-size:12px;
	Z-index:3000;
}

#loginoptions a{
	      text-decoration:none;
		  font-family:calibri;
		  font-weight:bold;
		  color:teal;
		  padding-left:6%;
		
}
	   
</style>
</head>
 <body>
 <div id="inner-body">
  <header class="header">
   	 	<div class="logo"> <img src="logo.jpg" ></div>
		<div>
		 <p id="motto">Welcome To ParkEasy</p> 
		 </div>
     </header>


  <div class="loginbox">
	 <h1>Manager login</h1><br>
    <form action="manager_login.php" method="POST">
	      <label>UserName</label>&nbsp &nbsp &nbsp <input type="text" name="username" placeholder="Enter UserName" required>
	      <label>Password</label> &nbsp &nbsp &nbsp <input type="password" name="password" placeholder="Enter password" required>
	      <input type="submit" name="login" id="login"><br>
		  <div id="loginoptions">
		  <a href="admin_login.php">Admin Login</a>
		  <a href="login.php">User login</a>
		  </div>
	</form>
  </div>
        <footer>
		    <ul>
		      <li><a href="index.php">Home</a></li> 
			  <li><a href="about.php">About Us</a></li>
		      <li><a href="">Contact Us</a></li>
			</ul> 
			  <p>&copy; 2018 ParkEasy-ALL RIGHTS RESERVED</p>
		</footer>

 </body>

</html>