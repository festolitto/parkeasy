<?php
include 'loginn.php';
include'sessionmanager.php';
?>

<html>
 <head>
  <title>ParkEasy
  </title>
  <link rel="shortcut icon" href="icon.png" />
   <link rel="stylesheet" type="text/css" href="portal1.css">
     <style>
	   #details{
		   background:green;
		   color:white;
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
		 <div id="greetings">
		  <ul>
	         <li>
		         <?php
				    include 'dbconn.php';
			   	    $username=$_SESSION['username'];
	                $query="select * from user where email='$username'";
	                $result=mysqli_query($conn,$query);
	                $row=mysqli_fetch_assoc($result);
	                $idno=$row['idno']; 
					

      		        $query1="SELECT FirstName from user where idno='$idno'";
	                $result1=mysqli_query($conn,$query1);
	                $row1=mysqli_num_rows($result1);
			        if($row1 >0){
					   while($row=mysqli_fetch_assoc($result1)){
						   echo 'Welcome '.$row['FirstName'].'!';
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

		        <li><a href="myservices.php">My services</a></li>
				<li><a href="Book.php">Book</a></li>
   	 			<li id="current"><a href="navigate.php">Navigate</a></li>
				<li><a href="availability.php">Availability</a></li>
   	 			<li><a href="MyAccount.php">My Account</a></li>
				<li><a href="payment.php">Payment</a></li>
	
   	    </ul>
   	 </nav>
	<div id="mainpanel">
	
	    <script>
       function initMap(){
		   
	   var lat=-1.292066;
	   var lng=36.821946;
	   
	   /*T-mall*/
       var lat1=-1.312454;
	   var lng1=36.816691;
	   
	   /*Harambee*/
	   var lat2=-1.289650;
	   var lng2=36.822083;
	   
	   /*Kencom*/
	   var lat3=-1.285991;
	   var lng3=36.825304;
	   
	   /*Hilton*/
	   var lat4=-1.285388;
	   var lng4=36.824507;
	   
	   /*Afya*/
	   var lat5=-1.287894;
	   var lng5=36.827951;
	   
	   /*Odeon*/
	   var lat6=-1.283284;
	   var lng6=36.825026;
	   
	   /*jivanjee*/
	   var lat7=-1.281232;
	   var lng7=36.819532;
	   
	   /*Kocha*/
	   var lat8=-1.292066;
	   var lng8=36.821946;
	   
	   /*Moi*/
	   var lat9=-1.283467;
	   var lng9=36.823562;
	   
	   /*Archives*/
	   var lat10=-1.284897;
	   var lng10=36.825920;
	   
	   /*nyamakima*/
	   var lat11=-1.283369;
	   var lng11=36.830022;
	   
	   /*Uhuru*/
	   var lat12=-1.290393;
	   var lng12=36.816583;
	   
	   /*Inter-Conn*/
	   var lat13=-1.287957;
	   var lng13=36.819311;
	   
	   /*Railways*/
	   var lat14=-1.292041;
	   var lng14=36.827887;
	   
	   /*Bus*/
	   var lat15=-1.285314;
	   var lng15=36.830742;
	   
	    /*syokimau*/
	   var lat16=-1.359892;
	   var lng16=36.906799;
	   
	    /*nyayo*/
	   var lat17=-1.304044;
	   var lng17=36.824648;
	   /**/
	   var mylocation={lat:-1.176699, lng:-1.176699};
       var map= new google.maps.Map(document.getElementById("mainpanel"),
       {
       zoom:14,
	   center:{
		   lat:lat,
		   lng:lng
	   }
      });
      var marker = new google.maps.Marker({
		  position:{
		   lat:lat1,
		   lng:lng1
		   
		  
	       },
          map: map,
          title: 'hello',
		  icon: 'marker.png'
		  
		  
        });
		
		

  }
	
      
  </script>
  </div> 
    <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrROJrebhFkyngcB_83_MHPt9nHB5fDnk&callback=initMap"
  type="text/javascript"></script>