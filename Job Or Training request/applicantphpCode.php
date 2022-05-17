<?php
if(isset($_POST["register"])){
  
$applicantId=$_POST["applicantId"];
$firstName=$_POST["firstName"];
$middleName=$_POST["middleName"];
$grandfatherName=$_POST["grandfatherName"];
$lastName=$_POST["lastName"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$request=$_POST["requestType"];
$filename=$_POST["filename"];



$p=$_FILES["filename"];

$filename=$p["name"];
$filetmpname=$p["tmp_name"];



require 'connectphp.php';


$select= "select * from employees where  email='$email'";
$query=  mysqli_query($con, $select);


if(mysqli_num_rows($query)>0){
    
    echo '<script>alert("email already exists");</script>';
    
    
}
else{
   
    
    $insert="insert into employees( firstname, middlename, grandfatherName, lastName, email, phone, request, filename ) 
            values('$firstname','$middlename','$grandfatherName','$lastName','$email','$phone','$request','$filename')";
    
    $query2=  mysqli_query($con, $insert);
    
    
    
    if($query2){
        
       $move= move_uploaded_file($filetmpname, "file/$filename");
       
       
       if($move){
           
               echo '<script>alert("Submited Successfuly!");window.location.assign("Home.html");</script>';

       }
    }
    
}



}
?>