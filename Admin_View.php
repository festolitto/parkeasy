<?php
include 'dbconn.php';
include'managersession.php';
$username=$_SESSION['username'];
if(!isset($_SESSION['username'])){
	header('location:Admin_Login.php');
}

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
	 
	     <div id="sidepanel">
             <ul>
			      <div id="current"><a href="admin_view.php"><li><p>Bookings</p></li></a></div>
			      <a href="users.php"><li><p>Users<p></li></a>
			      <a href="parkinglots.php"><li><p>Parkinglots</p></li></a>
			      <a href="managers.php"><li><p>Managers</p></li></a>
			 </ul>
	     </div>
		<div id="viewpanel">
             <?php
                   include 'dbconn.php';
	               $sqldata="SELECT b.bookid,b.plate_number,b.datein,b.dateout,b.parkid,b.payment_status,u.idno FROM book b inner join user u using(idno) order by b.parkid";
                   $result=mysqli_query($conn,$sqldata);	  
		           echo '<table border=0 cellpadding=10 id="book">';
				   echo '<tr><th colspan=7 id="title"><h1>Booking Summary</h1></th></tr>';
		           echo "<tr><th>Book ID</th><th>Car Regno</th><th>Date_in</th><th>Date Out</th><th>Park ID</th><th>Status</th><th>ID NO</th></tr>";
		
		           while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				   echo "<tr>";
			       echo "<td>".$row['bookid']."</td>";
			       echo "<td>".$row['plate_number']."</td>";
			       echo "<td>".$row['datein']."</td>";
			       echo "<td>".$row['dateout']."</td>";
			       echo "<td>".$row['parkid']."</td>";
			       echo "<td>".$row['payment_status']."</td>";
			       echo "<td>".$row['idno']."</td>";
			       echo "</tr>";
				   
				   
		                                                               }
		           echo "</table>";
				   
				   $sqldata1="SELECT * from (select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl001') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl001') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl002') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl002') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl003') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl003') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl004') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl004') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl005') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl005') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl006') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl006') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl007') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl007') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl008') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl008') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl009') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl009') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl010') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl010') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl011') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl011') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl012') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl012') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl013') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl013') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl014') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl014') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl015') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl015') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl016') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl016') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl017') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl017') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl018') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl018') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl019') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl019') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl020') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl020') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,capacity,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl021') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl021')) as cust_view";
                   $result1=mysqli_query($conn,$sqldata1);	
		           echo '<table border=0 cellpadding=10>';
				   echo '<tr><th colspan=4 id="title"><h1>Parkinglots Summary</h1></th></tr>';
		           echo "<tr><th>Park ID</th><th>Park Name</th><th>Remaining Spaces</th><th>Capacity</th></tr>";
		
		           while($row1=mysqli_fetch_array($result1, MYSQLI_ASSOC)){
				   echo "<tr>";
			       echo "<td>".$row1['parkid']."</td>";
			       echo "<td>".$row1['parkname']."</td>";
			       echo "<td>".$row1['remaining_spaces']."</td>";
			       echo "<td>".$row1['capacity']."</td>";
			       echo "</tr>";                                                   }
		           echo "</table>";
				   
	            ?>
		</div>