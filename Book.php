<?php
include('insertbook.php');
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
			   	    $username=$_SESSION['username'];
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
			    <li><a href="myservices.php">My services</a></li>
				<li id="current"><a href="Book.php">Book</a></li>
   	 			<li><a href="navigate.php">locate</a></li>
				<li><a href="MyAccount.php">My Account</a></li>
				<li><a href="availability.php">Availability</a></li>
				<li><a href="payment.php">Payment</a></li>
   	    </ul>
   	</nav>
	
	<div id="mainpanelbook">
      
	</div>
	<div id="list">
	<form action="Book.php" method="POST" id="bookform">
	  <br><label>Choose Parking lot:</label>
	   <select name="parkinglot" >
            <option >select</option>
            <option value="pkl001">T-mall parking lot</option>
            <option value="pkl002">Harambee Avenue Parking Lot</option>
            <option value="pkl003">kencom house  parking lot</option>
            <option value="pkl004">Hilton Area Parking Lot</option>
            <option value="pkl005">Afya Center Parking Lot</option>
            <option value="pkl006">Odeon Parking Lot</option>
            <option value="pkl007">Jivanjee Parking Lot</option>
            <option value="pkl008">Kocha Area Parking Lot</option>
            <option value="pkl009">Moi Avenue Parking Lot</option>
            <option value="pkl010">Archives Area Parking Lot</a></option>
            <option value="pkl011">Uhuru Park Parking Lot</option>
            <option value="pkl012">Nyamakima Parking Lot</option>
            <option value="pkl013">Inter-continental Hotel Parking Lot</option>
            <option value="pkl014">Railways station Parking Lot</option>
            <option value="pkl015">Bus Station Parking Lot</option>
            <option value="pkl016">Syokimau Parking Lot</option>
            <option value="pkl017">Nyayo Parking Lot</option>
            <option value="pkl019">TRM Parking Lot</option>
            <option value="pkl020">Unicity Parking Lot</option>
            <option value="pkl021">Garden City Parking Lot</option>
            <option value="pkl022">Wendani Parking Lot</option>
         </select>
	     
            <label>Check In Date              :</label> <input type="date" name="datein" required class="insert">
		    <label>Check In Time          :</label> <input type="time" name="timein" required class="insert">
			<label>Check Out Date :</label> <input type="date" name="dateout" required class="insert">
			<label>Check Out Time       :</label> <input type="time" name="timeout" required class="insert">
			<label>Car Registration :</label> <input type="text" name="regno" value=
			                                                                   "<?php
			                                                                      $username=$_SESSION['username'];
																				  $query1="select * from user where email='$username'";
																				  $result1=mysqli_query($conn,$query1);
																				  $row1=mysqli_fetch_assoc($result1);
																				  $regno=$row1['plate_number'];
																				  echo $regno;
			                                                                    ?>" required class="insert">
			<input type="Submit" name="submit" value="Proceed To Pay" id="btn">
			<input type="reset" name="reset" value="Cancel" id="btn1">
		 </form>
	</div>
	 
	 <div id="sidepane">
        <p>Welcome to ParkEasy a solution that has revolutionized the parking industry</p><br>
		<img src="pic7.png">
		<p>Sign up today and be a part of millions of people enjoying convient parking services</p>
	 </div>
      <div id="bottompanel">
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