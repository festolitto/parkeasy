<?php
include 'dbconn.php';
include'managersession.php';
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
	
	
	
	         <style>
			 
			             table{
							 
							 opacity:.95;
							 width:100%;
							 text-align:left;
							 
							 padding-bottom:7%;
						 }
						 
						 th,td,tr{
							
						 }
						 td{
		                   color:#405580;
	                       font-weight:bold;
	                       }
						   
						 #title{
							background:#03075D;
                            color:aqua;		
                            text-align:center;							
						 }
						 
						 th{
							 background:#F9D94A;
							 color:white;
							 text-transform:uppercase;	  
						 }
						 
						 tr:nth-child(even){
							 background:#f0f0f0;
						 }
						 
						 tr:nth-child(odd){
							 background:white;
						 }
						 
						#greetings ul{
						position:absolute;
						right:1%;
						top:0%;
						}
							
						#greetings ul li{
								list-style:none;
							}
							
						#current a li{
                            background:#F9D94A;
	
                        }
						 

						 
						 
			 </style>
	
	
	
	
  <script type ="text/javascript" src="jquery.iconify.js"></script>	
  
   </head >
   
   <body>
   
      <div id="body-home">
        <h1>Welcome</h1>
		
		
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
   	 			<li><a href="admin_view.php">HOME</a></li>
   	 			<li><a href="Manage_CarPark.php">MANAGE</a></li>

   	        </ul>
   	    </nav>
	 
	     <div id="sidepanel">
             <ul>
			      <a href="admin_view.php"><li><p>Bookings</p></li></a>
			      <a href="users.php"><li><p>Users<p></li></a>
			      <a href="parkinglots.php"><li><p>Parkinglots</p></li></a>
			      <div id="current"><a href="managers.php"><li><p>Managers</p></li></a></div>
			 </ul>
	     </div>
		<div id="viewpanel">
             <?php
                   include 'dbconn.php';
				   $sqldata3="SELECT * from parklotmanager";
                   $result3=mysqli_query($conn,$sqldata3);	  
		           echo '<table border=0 cellpadding=10 id="managers">';
				   echo '<tr><th colspan=6 id="title"><h1>parking Lot Managers</h1></th></tr>';
		           echo "<tr><th>Manager ID</th><th>FirstName</th><th>LastName</th><th>Park ID</th><th>Email</th></tr>";
		
		           while($row3=mysqli_fetch_array($result3, MYSQLI_ASSOC)){
				   echo "<tr>";
			       echo "<td>".$row3['managerid']."</td>";
			       echo "<td>".$row3['firstname']."</td>";
			       echo "<td>".$row3['lastname']."</td>";
			       echo "<td>".$row3['parkid']."</td>";
			       echo "<td>".$row3['email']."</td>";
			       
			       echo "</tr>";
		                                                               }
		           echo "</table>";
             ?>
		</div>