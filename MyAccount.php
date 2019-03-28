<?php
include 'loginn.php';
include'sessionmanager.php';
?>
<html>
   <head>
    <title class ="title">ParkEasy</title>
	<link rel="stylesheet" type="text/css" href="mystylesheet.css">
	<link rel="shortcut icon" href="icon.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width,initial scale=1.0">
  <script type ="text/javascript" src="jquery.iconify.js"></script>	
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
	#norecords{
	font-family:calibri;
    font-size:26;	
	color:orange;
	}
	
	#titleactive{
		background:#03075D;
	}
	#headeractive th{
		background:#F9D94A;
	}
	
	td{
		color:#405580;
	    font-weight:bold;
	}
	
	#activebooking tr:nth-child(odd){
		background:white;
		
	}
	
	#activebooking tr:nth-child(even){
		background:#f0f0f0;
		
	}

	#titlehist{
		background:#03075D;
	}
	#headerhist th{
		background:#F9D94A;
	}
	
	#history tr:nth-child(odd){
		background:white;
		
	}
	
	#history tr:nth-child(even){
		background:#f0f0f0;
		
	}
	#activebookingprint{
		 display:none;
	}
	button{
		height:7%;
		width:10%;
		background:#1de2ae;
		color:white;
		position:absolute;
		top:42.3%;
		left:88.4%;
		border-radius:5%;
	}
	#stamp{
		margin-left:33%;
	}
	
	#stamp p{
		background:#f0f0f0;
		font-family:calibri;
		font-size:30;
		font-weight:bold;
	}
	#datetime{
		margin-top:0;
	}
	img{
		position:absolute;
	    width:100%;
	    height:100%;
	    border-radius:50%;
	}
	#choose{
		position:absolute;
		top:40%;
		left:47%;
		height:4%;
		width:14%;
	}
	
	#upload{
		position:absolute;
		top:45%;
		left:47%;
		height:4%;
		width:14%;
	}
	#parkeasy{
	         color:white;
	         font-weight:bold;
	         font-size:16;
	         margin-top:6%;
	         margin-left:2.3%;
			 
        }
		h1{
			margin-left:8%;
		}
		#successful{
			color:green;
			margin-left:40%;
			margin-top:14%;
		}
		#unsuccessful{
			color:red;
			margin-left:40%;
			margin-top:14%;
		}
	
	</style>
   </head >
   
   <body>
   

   	 <Header class="header">
   	 	<div class="logo"> <image src="logo.jpg" ></div>
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
   
		 <p id="parkeasy">ParkEasy </p> 
     </header>

	<nav>
   	 	<ul>
   	 			<li><a href="myservices.php">My services</a></li>
				<li><a href="Book.php">Book</a></li>
   	 			<li><a href="navigate.php">locate</a></li>
				<li id="current"><a href="MyAccount.php">My Account</a></li>
				<li><a href="availability.php">Availability</a></li>
				<li><a href="payment.php">Payment</a></li>
   	    </ul>
   	 </nav>
        <h1>Welcome</h1>
		 <div id="accountmainpanel">
		    <h1>My Account</h1>
		   <div id="profpic">
		                    <img  src="<?php
							                $sql2="SELECT profile FROM user WHERE idno='$idno'";
											$output=mysqli_query($conn,$sql2);
											$data=mysqli_fetch_array($output);
											$profile=$data['profile'];
											echo$profile;
											
											
									  ?>">
									  <?php
									  if(!$profile){
									                  echo'<img src="usericon1.png">';
								                }
										?>		
							</div>
		                 
						  
						  <?php
						       if(isset($_POST['upload'])){  
								   $prof=$_POST['prof'];
								   $sql="Update user set profile='$prof' where idno='$idno'";
								   $output1=mysqli_query($conn,$sql);
								   if($output){
									   echo'<div id="successful">Profile updated successfully, please refresh page to view</div>';
									   echo("<meta http-equiv='refresh' content='1'>");
								   }
								   else{
									   echo'<div id="Unsuccessful">Too large image, Please choose a file not more than 6KB</div>';
								   }
											 
							   }
						     
						  ?>
						  
						  
						  
						  
		   
		    <form method="POST" ACTION="MyAccount.php"> 
							       <input type="file" name="prof" id="choose" required><input type="submit" name="upload" value="Upload" id="upload">
			              </form>
		  <div id="details"> <p >Personal details</p></div>
		   <p>Name</p>
		   <p>User ID</p>
		   <p>Car Model</p>
		   <p>Car Registration</p>
		   <p>Phone</p>
		   <p>Email</p>
		   <div id="output">
		         <?php
				   	$username=$_SESSION['username'];
	                $query4="select * from user where email='$username'";
	                $result4=mysqli_query($conn,$query4);
	                $row4=mysqli_fetch_assoc($result4);
	                $idno=$row4['idno']; 
					
                    include 'dbconn.php';
	                $sqldata="SELECT * FROM user where idno='$idno'";
                    $result=mysqli_query($conn,$sqldata);
				    $resultcheck= mysqli_num_rows($result);
				    if($resultcheck >0){
				    while($row=mysqli_fetch_assoc($result)){
						   echo $row['firstname'];
					   }
				   } 
                ?>
	
		   </div>
		   <div id="output1">
		        <?php
                   include 'dbconn.php';
				   	$username=$_SESSION['username'];
	                $query4="select * from user where email='$username'";
	                $result4=mysqli_query($conn,$query4);
	                $row4=mysqli_fetch_assoc($result4);
	                $idno=$row4['idno']; 
					
	                $sqldata="SELECT * FROM user where idno='$idno'";
                    $result=mysqli_query($conn,$sqldata);
				    $resultcheck= mysqli_num_rows($result);
				    if($resultcheck >0){
				    while($row=mysqli_fetch_assoc($result)){
						   echo $row['idno'];
					   }
				   } 
                ?>
		   </div>
		   <div id="output2">
		        <?php
                   include 'dbconn.php';
				   $username=$_SESSION['username'];
	               $query4="select * from user where Email='$username'";
	               $result4=mysqli_query($conn,$query4);
	               $row4=mysqli_fetch_assoc($result4);
	               $idno=$row4['idno']; 
				   
	               $sqldata="SELECT * FROM user where idno='$idno'";
                   $result=mysqli_query($conn,$sqldata);
				   $resultcheck= mysqli_num_rows($result);
				   if($resultcheck >0){
				   while($row=mysqli_fetch_assoc($result)){
				               echo $row['plate_number'];
					   }
				   } 
                ?>
		   </div>
		   <div id="output3">
		        <?php
				   	$username=$_SESSION['username'];
	                $query4="select * from user where email='$username'";
	                $result4=mysqli_query($conn,$query4);
	                $row4=mysqli_fetch_assoc($result4);
	                $idno=$row4['idno']; 
					
                    include 'dbconn.php';
	                $sqldata="SELECT * FROM user where idno='$idno'";
                    $result=mysqli_query($conn,$sqldata);
				    $resultcheck= mysqli_num_rows($result);
				    if($resultcheck >0){
				    while($row=mysqli_fetch_assoc($result)){
						   echo $row['plate_number'];
					   }
				   } 
                ?>
		   </div>
		   <div id="output4">
		       		         <?php
                    include 'dbconn.php';
				   	$username=$_SESSION['username'];
	                $query4="select * from user where email='$username'";
	                $result4=mysqli_query($conn,$query4);
	                $row4=mysqli_fetch_assoc($result4);
	                $idno=$row4['idno']; 
					
	                $sqldata="SELECT * FROM user where idno='$idno'";
                    $result=mysqli_query($conn,$sqldata);
				    $resultcheck= mysqli_num_rows($result);
				    if($resultcheck >0){
				    while($row=mysqli_fetch_assoc($result)){
						   echo $row['phone'];
					   }
				   } 
                ?>
		   </div>
		   <div id="output5">
		      	 <?php
                    include 'dbconn.php';
				   	$username=$_SESSION['username'];
	                $query4="select * from user where email='$username'";
	                $result4=mysqli_query($conn,$query4);
	                $row4=mysqli_fetch_assoc($result4);
	                $idno=$row4['idno']; 
					
	                $sqldata="SELECT * FROM user where idno='$idno'";
                    $result=mysqli_query($conn,$sqldata);
				    $resultcheck= mysqli_num_rows($result);
				    if($resultcheck >0){
				    while($row=mysqli_fetch_assoc($result)){
						   echo $row['email'];
					   }
				   } 
                ?>
		   </div>
		  
		   <div id="counter"></div>
		   
		   <div id="activebookingprint">
		   
		          <div id="stamp">
				      <p>PARKEASY COMPANY LTD,</p>
				      <p>P.O BOX 6484-00100,</p>
				      <p>NAIROBI, KENYA.</p>
				      <p id="datetime"><?php
					         $sqldata="SELECT now() as now FROM dual";
                             $result=mysqli_query($conn,$sqldata);
				             $row=mysqli_fetch_assoc($result);
						      $now=$row['now'];
							  echo$now;    
					      ?>
					  </p>
				  </div>
		      <?php
			        $username=$_SESSION['username'];
	                $query4="select * from user where email='$username'";
	                $result4=mysqli_query($conn,$query4);
	                $row4=mysqli_fetch_assoc($result4);
	                $idno=$row4['idno']; 
					
						$query8="Select curtime() as timenow,curdate() as datenow from dual";
	                    $result8=mysqli_query($conn,$query8);
	                    $row8=mysqli_fetch_assoc($result8);
	                    $curtime=$row8['timenow'];
	                    $curdate=$row8['datenow'];
	                    $dttimenow=$curdate." ".$curtime;
	                    $datetimenow=strtotime($dttimenow);
						
						$query9="select datetimein,datetimeout from cust_view where idno =$idno";
	                    $result9=mysqli_query($conn,$query9);
	                    $row9=mysqli_fetch_assoc($result9);
	                    $datetimein=$row9['datetimein'];
	                    $datetimeout=$row9['datetimeout'];
	                  
	                    
				   $query5="select * from cust_view where idno =$idno and datetimeout>'$datetimenow' order by datetimeout desc ";
				   $result5=mysqli_query($conn,$query5);
				   
				   $resultcheck5= mysqli_num_rows($result5);
				   
				    if($resultcheck5<1){
						echo'<div id="norecords">No Records Found For Active Bookings</div>';
					}
					else{
		           echo '<table border=0 cellpadding=10 id="table">';
				   echo'<tr ><th colspan=9 id="titleactive"><h1>My Active Bookings</h1></th></tr>';
		           echo '<tr id="headeractive"><th>DATE IN</th><th>DATE OUT</th><th>BOOK ID</th><th>CAR REGNO</th><th>PARKING LOT</th><th>TIMEIN</th><th>TIMEOUT</th><th>AMOUNT</th><th>Payment_Status</th></tr>';
				  
		
		           while($row=mysqli_fetch_array($result5, MYSQLI_ASSOC)){
					   
				   echo "<tr>";
			       echo "<td><a>".$row['datein']."</a></td>";
			       echo "<td><a>".$row['dateout']."</a></td>";
			       echo "<td>".$row['bookid']."</td>";
			       echo "<td>".$row['plate_number']."</td>";
			       echo "<td>".$row['parkname']."</td>";
			       echo "<td>".$row['timein']."</td>";
			       echo "<td>".$row['timeout']."</td>";
			       echo "<td>".$row['amount']."</td>";
			       echo "<td>".$row['payment_status']."</td>";
			       echo "</tr>";
		                                                               }
		           echo "</table>";
					}
			  ?>
			  </div>
			  <button onclick="printContent('activebookingprint')">Print Receipt</button>
					 <div id="activebooking">
					
					<?php
					
					
			       $query5="select * from cust_view where idno =$idno and datetimeout>'$datetimenow' ";
				   $result5=mysqli_query($conn,$query5);
				   
				   $resultcheck5= mysqli_num_rows($result5);
				   
				    if($resultcheck5<1){
						echo'<div id="norecords">No Records Found For Active Bookings</div>';
					}
					else{
		           echo '<table border=0 cellpadding=10 >';
				   echo'<tr ><th colspan=9 id="titleactive"><h1>My Active Bookings</h1></th></tr>';
		           echo '<tr id="headeractive"><th>DATE IN</th><th>DATE OUT</th><th>BOOK ID</th><th>CAR REGNO</th><th>PARKING LOT</th><th>TIMEIN</th><th>TIMEOUT</th><th>AMOUNT</th><th>Payment_Status</th></tr>';
				  
		
		           while($row=mysqli_fetch_array($result5, MYSQLI_ASSOC)){
					   
				   echo "<tr>";
			       echo "<td><a>".$row['datein']."</a></td>";
			       echo "<td><a>".$row['dateout']."</a></td>";
			       echo "<td>".$row['bookid']."</td>";
			       echo "<td>".$row['plate_number']."</td>";
			       echo "<td>".$row['parkname']."</td>";
			       echo "<td>".$row['timein']."</td>";
			       echo "<td>".$row['timeout']."</td>";
			       echo "<td>".$row['amount']."</td>";
			       echo "<td>".$row['payment_status']."</td>";
			       echo "</tr>";
		                                                               }
		           echo "</table>";
					}
			  ?>
		   </div><br>
		   
		   
		   <div id="history"> 
		      <?php
			        $username=$_SESSION['username'];
	                $query6="select * from user where email='$username'";
	                $result6=mysqli_query($conn,$query6);
	                $row6=mysqli_fetch_assoc($result6);
	                $idno=$row6['idno']; 
		
					
			       $query7="select * from cust_view where idno =$idno and datetimeout<'$datetimenow' order by datetimeout desc";
				   $result7=mysqli_query($conn,$query7);
				   $resultcheck7= mysqli_num_rows($result7);
				   if($resultcheck7<1){
					   echo'<div id="norecords">You Have No History On parking Records</div>';
				   }
				   else{
		           echo '<table border=0 cellpadding=10 >';
				   echo'<tr ><th colspan=9 id="titlehist"><h1>My Bookings History</h1></th></tr>';
		           echo '<tr id="headerhist"><th>DATE IN</th><th>DATE OUT</th><th>NATIONAL ID</th><th>BOOKING ID</th><th>PARKING LOT</th><th>TIME IN</th><th>TIME OUT</th><th>AMOUNT</th><th>Payment_Status</th></tr>';
		
		           while($row=mysqli_fetch_array($result7, MYSQLI_ASSOC)){
				   echo "<tr>";
			       echo "<td>".$row['datein']."</td>";
			       echo "<td>".$row['dateout']."</td>";
			       echo "<td>".$row['idno']."</td>";
				   echo "<td>".$row['bookid']."</td>";
			       echo "<td>".$row['parkname']."</td>";
			       echo "<td>".$row['timein']."</td>";
			       echo "<td>".$row['timeout']."</td>";
			       echo "<td>".$row['amount']."</td>";
			       echo "<td>".$row['payment_status']."</td>";
			       echo "</tr>";
		           }
		           echo "</table>";
				   }
			  ?>
		   </div>
 </div>
		<footer>
		    <ul>
		      <li><a href="index.php">Home</a></li> 
			  <li><a href="about.php">About Us</a></li>
		      <li><a href="">Contact Us</a></li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			  <li>&copy; 2018 ParkEasy-ALL RIGHTS RESERVED</li>
			</ul> 
		</footer>
 </body>
</html>