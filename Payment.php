<?php 
include 'loginn.php';
include'sessionmanager.php';

            $query0="Select curtime() as timenow,curdate() as datenow from dual";
	        $result0=mysqli_query($conn,$query0);
	        $row0=mysqli_fetch_assoc($result0);
	        $curtime=$row0['timenow'];
	        $curdate=$row0['datenow'];
	        $dttimenow=$curdate." ".$curtime;
	        $datetimenow=strtotime($dttimenow);

?>
<?php
if(isset($_POST['submit'])){
	$transaction=$_POST['transaction'];
	
	include 'dbconn.php';
	$username=$_SESSION['username'];
	$query4="select * from user where email='$username'";
	$result4=mysqli_query($conn,$query4);
	$row4=mysqli_fetch_assoc($result4);
	$idno=$row4['idno'];
	
	$query1="SELECT * From transaction where idno='$idno' and transactionid='$transaction'";
	$result1=mysqli_query($conn,$query1);
	$row2=mysqli_fetch_assoc($result1);
	$txnid=$row2['transactionid'];
	

	        if($result1){
					$row2=mysqli_num_rows($result1);
                    if($row2==0){

					  echo '<div id="invalid">INVALID TRANSACTION ID PLEASE RECHECK AND ENTER AGAIN</div>';
			        }
				else if($row2>0){
					    $query3="UPDATE book SET payment_status =  'paid' WHERE idno =  '$idno' and dateout>=curdate()";
						$result3= mysqli_query($conn,$query3);

					    echo '<div id="successmsg">
						                   <img src="image1.png">
						                   <div id="success">Booking Successful <a href="MyAccount.php">View</a></div>
								   </div>';
				}
			}
}
?>

<html>
 <head>
  <title>ParkEasy
  </title>
  <link rel="shortcut icon" href="icon.png" />
   <link rel="stylesheet" type="text/css" href="portal1.css">
  <script type ="text/javascript" src="jquery.iconify.js"></script>
    <style>
	    #invalid{
           color: white;
	       width:auto%;
	       hieght:5%;
	       background:orange;
	       font-family:calibri;
	       font-size:22px;
	       z-index:2000;
	       position:absolute;
	       top:87%;
	       left:34%;
	       text-align:center;
	       border-radius:5px;
	       text-decoration:none;	
	    }
		
		 #success{
           color: white;
	       width:100%;
	       hieght:5%;
	       background:#1EA01C;
	       font-family:calibri;
	       font-size:22px;
	       z-index:2000;
	       position:absolute;
	       top:91.5%;
	       text-align:center;
	       border-radius:5px;
	       text-decoration:none;	
	    }
		
		#successmsg{
		   width:20%;
           height:20%;	
           background:white;		   
		   position:absolute;
	       top:65%;
	       left:70%;
		   z-index:2001;
		   text-align:center;
		}
		
		img{
			width:40%;
			hieght:40%;
			margin:0 auto;
			
		}
		
		#txnlabel{
		  position:absolute;
         margin-left:40%;		  
		}
		#parkeasy{
	         color:white;
	         font-weight:bold;
	         font-size:16;
	         margin-top:6%;
	         margin-left:2.3%;
			 
        }
		a{
			color:red;
		}
		input{
		height:6%;
	    width:80%;
	    position:;
	    margin-left:40%;
	    display:block;
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
		 <p id="parkeasy">Park Easy</p>
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
			    <li ><a href="myservices.php">My services</a></li>
   	 			<li><a href="Book.php">Book</a></li>
   	 			<li><a href="navigate.php">locate</a></li>
				<li><a href="MyAccount.php">My Account</a></li>
				<li><a href="availability.php">Availability</a></li>
				<li id="current"><a>Payment</a></li>
   	    </ul>
   	</nav>
	<div id="payment">
         Payment
	</div>	
	 <div id="mpesa_logo">
         <img src="mpesa.png">
	</div>	
	<div id="paymentinfo">
    <p>
	To Pay your bill (KES.<a><?php
                    include 'dbconn.php';
				   	$username=$_SESSION['username'];
	                $query4="select * from user where email='$username'";
	                $result4=mysqli_query($conn,$query4);
	                $row4=mysqli_fetch_assoc($result4);
	                $idno=$row4['idno']; 
					
	                $sqldata="SELECT sum(amount) as amount FROM book where idno='$idno' and datetimeout>=$datetimenow and Payment_Status='unpaid'";
                    $result=mysqli_query($conn,$sqldata);
				    $row=mysqli_fetch_array($result);
				    $amount=$row['amount'];
				    
					if($amount){
						echo$amount;
					}
				   
				   else{ 
				        echo'00.00';
				       }
             ?>
			 </a>
	) 
	via MPESA. Follow the Steps Below. Once you receive a successful reply from Mpesa. Enter the M-pesa Transaction ID and Click the comfirm button below.
	</p>
	</div>
	
   
	
	
	
	<div id="mainpanelpayment">
	
            <p>step 1: Go to M-PESA on your phone</p> 
            <p>step 2: Select Pay Bill option</p>
            <p>step 3: Enter Business no. 200200</p>
            <p>step 4: Enter Account no. 0704010956</p>
            <p>step 5: Enter the Amount.</p>
            <p>step 6: Enter your M-PESA PIN and Send</p>
            <p>step 7: Enter the M-pesa Transaction ID below</p><br>
	    <form action="payment.php" method="POST">
	       <label id="txnlabel">Transaction ID:</label><input type="text" name="transaction" id="transactionid" required>
	       <input type="submit" name="submit" value="confirm" id="submit">
	    </form>
	 
	</div>
	
	 
	 <div id="sidepane">
        <p>Welcome to ParkEasy a solution that has revolutionized the parking industry</p><br>
		<img src="pic7.png">
		<p>Sign up today and be a part of millions of people enjoying convient parking services</p>
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