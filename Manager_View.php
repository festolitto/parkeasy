<?php  
include 'dbconn.php';
include'managersession.php';
$username=$_SESSION['username'];

            $query0="Select curtime() as timenow,curdate() as datenow from dual";
	        $result0=mysqli_query($conn,$query0);
	        $row0=mysqli_fetch_assoc($result0);
	        $curtime=$row0['timenow'];
	        $curdate=$row0['datenow'];
	        $dttimenow=$curdate." ".$curtime;
	        $datetimenow=strtotime($dttimenow);
?>
<html>
   <head>
    <title class ="title">ParkEasy</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="shortcut icon" href="icon.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width,initial scale=1.0">
	
	<script>
      function printContent(el){
	    var restorepage = document.body.innerHTML;
	    var printcontent = document.getElementById(el).innerHTML;
	    document.body.innerHTML = printcontent;
	    window.print();
	    document.body.innerHTML = restorepage;
      }
   </script>
	
	         <style>
			 
			             table{
							 
							 opacity:.95;
							 width:100%;
							 text-align:left;
							 padding-bottom:7%;
						 }
						 th{
							
						 }
						  
						  #title{
							  background:#03075D;
							  color:aqua;
							  height:100%;
							  text-align:center;
						  }
						  
						 th{
							 background:#F9D94A;
							 color:white;
							 text-transform:uppercase;
							 
							  
						 }
						 
						 td{
							 color:#405580;
							 font-weight:bold;
						 }
						 
						 tr:nth-child(even){
							 background:#f0f0f0;
						 }
						 
						  tr:nth-child(odd){
							 background:white;
						 }
						 
						#pname{
							text-align:center;
							margin:auto;
							margin-top:-1%;
							color:black;
							
					    } 
						#greetings ul{
							position:absolute;
							right:1%;
							top:0%;
						}
							
						#greetings ul li{
								list-style:none;
							}
							
						button{
								height:7%;
		                        width:10%;
		                        background:#1de2ae;
		                        color:white;
		                        position:absolute;
		                        top:22%;
		                        left:89.3%;
		                        border-radius:5%;
							}
							
						    #norecords{
	                              font-family:calibri;
                                  font-size:26;	
	                              color:orange;
	                              }
								  
						     #total{
								 height:auto;
								 width:40%;
								 color:#405580;
								 background:#f0f0f0;
								 margin-left:30%;
								 text-align:center;
							 }
							 
							 #parkeasy{
	                                  color:white;
	                                  font-weight:bold;
	                                  font-size:16;
	                                  margin-top:-3%;
	                                  margin-left:2.3%;
			 
                            }
						 
			</style>
	
  <script type ="text/javascript" src="jquery.iconify.js"></script>	
  
   </head >
   
   <body>
   
      <div id="body-home">
   
   	 <Header class="header">
   	 	<div class="logo"> <img src="logo.jpg" ></div>
		<div>
		 <p id="motto">Manager Portal</p> 
		 <p ><h1 id="pname"><?php 
				   $query="Select pm.parkid,p.parkname from parklotmanager pm join parkinglot p using(parkid) where username='$username'";
				   $result=mysqli_query($conn,$query);
				   $row=mysqli_fetch_assoc($result);
				   $parkid=$row['parkid'];
				   $name=$row['parkname'];
		            echo $name;
		        ?></h1></p>
		 </div>
		 <p id="parkeasy">ParkEasy </p> 
		  
		<div id="greetings">
		  <ul>
	        <li>
		         <?php
	                $query="select * from parklotmanager where username='$username'";
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
	
	     <div id="sidepanel">
                <ul>
			      <a href="#total"><li><p>Bookings</p></li></a>
			      <a href="#users"><li><p>Users<p></li></a>
			      <a href="#spaces"><li><p>Parkinglots</p></li></a>
			 </ul>
	     </div>
		<div id="viewpanel">
		<button onclick="printContent('activetable')">Print Receipt</button>
             <?php 
				   $query="Select pm.parkid,p.parkname from parklotmanager pm join parkinglot p using(parkid) where username='$username'";
				   $result=mysqli_query($conn,$query);
				   $row=mysqli_fetch_assoc($result);
				   $parkid=$row['parkid'];
				   $name=$row['parkname'];
				   
	               $sqldata1="SELECT * FROM book where parkid='$parkid'";
                   $result1=mysqli_query($conn,$sqldata1);	
				   $resultcheck1=mysqli_num_rows($result1);

                    
				   $sqldata2="SELECT sum(amount) as total FROM book where parkid='$parkid' and payment_status='paid'";
                   $result2=mysqli_query($conn,$sqldata2);	
				   $row2=mysqli_fetch_assoc($result2);
				   $total=$row2['total'];
				   
				   
				   $resultcheck2=mysqli_num_rows($result2);

                   $query4="SELECT * FROM user";
				   $result4=mysqli_query($conn,$query4);
				   
				   $query3="SELECT * FROM book where parkid='$parkid' and datetimeout>=$datetimenow and payment_status='paid'";
				   $result3=mysqli_query($conn,$query3);
				   $resultcheck3=mysqli_num_rows($result3);
				   
				   
				   echo '<div id="total">';
				   echo '<h1>'.$name.' Total</h1>';
		           echo "KSH   ";
				   echo $total;
			   
		           echo "</div><br>";
				
				   
				 if($resultcheck3>0){
					 echo'<div id="activetable">';
		           echo '<table border=0 cellpadding=10 id="activetable">';
				   echo '<tr><th colspan=9 id="title"><h1>'.$name.' Active Bookings</h1></th></tr>';
		           echo "<tr><th>PAKR ID</th><th>BOOKING ID</th><th>REGISTRATION_NO</th><th>NATIONAL_ID</th><th>DATEIN</th><th>DATEOUT</th><th>STATUS</th></tr>";
		
		           while($row3=mysqli_fetch_array($result3, MYSQLI_ASSOC)){
				   echo "<tr>";
			       echo "<td>".$row3['parkid']."</td>";
			       echo "<td>".$row3['bookid']."</td>";
				   echo "<td>".$row3['plate_number']."</td>";
				   echo "<td>".$row3['idno']."</td>";
			       echo "<td>".$row3['datein']."</td>";
			       echo "<td>".$row3['dateout']."</td>";			       
			       echo "<td>".$row3['payment_status']."</td>";
			       echo "</tr>";
		                                                               }
		           echo "</table>";
		           echo'</div>';
		           }
				   else{
					   echo'<div id="norecords">No records for Active Booking</div>';
				   }
				   
			    if($resultcheck1>0){
		           echo '<table border=0 cellpadding=10 id="spaces">';
				   echo '<tr><th colspan=9 id="title"><h1>'.$name.' Report</h1></th></tr>';
		           echo "<tr><th>PAKR ID</th><th>BOOKING ID</th><th>REGISTRATION_NO</th><th>NATIONAL_ID</th><th>DATEIN</th><th>DATEOUT</th><th>STATUS</th></tr>";
		
		           while($row1=mysqli_fetch_array($result1, MYSQLI_ASSOC)){
				   echo "<tr>";
			       echo "<td>".$row1['parkid']."</td>";
			       echo "<td>".$row1['bookid']."</td>";
				   echo "<td>".$row1['plate_number']."</td>";
				   echo "<td>".$row1['idno']."</td>";
			       echo "<td>".$row1['datein']."</td>";
			       echo "<td>".$row1['dateout']."</td>";			       
			       echo "<td>".$row1['payment_status']."</td>";
			       echo "</tr>";
		                                                               }
		           echo "</table>";
				   
				}
				   
				   
				   echo '<table border=0 cellpadding=10 id="users">';
				   echo '<tr><th colspan=6 id="title"><h1>Registered Users</h1></th></tr>';
		           echo "<tr><th>User ID</th><th>FirstName</th><th>LastName</th><th>Car Regno</th><th>Email</th><th>Phone</th></tr>";
		
		           while($row4=mysqli_fetch_array($result4, MYSQLI_ASSOC)){
				   echo "<tr>";
			       echo "<td>".$row4['idno']."</td>";
			       echo "<td>".$row4['lastname']."</td>";
			       echo "<td>".$row4['firstname']."</td>";
			       echo "<td>".$row4['plate_number']."</td>";
			       echo "<td>".$row4['email']."</td>";
			       echo "<td>".$row4['phone']."</td>";
			       
			       echo "</tr>";
		                                                               }
		           echo "</table>";
             ?>
		</div>