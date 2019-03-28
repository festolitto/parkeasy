 
 <style>
    #success{
	color: white;
	width:30%;
	hieght:5%;
	background:#1EA01C;
	font-family:calibri;
	font-size:22px;
	z-index:2000;
	position:absolute;
	top:50%;
	left:56%;
	text-align:center;
	border-radius:5px;
	text-decoration:none;
}

#error{
    color: white;
	width:auto%;
	hieght:50%;
	background:orange;
	font-family:calibri;
	font-size:22px;
	z-index:2000;
	position:absolute;
	top:50%;
	left:60%;
	text-align:center;
	border-radius:5px;
	text-decoration:none;	
	
}
 </style>
 
 <?php
session_start();
include 'dbconn.php';
if(isset($_POST['add'])){
    $ParkName  =$_POST['parkname'];
	$ParkID = $_POST['parkid'];
	$Location =$_POST['location']; 
	$OpeningHours = $_POST['openinghours'];
	$Capacity= $_POST['capacity'];
	$Fee =$_POST['fee'];
	
	$query = "INSERT INTO parkinglot 
	values('$ParkID','$ParkName','$Location','$OpeningHours','$Capacity','$Fee')";
	$result=$conn->query($query);
	if($result){
		echo '<div id="success">Car Park Added Successfully</div>';
	}
	else{
	 echo "Error";
	}		
}

if(isset($_POST['removebtn'])){
	$ParkID = $_POST['parkid'];
    if(empty($ParkID)){
		echo'<div id="error">please Enter Park ID</div>';
		
	}
	else{
	
	
	$query = "DELETE FROM parkinglot WHERE parkid='$ParkID'";
	$result=$conn->query($query);
	if($result){
		echo '<div id="success">Parking Lot deleted successfully</div>';
	}
	else{
	 echo "Error";
	}
	}	
}

if(isset($_POST['updatebtn'])){
	$ParkID = $_POST['parkid'];
	$OpeningHours = $_POST['openinghours'];
	$Capacity= $_POST['capacity'];
	$Fee =$_POST['fee'];
	if(empty($Fee) && empty($OpeningHours)){
		$query = "update parkinglot set  capacity=$Capacity where parkid ='$ParkID'";
        $result=$conn->query($query);
		if($result){
			echo'<div id="success">Capacity updated successfully</div>';
		}
		else{
			echo'<div id="error">Capacity Update unsuccessful</div>';
		}
	}
	else if(empty($Capacity) && empty($OpeningHours)){
				$query1 = "update parkinglot set  fee=$Fee where parkid ='$ParkID'";
                $result1=$conn->query($query1);
		        if($result1){
			           echo'<div id="success">Parking Fee updated successfully</div>';
                }
		        else{
			           echo'<div id="error">Parking Fee Update unsuccessful</div>';
		        }
		
		
	}
	else if(empty($Capacity) && empty($Fee)){
		      	$query2 = "update parkinglot set  openinghours=$OpeningHours where parkid ='$ParkID'";
                $result2=$conn->query($query2);
		        if($result2){
			           echo'<div id="success">openinghours updated successfully';
                }
		        else{
			           echo'<div id="success">openinghours Update unsuccessful';
		        }
		
	}
		else if(!empty($Capacity) && !empty($Fee) && !empty($OpeningHours)){
		      	$query3 = "update parkinglot set openinghours='$OpeningHours',fee=$Fee,capacity=$Capacity where parkid ='$ParkID'";
                $result3=$conn->query($query3);
		        if($result3){
			           echo'<div id="success">All updated successfully</div>';
                }
		        else{
			           echo' <div id="error">Update unsuccessful</div>';
		        }
		
	}	
	    	else if(!empty($Capacity) && !empty($Fee) && empty($OpeningHours)){
		      	$query4 = "update parkinglot set fee=$Fee,capacity=$Capacity where parkid ='$ParkID'";
                $result4=$conn->query($query4);
		        if($result4){
			           echo'<div id="success">Capacity And Fee updated successfully</div>';
                }
		        else{
			           echo'<div id="error">Capacity And Fee Update unsuccessful</div>';
		        }
		
	}
	        	else if(!empty($Capacity) && empty($Fee) && !empty($OpeningHours)){
		      	$query5 = "update parkinglot set  openinghours='$OpeningHours',capacity=$Capacity where parkid ='$ParkID'";
                $result5=$conn->query($query5);
		        if($result5){
			           echo'<div id="success">Capacity and openinghours updated successfully</div>';
                }
		        else{
			           echo'<div id="error">capacity and openinghours Update unsuccessful</div>';
		        }
		
	}	
	
			else if(empty($Capacity) && !empty($Fee) && !empty($OpeningHours)){
		      	$query6 = "update parkinglot set  openinghours='$OpeningHours',fee=$Fee where parkid ='$ParkID'";
                $result6=$conn->query($query6);
		        if($result6){
			           echo'<div id="success">Fee and openinghours updated successfully</div>';
                }
		        else{
			           echo'<div id="error">Fee and openinghours Update unsuccessful</div>';
		        }
		
	}	
	
	
}
?>