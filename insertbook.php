<style>
#proceed{
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

#full{
    color: white;
	width:auto%;
	hieght:5%;
	background:orange;
	font-family:calibri;
	font-size:22px;
	z-index:2000;
	position:absolute;
	top:97%;
	left:41%;
	text-align:center;
	border-radius:5px;
	text-decoration:none;	
	
}

#invadiddatein{
	position:absolute;
	color:red;
	top:60%;
	left:55%;
	z-index:2000;
	font-family:calibri;
	font-size:14px;
}

#pasttime{
	position:absolute;
	color:red;
	top:70%;
	left:53%;
	z-index:2000;
	font-family:calibri;
	font-size:14px;
}

#invaliddateout{
	position:absolute;
	color:red;
	top:79%;
	left:54%;
	z-index:2000;
	font-family:calibri;
	font-size:14px;
}

</style>
<?php
include 'dbconn.php';
include 'loginn.php';

if(isset($_POST['submit'])){
    $parkingid  =$_POST['parkinglot'];
	$datein = $_POST['datein'];
	$timein =$_POST['timein']; 
	$timeout = $_POST['timeout'];
	$dateout = $_POST['dateout'];
	$carregno= $_POST['regno'];	
	
	$dttimein=$datein. " ".$timein;
	$dttimeout=$dateout. " ".$timeout;
	
	$datetimein = strtotime($dttimein);
	$datetimeout = strtotime($dttimeout );
	
	 $query0="Select curtime() as timenow,curdate() as datenow from dual";
	 $result0=mysqli_query($conn,$query0);
	 $row0=mysqli_fetch_assoc($result0);
	 $curtime=$row0['timenow'];
	 $curdate=$row0['datenow'];
	 $dttimenow=$curdate." ".$curtime;
	 $datetimenow=strtotime($dttimenow);
	
	$query2="select fee from parkinglot where parkid='$parkingid'";
	$result2=mysqli_query($conn,$query2);
	$resultcheck= mysqli_num_rows($result2);
	$row1=mysqli_fetch_assoc($result2);
	$fee=$row1['fee'];
	
	$query3="select fee from parkinglot where parkid='$parkingid' ";
	$result3= mysqli_query($conn,$query3);
	$resultcheck= mysqli_num_rows($result3);
	$row2=mysqli_fetch_assoc($result3);
	$fee=$row2['fee'];
	
	$username=$_SESSION['username'];
	$query4="select * from user where email='$username'";
	$result4=mysqli_query($conn,$query4);
	$row4=mysqli_fetch_assoc($result4);
	$idno=$row4['idno'];
	
	$query5="select count(bookid) as count from book where parkid='$parkingid' and datetimeout>=$datetimenow and payment_status='paid'";
	$result5= mysqli_query($conn,$query5);
	$row5=mysqli_fetch_assoc($result5);
	$count=$row5['count'];
	
	$query6="SELECT * from parkinglot where parkid='$parkingid'";
	$result6=mysqli_query($conn,$query6);
	$row6=mysqli_fetch_assoc($result6);
	$capacity=$row6['capacity'];
	$parkname=$row6['parkname'];
	
	$query7="Select curdate() from dual";
	$result7=mysqli_query($conn,$query7);
	$row7=mysqli_fetch_assoc($result7);
	$curdate=$row7['curdate()'];
	
	$query8="Select curtime() as timenow from dual";
	$result8=mysqli_query($conn,$query8);
	$row8=mysqli_fetch_assoc($result8);
	$curtime=$row8['timenow'];
	 
	$dttimenow=$curdate." ".$curtime;
	$datetimenow=strtotime($dttimenow);
	
	$period=($datetimeout-$datetimein)/3600;
	$amount=$period*$fee;
	
	if($count<$capacity){
		if($datein<$curdate){
			echo'<div id="invadiddatein">Dont Enter Historic dates</div>';
			
		}
		else{
			
			if($dateout<$curdate){
				echo'<div id="invaliddateout">Dont Enter Historic dates</div>';
			}
			 else{
				 if($datetimein<$datetimenow){
				   echo'<div id="pasttime">Dont Enter Past time</div>';
			      }
				  else{
				 if($datetimeout<$datetimein){
					 echo'<div id="invaliddateout">Exit time should be greater than entry time</div>';
				 }
				 else{
	               $query = "INSERT INTO book values('','$carregno','$datein','$timein','$dateout','$timeout','$period','$idno','$parkingid','$amount','unpaid','$datetimein','$datetimeout')";
	              $result=$conn->query($query);
		
	              if($result){
		             header('location:payment.php');
	               }
	              else{
	                echo '<div id="proceed">Error</div>';
	              }
				 }
			 }
		}	
		}		
	}
	
    else{
	       echo '<div id="full">'.'&nbsp&nbsp&nbsp&nbsp'.$parkname.'Is Fully Parked'.'  <a href="availability.php">Check Availability</a>'.'&nbsp&nbsp&nbsp&nbsp'.'</div>';
    }	
}

?>