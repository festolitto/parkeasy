<?php
?>
<html>
   <head>
    <title class ="title">ParkEasy</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="shortcut icon" href="icon.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width,initial scale=1.0">
  <script type ="text/javascript" src="jquery.iconify.js"></script>	
  
   </head >
   
   <body>
   
      <div id="body-home">
   
   	 <Header class="header">
   	 	<div class="logo"> <img src="logo.jpg" ></div>
		<div>
		 <p id="motto">Admin Portal</p> 
		 </div>
		 <p>ParkEasy </p> 
     </header>
        <h1>Welcome</h1>
	
		<div id="mainpanel">
		  <form ACTION="insertcarpark.php" method="POST">
		     <p>Add A Car Park</p>
			 <label>Car Park Name</label><input type="text" name="parkname"><br><br><br>
			 <label>Car park ID</label><input type="" name="parkid"><br><br><br>
			 <label>Location</label><input type="" name="location"><br><br><br>
			 <label>Opening Hours</label><input type="" name="openinghours"><br><br><br>
			 <label>Capacity</label><input type="" name="capacity"><br><br><br>
			 <label>Fee Per Hour</label><input type="" name="fee"><br><br><br>
			 <input type="submit" value="Add" name="submit" id="submit">
			 <input type="button" name="Cancel" value="Cancel" id="cancel">
			 
		  </form>
		</div>