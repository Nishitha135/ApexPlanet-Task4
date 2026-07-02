<?php
session_start();
include 'includes/db.php';

$error = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password,$user['password'])){

            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            header("Location: dashboard.php");
            exit();

        }else{

            $error = "Incorrect Password!";

        }

    }else{

        $error = "User not found!";

    }

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

<h2>Welcome Back 👋</h2>

<?php
if($error!=""){
echo "<div class='error'>$error</div>";
}
?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

<p>

Don't have an account?

<a href="register.php">Register</a>

</p>

</div>

</body>


</html>