<?php
require_once 'header.php';
?>
<html>
	<head>
	  <title>ajax</title>

	</head>
	<body>

	<div class="container" >
		
	  <h2>NEW STUDENT</h2>
	  <form action="" id="studentForm" method="">
	    <div class="form-group" id="editform">
	      <label for="firstname">Name:</label>
	      <input type="text" class="form-control" id="firstname" placeholder="Enter name" name="firstname">
	      <label for="fathername">Father Name:</label>
	      <input type="text" class="form-control" id="fathername" placeholder="Enter Father Name" name="fathername">
	      <label for="rollno">Rollno:</label>
	      <input type="number" class="form-control" id="rollno" placeholder="Enter Rollno" name="rollno">
	       <label for="trade">Class:</label>
	      <input type="text" class="form-control" id="trade" placeholder="Enter Class" name="trade">
	      
	      <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
         <button type="submit" class="btn btn-success" id='submit' onclick="addrecord()" >Submit</button>
	    </div>
	    </form>
	    <div id="records_content"></div>
	  </div>

	<script type="text/javascript">
	     $(document).ready(function(){			//load data when form is loaded
               readRecords();
          });
		 function GetUserDetails(editid){		
				$.ajax({
					     url:"studentdata.php",
						 type:"POST",
						 data:{editid:editid},
						 success:function(data){								
								var x= data;
								document.getElementById('editform').innerHTML=x;
								
						 }
		         });
			}
			function update(updateid){
			var firstname=$('#firstname').val();
			var fathername=$('#fathername').val();
			var trade=$('#trade').val();
			var rollno=$('#rollno').val();						
			var email=$('#email').val();
                $.ajax({
			 		 url:"studentdata.php",
					type:"POST",							
					data:{firstname:firstname,
			            fathername:fathername,
			            trade:trade,
			            rollno:rollno,	              		
			            email:email,
			            updateid:updateid 
	                 },
			         success:function(data){								
								readRecords();
					}
		        });
			}

		    function DeleteUser(userid){                        
				   $.ajax({
							url:"studentdata.php",
							type:"POST",
							data:{userid:userid},
							success:function(data){
								readRecords();
							}
		           });
		    }
			function readRecords(){						
				   var readrecords = "readrecords";
						$.ajax({
								url:"studentdata.php",
								type:"POST",
								data:{readrecords:readrecords},
								success:function(data,status){
									$('#records_content').html(data);
							    }
						});
			}		
            function addrecord(){				       
				var firstname=$('#firstname').val();
				var fathername=$('#fathername').val();
				var trade=$('#trade').val();
				var rollno=$('#rollno').val();						
				var email=$('#email').val();
					 $.ajax({
			              	url:"studentdata.php",
			              	type:"POST",
			              	data:{firstname:firstname,
			              		fathername:fathername,
			              		trade:trade,
			              		rollno:rollno,	              		
			              		email:email	     		
	                    	},
              	            success: function(data){              		
                               readRecords();
              	            } 
                    })
		   }	
	</script>
</body>
</html>

