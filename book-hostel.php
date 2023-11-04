<?php
if(isset($_POST['submit']))
{
$roomno=$_POST['room'];
$feespm=$_POST['fpm'];
$foodstatus=$_POST['foodstatus'];
$stayfrom=$_POST['stayf'];
$duration=$_POST['duration'];
$course=$_POST['course'];
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
$emcntno=$_POST['econtact'];
$gurname=$_POST['gname'];
$gurrelation=$_POST['grelation'];
$gurcntno=$_POST['gcontact'];
$caddress=$_POST['address'];
$ccity=$_POST['city'];
$cstate=$_POST['state'];
$cpincode=$_POST['pincode'];
$paddress=$_POST['paddress'];
$pcity=$_POST['pcity'];
$pstate=$_POST['pstate'];
$ppincode=$_POST['ppincode'];

$conn = mysqli_connect("127.0.0.1:3306", "root", "", "hostel");

$query="insert into  registration(roomno,seater,feespm,foodstatus,stayfrom,duration,course,regno,firstName,middleName,lastName,gender,contactno,emailid,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,corresCIty,corresState,corresPincode,pmntAddress,pmntCity,pmnatetState,pmntPincode) values('$roomno','$seater','$feespm','$foodstatus','$stayfrom','$duration','$course','$regno','$fname','$mname','$lname','$gender','$contactno','$emailid','$emcntno','$gurname','$gurrelation','$gurcntno','$caddress','$ccity','$cstate','$cpincode','$paddress','$pcity','$pstate','$ppincode')";

$result=mysqli_query($conn,$query);
    if($result){
        echo"<script>alert('Student Succssfully register');</script>";
header("Location: register.html");
    }
    else{
        echo "Insertion failed";
    }
}
?>