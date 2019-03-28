<?php
include 'loginn.php';
include 'dbconn.php';
$username=$_SESSION['username'];
include'sessionmanager.php';
?>
<html>
 <head>
  <title>ParkEasy
  </title>
  <link rel="shortcut icon" href="icon.png" />
   <link rel="stylesheet" type="text/css" href="portal1.css">
  <script type ="text/javascript" src="jquery.iconify.js"></script>
  <style>
           #parkeasy{
	         color:white;
	         font-weight:bold;
	         font-size:16;
	         margin-top:6%;
	         margin-left:2.3%;
			 
        }
  </style>
</head>
 <body class="bodyclient">
  <header class="header">
   	 	<div id="logo"> 
		   <img src="logo.jpg" >
		</div>
		
		<div>
		   <p id="motto">Welcome To ParkEasy</p> 
		</div>
		 <p id="parkeasy">ParkEasy</p>
		<div id="greetings">
		  <ul>
		     <li>
			  <?php
	                $query="select * from user where email='$username'";
	                $result=mysqli_query($conn,$query);
	                $row=mysqli_fetch_assoc($result);
	                $idno=$row['idno']; 
					

      		        $query1="SELECT firstname from user where idno='$idno'";
	                $result1=mysqli_query($conn,$query1);
	                $row1=mysqli_num_rows($result1);
			        if($row1 >0){
					   while($row=mysqli_fetch_assoc($result1)){
						   echo 'Welcome '.$row['firstname'].'!';
					   }
			        }
			  ?>
		     </li>
		   <li><a href="logout.php">Logout</a></li>
		  </ul>
		</div>
		
  </header>
  	<nav>
   	 	<ul>
   	 			<li id="current"><a href="myservices.php">My services</a></li>
				<li><a href="Book.php">Book</a></li>
   	 			<li><a href="navigate.php">locate</a></li>
				<li><a href="MyAccount.php">My Account</a></li>
				<li><a href="availability.php">Availability</a></li>
				<li><a href="payment.php">Payment</a></li>
   	 			
   	    </ul>
   	 </nav>
	<div id="mainpanel">
	   <div id="profile-image">
	        <a href="book.php"> 	  
		        <div id="book">
			       <img src="icon1.png"><br><br><br><br><p>Book</p>
			    </div>
			</a>	
			
			<a href="navigate.php">
		         <div id="navigate">
			       <img src="nav.jpg"><br><br><br><br><p>Locate</p>
			     </div>
			</a>	
			
			<a href="availability.php">
		    <div id="search">
			   <img src="icon.png"><br><br><br><br><p>Check Availability</p>
			</div>
			</a>
			
		    <a href="MyAccount.php">
			   <div id="pay">
			      <img src="image3.jpg"><br><br><br><br><p>My Account</p>
			   </div>
			</a>
	    </div>
	</div> 
	 <hr/>
	 <div id="bottompanel">
	 </div>
	 <div id="sidepane">
        <p>Welcome to ParkEasy a solution that has revolutionized the parking industry</p><br>
		<img src="pic7.png">
		<p>Sign up today and be a part of millions of people enjoying convient parking services</p>
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