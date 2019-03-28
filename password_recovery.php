
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
		form{
			position:relative;
		}
		#error{
			position:absolute;
			top:-8%;
			left:32%;
			color:red;
		}
		#success{
			position:absolute;
			top:-8%;
			left:32%;
			color:green;
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
	 <h1>Password Recovery</h1><br>
    <form action="" method="POST">
	      <label>UserName</label>&nbsp &nbsp &nbsp <input type="Email" name="username" placeholder="Enter UserName" required>
	      <label>Password</label> &nbsp &nbsp &nbsp <input type="password" name="password" placeholder="Enter password" required>
	      <label>Confirm Password</label> &nbsp &nbsp &nbsp <input type="password" name="cpassword" placeholder="Re-enter password" required>
	      <input type="submit" name="submit" id="login"><br><br>
		  <div id="loginoptions">
	      <a href="login.php">Login</a>
	      <a href="Register.php">No acount? create one!</a><br><br>
		  </div>
		  
		  
		  <?php
				      include'dbconn.php';
				
				     if(isset($_POST['submit'])){
						   
						      $username=$_POST['username'];
							  $password=$_POST['password'];
							  $cpassword=$_POST['cpassword'];
							     
								 
							  if(empty($username) && empty($password) && empty($cpassword)){
								    echo"Please Fill required fields";  
							  }
							  else{
                                    $query="select * from user where email='$username'";
									$result=mysqli_query($conn,$query);
									$row=mysqli_num_rows($result);
									if($row){
										   if($password==$cpassword){
											      $query1="update user set password='$password' where email='$username'"; 
                                                  $result1=mysqli_query($conn,$query1);
                                                   if($result1){
													       echo'<div id="success">Password Updated Successfully</div>';
												   }		
                                                    else{
														     echo'<div id="error">Password Not Updated</div>';
													}
													
										   }
										   else{
											      echo'<div id="error">Password Mismatch</div>';  
										   }
									}
									else{
										  echo'<div id="error">Email Does Not Exist</div>';  
									}
							  }
						
						 
					 }
				
				
				
				
				
				
				
				
				?>   
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