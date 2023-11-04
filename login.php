<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
  <script src="script.js"></script>

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
    <form name="loginform" method="post" onsubmit="formValidation()">
      <label for="email"><b>Email</b></label>
      <input type="email" id="email" placeholder="Enter email" name="email" required="true"
      ><br><br>
      <label for="password"><b>Password</b></label>
      <input type="password" id="password" placeholder="Enter password" name="password" required="true"
       ><br><br>
      <label for="Branch">Branch</label>
      <select name="branch" id="engineering">
        <option value="Computer">Computer</option>
        <option value="IT">IT</option>
        <option value="E&TC">E&TC</option>
        <option value="Mechanical">Mechanical</option>
        <option value="Civil">Civil</option>
      </select>
      <br><br>
      <button type="submit">Login</button><br>
    </form>
    
  </main>
  <footer>
    &copy; All rights reserved.
  </footer>
</body>

</html>

<?php
if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["branch"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $branch = $_POST["branch"];

    $conn = mysqli_connect("127.0.0.1:3306", "root", "", "hostel");

    if (!$conn) {
        die("Not connected: " . mysqli_connect_error());
    } else {
        echo "Connected";

        // Hash the password using password_hash() function
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `login`(`email`, `password`, `branch`) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sss', $email, $password_hash, $branch);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo '<script type="text/JavaScript">';
                header("Location: feedback.php");
                echo '</script>';
            } 
            mysqli_stmt_close($stmt);
        } 
    }
} 
?>
