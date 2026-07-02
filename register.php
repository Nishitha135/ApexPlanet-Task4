<?php
include 'includes/db.php';
 
$error = "";
$success = "";

if(isset($_POST['register'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if(empty($name) || empty($email) || empty($password)){
        $error = "All fields are required!";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = "Enter a valid email!";
    }
    elseif(strlen($password) < 6){
        $error = "Password must be at least 6 characters!";
    }
    else{

        $check = $conn->prepare("SELECT id FROM users WHERE email=?");
        $check->bind_param("s",$email);
        $check->execute();
        $result = $check->get_result();

        if($result->num_rows > 0){

            $error = "Email already registered!";

        }else{

            $hash = password_hash($password,PASSWORD_DEFAULT);
            $role="editor";

            $stmt = $conn->prepare("INSERT INTO users(name,email,password,role) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss",$name,$email,$hash,$role);

            if($stmt->execute()){
                $success="Registration Successful!";
            }else{
                $error="Registration Failed!";
            }

        }

    }

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link rel="stylesheet" href="assets/css/style.css">

<script src="assets/js/validation.js"></script>

</head>

<body>

<div class="container">

<h2>Create Account</h2>

<?php
if($error!=""){
echo "<div class='error'>$error</div>";
}

if($success!=""){
echo "<div class='success'>$success</div>";
}
?>

<form method="POST" name="register" onsubmit="return validateRegister();">

<input
type="text"
name="name"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button name="register">
Register
</button>

</form>

<p>

Already have an account?

<a href="login.php">

Login

</a>

</p>

</div>


</html>