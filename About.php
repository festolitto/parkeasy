
<?php
session_start();
?>
<html>
   <head>
    <title class ="title">ParkEasy</title>
	<link rel="stylesheet" type="text/css" href="mystylesheet.css">
	<link rel="shortcut icon" href="icon.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width,initial scale=1.0">
  <script type ="text/javascript" src="jquery.iconify.js"></script>	
      <style>
	    #mainpanel{
			margin-top:7%;
			width:70%;
			margin-left:20%;
			text-align:center;
			
			
		}
		table{
			border="solid" "1px";
			
			position:relative;
			
		}
		img{
			height:20%;
			width:100%;
			border-radius:50%;
		}
		#groupfounders ul{
			
		}
		#parkeasy{
	         color:white;
	         font-weight:bold;
	         font-size:16;
	         margin-top:6%;
	         margin-left:2.3%;
			 
        }
		#mainpanel p{
			color:maroon;
			font-size:16;
			font-family:callibri;
		}
		#desc{
			background:red
			height:50%;
			width:20%;
		}
		footer{
			margin-top:20%;
		}
		
	  </style>
   </head >
   
   <body>
   
      <div id="body-home">
   
   	 <Header class="header">
   	 	<div class="logo"> <img src="logo.jpg" ></div>
		<div>
		 <p id="motto">Welcome To ParkEasy</p> 
		 </div>
		 <p id="parkeasy">ParkEasy </p> 
     </header>

	<nav>
   	 	<ul>   
		    
   	 			<li><a href="index.php">Home</a></li>
   	 			<li id="current"><a href="About.php">About</a></li>
   	 			<li><a href="Register.php">Register</a></li>
   	 			<li><a href="login.php">login</a></li>	
   	    </ul>
   	 </nav>
        <h1>Welcome</h1>
	
	     <div id="sidepane">
          <p>Welcome to ParkEasy a solution that has revolutionized the parking industry</p><br>
		  <img src="pic7.png">
		  <p>Sign up today and be a part of millions of people enjoying convenient parking services</p>
	     </div>
		 <div id="mainpanel">
		    <p>Park easy is a parking solution that automate parking services. 
			Automated services incluede find out online on the location, availablity of parking space.</p>
			
			<p>ParkEasy is a solution developed in Kenya. It was developed on 2018 and has since then revolutionalized parking industry completely</p>
			<table id="about">
			   <tr>
			        <th colspan="4"><h1>The Co-founders</h1></th>
			   </tr>
			
			        
			   <tr>
			             <td><img src="ceo.jpg"></td>
			             <td><img src="dee.jpg"></td>
			             <td><img src="cio.png"></td>
			             <td><img src="fess.jpg"></td>
		       </tr>
			   <tr>
			      <td id="desc">ceo..............</td>
			      <td id="desc">Director.........</td>
			      <td id="desc">Manager..........</td>
			      <td id="desc">CFO..............</td>
			   </tr>
			   <tr>
			             <td><img src="ceo.jpg"></td>
			             <td><img src="dee.jpg"></td>
			             <td><img src="cio.png"></td>
			             <td><img src="fess.jpg"></td>
		       </tr>
			    <tr>
			      <td id="desc">ceo..............</td>
			      <td id="desc">Director.........</td>
			      <td id="desc">Manager..........</td>
			      <td id="desc">CFO..............</td>
			   </tr>
			
			  </table>
		 </div>
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