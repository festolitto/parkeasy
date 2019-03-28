 <script >
     
	 
	 
            
 
			 
			          $(document).ready(function(){
						 
						    $("#register").validate({
								rules:{
									
									  fname:{
										  required:true,
										  minlength:3,
										  maxlength:10
										  
									  },
									  lname:{
										  required:true,
										  minlength:3,
										  maxlength:10
									  },
									  idno:{
										  required:true,
										  minlength:7,
										  maxlength:8,
										  digits:true
								
									  },
									    regno:{
										  required:true,
										  minlength:6
								
									  },
									    phone:{
										  required:true,
										  minlength:10,
										  maxlength:14
										  
										  
								
									  },
									    email:{
										  required:true,
										  email:true
								
									  },
									    password:{
										  required:true,
										  minlength:8
										  
								
									  },
									    cpassword:{
										  required:true,
										  minlength:8,
										  equalTo:password1
								
									  },
									
								},
								messages:{
									   cpassword:{
										   equalTo:"password Mismatch!"
										   },
										   
										   email:{
											     email:"Enter valid Email"
											   }
                                       										   
								}
							});
						   
					  });
			 
			

   </script>
