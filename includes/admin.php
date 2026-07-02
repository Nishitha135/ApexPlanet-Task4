<?php
session_start();
include 'includes/db.php';

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

if($_SESSION['role'] != "admin"){
    die("Access Denied!");
}

$userCount = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc();
$postCount = $conn->query("SELECT COUNT(*) AS total FROM posts")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .cards{
            display:flex;
            gap:20px;
            justify-content:center;
            flex-wrap:wrap;
            margin-top:20px;
        }

        .card{
            width:220px;
            padding:25px;
            border-radius:15px;
            color:white;
            text-align:center;
            box-shadow:0 10px 20px rgba(0,0,0,.3);
        }

        .users{
            background:#4CAF50;
        }

        .posts{
            background:#2196F3;
        }

        h1{
            text-align:center;
        }

        .btn{
            display:block;
            width:200px;
            margin:30px auto;
            text-align:center;
            text-decoration:none;
            background:#673ab7;
            color:white;
            padding:15px;
            border-radius:10px;
            font-weight:bold;
        }

        .btn:hover{
            background:#512da8;
        }
    </style>
</head>

<body>

<div class="container" style="width:800px;">

<h1>👑 Admin Dashboard</h1>

<div class="cards">

<div class="card users">
<h2>Total Users</h2>
<h1><?php echo $userCount['total']; ?></h1>
</div>

<div class="card posts">
<h2>Total Posts</h2>
<h1><?php echo $postCount['total']; ?></h1>
</div>

</div>

<a class="btn" href="dashboard.php">⬅ Back to Dashboard</a>

</div>

</body>

</html>