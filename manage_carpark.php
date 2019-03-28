<?php
include'insertcarpark.php';
include 'dbconn.php';
$username=$_SESSION['username'];
if(!isset($_SESSION['username'])){
	header('location:Admin_Login.php');
}
?>
<html>
   <head>
    <title class ="title">ParkEasy</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="shortcut icon" href="icon.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width,initial scale=1.0">
  <script type ="text/javascript" src="jquery.iconify.js"></script>	
        <style>
		
		
		     #greetings ul{
					position:absolute;
					right:1%;
					top:0%;
			}
							
			#greetings ul li{
					list-style:none;
			}
							
	        #addbtn{
				position:absolute;
				height:10%;
				width:40%;
				color:white;
				background:#405580;
				font-size:20px;
				font-familily:calibri;
				border-radius:5%;
				margin-left:10%;
				margin-top:0%;
			}
			
			#addbtn1{
				position:absolute;
				height:10%;
				width:40%;
				color:white;
				background:#405580;
				font-size:20px;
				font-familily:calibri;
				border-radius:5%;
				margin-left:10%;
				margin-top:15%;
			}
			
			#addbtn2{
				position:absolute;
				height:10%;
				width:40%;
				color:white;
				background:#405580;
				font-size:20px;
				font-familily:calibri;
				border-radius:5%;
				margin-left:10%;
				margin-top:30%;
			}
			
			#hello{
	          color: white;
	          width:30%;
	          hieght:5%;
	          background:#1EA01C;
	          font-family:calibri;
	          font-size:22px;
	          z-index:2000;
	          position:absolute;
	          top:97%;
	          left:43%;
	          text-align:center;
	          border-radius:5px;
	          text-decoration:none;
            }
			
			#addparkform{
				border: 1px solid black;
				margin-top:%;
				z-index:3000;
				margin-left:60%;
				height:auto;
				width:30%;
				content-align:center;
			}
			
			#formtitle{
				color:white;
				width:30.2%;
				height:10%;
				background:#5892ef;
				margin-top:-5%;
				margin-left:60%;
				text-align:center;
                font-family:calibri;
                font-size:28px;
                font-style:bold;
			}
		
			#addparkform label{
				font-family:calibri;
			    font-size:20px;
			    display:block;
				margin-left:1%;
			}
			
			#addparkform input{
		    height:8%;
			font-size:13px;
			border:1px solid #5892ef;
			margin:1% auto;
			width:75%;
			margin-left:10%;
			}
			
			#managemainpanel{
			   position:absolute;
               top:20%;
               left:10%;
               width:80%;
               height:100%;
               background:;
			}
			
			h1{
				margin-left:24%;
			}
			
	    </style>
   </head >
   
   <body>
   
      <div id="body-home">
   
   	 <Header class="header">
   	 	<div class="logo"> <img src="logo.jpg" ></div>
		<div>
		 <p id="motto">Admin Portal</p> 
		 </div>
		 <p>ParkEasy </p> 
		  <div id="greetings">
		   <ul>
	          <li>
		         <?php
	                $query="select * from admin where username='$username'";
	                $result=mysqli_query($conn,$query);
	                $row=mysqli_fetch_assoc($result);
	                $mname=$row['firstname']; 
					
	                $row1=mysqli_num_rows($result);
			        if($row1>0){
						   echo 'You are logged as '.$mname;
					}
			        
			    ?> 
		      </li><br>
		     <li><a href="logout.php">Logout</a></li>
		   </ul>
		</div>
     </header>
        <h1>Welcome</h1>
		  <nav>
   	 	   <ul>   	
   	 			<li><a href="admin_view.php">Home</a></li>
   	 			<li><a href="Manage_CarPark.php">Manage</a></li>

   	       </ul>
   	     </nav>
	
		<div id="managemainpanel">
		  <form ACTION="manage_carpark.php" method="POST">
		     <h1>Manage</h1>
			 <input type="submit" name="addbtn" id="addbtn" value="Add Car park">
			 <input type="submit" name="addbtn1" id="addbtn1" value="Remove Car park">
			 <input type="submit" name="addbtn2" id="addbtn2" value="Update Car park">
			 
			 
		  </form>

		  <?php
              if(isset($_POST['addbtn'])){
	               echo
					       '<div id="formtitle"><p>Add Car Park</p></div>
						   
						   <form ACTION="manage_carpark.php" method="POST" id="addparkform">
		                      
			                <label>Car Park Name</label><input type="text" name="parkname">
			                <label>Car park ID</label><input type="" name="parkid">
			                <label>Location</label><input type="" name="location">
			                <label>Opening Hours</label><input type="" name="openinghours">
			                <label>Capacity</label><input type="" name="capacity">
			                <label>Fee Per Hour</label><input type="" name="fee">
							<input type="submit" name="add" value="ADD" id="addbutton">
		                 </form>';
                  }
         ?>
		  <?php
		      if(isset($_POST['addbtn2'])){
		               echo '<div id="formtitle"><p>Update Car Park</p></div>
						   
						   <form ACTION="manage_carpark.php" method="POST" id="addparkform">
		                      
			                <label>Car park ID</label><input type="text" name="parkid" required>
			                <label>Opening Hours</label><input type="text" name="openinghours">
			                <label>Capacity</label><input type="text" name="capacity">
			                <label>Fee Per Hour</label><input type="text" name="fee">
							<input type="submit" name="updatebtn" value="Update" id="addbutton">
		                 </form>';
						 }
		
		  ?>
		  		  <?php
		      if(isset($_POST['addbtn1'])){
		               echo '<div id="formtitle"><p>Remove Car Park</p></div>
						   
						   <form ACTION="manage_carpark.php" method="POST" id="addparkform">
		                      
			                
			                <label>Car park ID</label><input type="text" name="parkid">
							<input type="submit" name="removebtn" value="Remove" id="addbutton">
			              
		                 </form>';
						 }
		
		  ?>
		  </div>