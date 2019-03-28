
<?php
include'insert.php';
?>
<html>
 <head>
   <title>ParkEasy</title>
   <link rel="stylesheet" type="text/css" href="mystylesheet.css">
   <link rel="shortcut icon" href="icon.png" />
  
  
    <script src="jquery-3.2.1.min.js"></script>
    <script src="validate.js"></script>
    <script src="validater.js"></script>
    <style>
	      #loginoptions a{
	          text-decoration:none;
		      font-family:calibri;
		      font-weight:bold;
		      color:teal;
		      padding-left:6%;
			  padding-bottom:3%;
          }
	      #fname-error.error{
			  color:red;
			  font-size:12px;
			  display:block;
		  }
		  input.error{
			  border:1px solid red;
		  }
		  
		   #lname-error.error{
			  color:red;
			  font-size:12px;
			  display:block;
		  }
		  #idno-error.error{
			   color:red;
			  font-size:12px;
			   display:block;
		  }
		  #regno-error.error{
			   color:red;
			  font-size:12px;
			   display:block;
		  }
		  #phone-error.error{
			   color:red;
			  font-size:12px;
			   display:block;
		  }
		  #email-error.error{
			   color:red;
			  font-size:12px;
			   display:block;
		  }
		  #password-error.error{
			   color:red;
			  font-size:12px;
			   display:block;
		  }
		  #cpassword-error.error{
			   color:red;
			  font-size:12px;
			   display:block;
		  }
		    #password1-error.error{
			   color:red;
			  font-size:12px;
			   display:block;
		  }
		    #password2-error.error{
			   color:red;
			  font-size:12px;
			   display:block;
		  }
		  #parkeasy{
	         color:white;
	         font-weight:bold;
	         font-size:16;
	         margin-top:6%;
	         margin-left:2.3%;
			 
        }
		body{
			margin:0;
		}
		  
	</style>
 </head>
 
  <body>
   <script >
     
	 
	 
            
 
			 
			          $(document).ready(function(){
						 
						    $("#register").validate({
								rules:{
									
									  fname:{
										  required:true,
										  minlength:3,
										  maxlength:10
										  
										  
									  },
									  lname:{
										  required:true,
										  minlength:3,
										  maxlength:10
										  
									  },
									  idno:{
										  required:true,
										  minlength:7,
										  maxlength:8,
										  digits:true
								
									  },
									    regno:{
										  required:true,
										  minlength:6
								
									  },
									    phone:{
										  required:true,
										  minlength:10,
										  maxlength:14,
										  digits:true
										  
										  
								
									  },
									    email:{
										  required:true,
										  email:true
								
									  },
									    password:{
										  required:true,
										  minlength:8
										  
								
									  },
									    cpassword:{
										  required:true,
										  minlength:8,
										  equalTo:password1
								
									  },
									
								},
								messages:{
									   cpassword:{
										   equalTo:"password Mismatch!"
										   },
										   
										   email:{
											     email:"Enter valid Email"
											   }
                                       										   
								}
							});
						   
					  });
			 
			

   </script>

   <div class="inner-body">
  <div class="inner-body">
   <Header class="header">
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
				<li id="current"><a href="register.php">Register</a></li>
				<li><a href="login.php">login</a></li>
   	    </ul>
  </nav>
   
</div>
     <div id="Regtitle"><p>Sign Up</p></div>
  <form ACTION="register.php" method="POST" id="register">
	  <label>First Name</label>
	  <input type="text" name="fname" placeholder="First Name">
	  <label>Last Name</label>
	  <input type="text" name="lname" placeholder="Last Name">
	   <label>National ID</label>
	  <input type="text" name="idno" placeholder="ID number" required>
	  <label>Car Registration Number</label>
	  <input type="text" name="regno" placeholder="e.g. KCG123R" size="8">
	  <label>Phone</label>
	  <input type="text" name="phone" placeholder="e.g. 0712345678" size="13" required>
	  <label>Email Address</label>
	  <input type="email" name="email" placeholder="Email Address" size="20" required>
	  <label>Password</label>
	  <input type="password" name="password" placeholder="Password" size="10" id="password1" required>
	  <label>Confirm Password</label>
	  <input type="password" name="cpassword" placeholder="Confirm Password" size="10" id="password2" required><br>
	  <input type="submit" name="submit" value="Sign Up" id="submit" ><br>
	  <div id="loginoptions">
	   <a href="login.php">Registered? proceed login</a>
	   </div><br>
	  
  </form>
 
  	     
        <footer>
		    <ul>
		      <li><a href="index.php">Home</a></li> 
			  <li><a href="about.php">About Us</a></li>
		      <li><a href="">Contact Us</a></li>
			</ul> 
			  <p>&copy; 2018 ParkEasy-ALL RIGHTS RESERVED</p>
		</footer>
</div>		
  </body>
</html>