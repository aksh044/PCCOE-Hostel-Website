<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link rel="stylesheet" href="styles.css">

  <script>
    fetch('nav.html')
      .then(response => response.text())
      .then(data => {
        document.getElementById('navbar-container').innerHTML = data;
      });
  </script>
  
</head>
<body>
  <div id="navbar-container"></div>
  <main>
    <h2>We value your opinion!</h2>
    <form action="#" method="post">
        <label for="name">Name: </label>
        <input type="text" id="name" name="name" required="true"><br><br>
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required="true"><br><br>
        <label for="feedback">Your feedback: </label><br>
        <textarea id="feedback" name="feedback" rows="4" required="true"></textarea>
        <br><br>
        <button type="submit">Submit feedback</button>
    </form>
</main>
<footer>
    &copy; All rights reserved.
</footer>
</body>
</html>
<?php

if(isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["feedback"])){
$name=$_POST["name"];
$email=$_POST["email"];
$feedback=$_POST["feedback"];

$conn=mysqli_connect("127.0.0.1:3306","root","","hostel");
if(!$conn){
    die("Not connected".mysqli_connect_error());

}
else
{
    echo "Connected";
    $sql="INSERT INTO `feedback`(`name`, `email`, `opinion`) VALUES ('$name','$email','$feedback')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Feedback successfully submitted")';  
        echo '</script>';
    }
    else{
        echo "Insertion failed";
    }

}
}
?>