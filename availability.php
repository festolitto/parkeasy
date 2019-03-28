
<?php
include 'dbconn.php';
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
  
    <style>
	 table{
		 width:100%;
	 }
	 
	 #availtitle{
		background:#03075D;
		text-align:center;
	}
	h1{
		color:aqua;
	}
	
	 th{
		background:#F9D94A;
		text-align:left;
	}
	td{
	color:#405580;
	font-weight:bold;
	}
	
	tr:nth-child(odd){
		background:white;
		
	}
	
	 tr:nth-child(even){
		background:#f0f0f0;
		
	}
	footer{
		background:teal;
		width:100%;
		position:absolute;
		top:140%;
    }
	#parkeasy{
	         color:white;
	         font-weight:bold;
	         font-size:16;
	         margin-top:6%;
	         margin-left:2.3%;	 
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
				<li><a href="Book.php">Book</a></li>
   	 			<li><a href="navigate.php">locate</a></li>
				<li><a href="MyAccount.php">My Account</a></li>
				<li id="current"><a href="availability.php">Availability</a></li>
				<li><a href="payment.php">Payment</a></li>
   	    </ul>
   	 </nav>
        <h1>Welcome</h1>
	
	     <div id="sidepane">
          <p>Welcome to ParkEasy a solution that has revolutionized the parking industry</p><br>
		  <img src="pic7.png">
		  <p>Sign up today and be a part of millions of people enjoying convenient parking services</p>
	     </div>
		 <div id="mainpanelavailability">
		       <?php
                   include 'dbconn.php';
				   
				        $query8="Select curtime() as timenow,curdate() as datenow from dual";
	                    $result8=mysqli_query($conn,$query8);
	                    $row8=mysqli_fetch_assoc($result8);
	                    $curtime=$row8['timenow'];
	                    $curdate=$row8['datenow'];
	                    $dttimenow=$curdate." ".$curtime;
	                    $datetimenow=strtotime($dttimenow);
				   
	               $sqldata="SELECT * from (select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl001') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl001') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl002') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl002') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl003') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl003') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl004') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl004') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl005') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl005') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl006') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl006') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl007') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl007') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl008') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl008') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl009') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl009') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl010') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl010') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl011') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl011') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl012') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl012') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl013') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl013') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl014') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl014') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl015') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl015') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl016') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl016') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl017') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl017') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl018') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl018') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl019') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl019') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl020') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl020') union select `parkinglot`.`parkid` AS `parkid`,`parkinglot`.`parkname` AS `parkname`,`parkinglot`.`fee` AS `fee`,`parkinglot`.`openinghours` AS `openinghours`,(`parkinglot`.`capacity` - (select count(`book`.`bookid`) from `book` where ((`book`.`parkid` = 'pkl021') and (`book`.`payment_status` = 'paid') and (`book`.`datetimeout` >= $datetimenow)))) AS `remaining_spaces` from `parkinglot` where (`parkinglot`.`parkid` = 'pkl021')) as cust_view";
                   
				   
				   
                   $result=mysqli_query($conn,$sqldata);	  
		           echo "<table border=0 cellpadding=10>";
				   echo '<tr><th colspan=5 id="availtitle"><h1 >Parking Availability Summary</h1></th></tr>';
		           echo "<tr><th>Park_ID</th><th>parkname</th><th>spaces_remaining</th><th>fee</th><th>openinghours</th></tr>";
		
		           while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				   echo "<tr>";
			       echo "<td>".$row['parkid']."</td>";
			       echo "<td>".$row['parkname']."</td>";
			       echo "<td>".$row['remaining_spaces']."</td>";
			       echo "<td>".$row['fee']."</td>";
			       echo "<td>".$row['openinghours']."</td>";
			       echo "</tr>";
		                                                               }
		           echo "</table>";
             ?>
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