<style>
   #registered{
	   height:6%;
	   width:40%;
	   background:orange;
	   color:white;
	   z-index:3000;
	   margin-top:-3%;
	   margin-left:32.6%;
	   position:absolute;
	   font-family:calibri;
	   font-size:18px;
	   text-align:center;
	   
   }
   #error{
	    height:6%;
	   width:40%;
	   background:orange;
	   color:white;
	   z-index:3000;
	   margin-top:-3%;
	   margin-left:32.6%;
	   position:absolute;
	   font-family:calibri;
	   font-size:18px;
	   text-align:center;
   }
</style>

<?php
include 'dbconn.php';

if(isset($_POST['submit'])){
    $fname  =$_POST['fname'];
	$lname = $_POST['lname'];
	$idno =$_POST['idno']; 
	$regno = $_POST['regno'];
	$phone= $_POST['phone'];
	$email =$_POST['email'];
	$password  =$_POST['password'];

	
	$query1="SELECT email FROM user WHERE email='$email'";
	$result1=mysqli_query($conn,$query1);
	$resultcheck=mysqli_num_rows($result1);
	
    if ($resultcheck==0){
			$query = "INSERT INTO user values('$idno','$fname','$lname','$regno','$phone','$email','$password','')";
	        $result=$conn->query($query);
	    if($result){
		     echo '<div id="registered"><p>Registered Successfully  <a href="login.php">Login Here</a></div>';
	    }
	    else{
	          echo '<div id="error">Error</div>';
	    }
        }
	else{	
		    echo'<div id="registered">Email already exist</div>';
	           
    }		
}
?>