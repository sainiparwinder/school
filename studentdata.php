<?php

    $con= mysqli_connect('localhost','myuser','satnam');
    mysqli_select_db($con,'mydb');  
//update data
     if(!empty($_POST['updateid'])){
        $updateid=$_POST['updateid'];
         $firstname=$_POST['firstname'];
         $fathername=$_POST['fathername'];
         $trade=$_POST['trade'];
         $rollno=$_POST['rollno'];     
         $email=$_POST['email'];        
         $q="UPDATE students SET firstname='$firstname', fathername='$fathername',sclass='$trade', rollno='$rollno', email='$email' WHERE id=$updateid";
         $result=mysqli_query($con,$q);         
       }
// read record
if(isset($_POST['readrecords'])){

     $data =  '<table class="table table-bordered table-striped ">
               <tr class="bg-dark text-white">
               <th>No.</th>
               <th>First Name</th>
               <th>Father Name</th>
               <th>Class</th>
               <th>Roll Number</th>            
               <th>Email Address</th>
               <th>Edit Action</th>
               <th>Delete Action</th>
               </tr>';
              $q = " SELECT * FROM students"; 
              $result = mysqli_query($con,$q);
    if(mysqli_num_rows($result) > 0){
     $number = 1;
      while ($row = mysqli_fetch_array($result)) {               
          $data .= '<tr>  
                      <td>'.$number.'</td>
                      <td>'.$row['firstname'].'</td>
                      <td>'.$row['fathername'].'</td>
                      <td>'.$row['sclass'].'</td>
                      <td>'.$row['rollno'].'</td>                  
                      <td>'.$row['email'].'</td>
                      <td><button onclick="GetUserDetails('.$row['id'].')" class="btn btn-success">Edit</button></td>
                      <td><button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button></td>
                    </tr>';
          $number++;
        }
     } 
      $data .= '</table>';
     echo $data;
}     // insert recored
     if(!empty($_POST['firstname'])){
         $firstname=$_POST['firstname'];
         $fathername=$_POST['fathername'];
         $trade=$_POST['trade'];
         $rollno=$_POST['rollno'];
        
         $email=$_POST['email'];  
         
         $q=" INSERT INTO students ( firstname, fathername, sclass, rollno, email) VALUES ('$firstname','$fathername','$trade','$rollno','$email')";        
          $result=mysqli_query($con,$q);
    }

// delete record
if(!empty($_POST['userid'])){
       $userid=$_POST['userid'];
       $q="DELETE FROM `students` WHERE `students`.`id` = $userid";
       $result=mysqli_query($con,$q);
}//it show edit data in edit form
if(!empty($_POST['editid'])){
    $editid=$_POST['editid'];
    $q="SELECT  `firstname`, `fathername`, `sclass`, `rollno`, `email` FROM `students` WHERE  id = $editid";
    $result=mysqli_query($con,$q);
    while ($row = mysqli_fetch_array($result)) {
        $data='<label for="firstname">Name:</label>
        <input type="text" class="form-control" id="firstname" placeholder="Enter name" name="firstname" value="'.$row["firstname"].'">
        <label for="fathername">Father Name:</label>
        <input type="text" class="form-control" id="fathername" placeholder="Enter Father Name" name="fathername" value="'.$row["fathername"].'">
        <label for="rollno">Rollno:</label>
        <input type="number" class="form-control" id="rollno" placeholder="Enter Rollno" name="rollno" value="'.$row["rollno"].'">
         <label for="trade">Class:</label>
        <input type="text" class="form-control" id="trade" placeholder="Enter Class" name="trade" value="'.$row["sclass"].'">        
        <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="'.$row["email"].'">
         <button type="submit" class="btn btn-success" id="submit1" onclick="update('.$editid.')" >update</button>';                    
    }
    echo $data;
    
}
?>   	
    
  