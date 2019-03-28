              <?php
                   include 'dbconn.php';
	               $sqldata="SELECT * FROM register where ID_No='33232725';";
                   $result=mysqli_query($conn,$sqldata);
				   $resultcheck= mysqli_num_rows($result);
				   if($resultcheck >0){
					   while($row=mysqli_fetch_assoc($result)){
						   echo $row['FirstName'];
					   }
				   }
				   
             ?>
	