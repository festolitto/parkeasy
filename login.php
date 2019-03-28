
<html>
 <head>
  <title>ParkEasy
  </title>
  <link rel="shortcut icon" href="icon.png" />
  <link rel="stylesheet" type="text/css" href="mystylesheet.css">
     <style>
       #loginoptions a{
	      text-decoration:none;
		  font-family:calibri;
		  font-weight:bold;
		  color:teal;
		  padding-left:6%;
       }
	    #parkeasy{
	         color:white;
	         font-weight:bold;
	         font-size:16;
	         margin-top:6%;
	         margin-left:2.3%;
			 
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
		 <p id="parkeasy">ParkEasy</p>
     </header>
 <nav>
  
        <ul>
   	        <li><a href="index.php">Home</a></li>
   	 		<li><a href="About.php">About</a></li>
   	 		<li><a href="Register.php">Register</a></li>
   	 	    <li id="current"><a href="login.php">Login</a></li>
   	    </ul>
</nav>

  <div class="loginbox">
	 <h1>User Login</h1><br>
    <form action="loginn.php" method="POST">
	      <label>UserName</label>&nbsp &nbsp &nbsp <input type="Email" name="username" placeholder="Enter UserName" required>
	      <label>Password</label> &nbsp &nbsp &nbsp <input type="password" name="password" placeholder="Enter password" required>
	      <input type="submit" name="login" id="login"><br><br>
		  <div id="loginoptions">
	      <a href="password_recovery.php">Forgot password?</a>
	      <a href="Register.php">No acount? create one!</a><br><br>
		  <a href="admin_login.php">Admin Login</a>
		  <a href="manager_login.php">Manager login</a>
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