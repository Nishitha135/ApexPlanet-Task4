<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

<h1>Dashboard</h1>

<h2>Welcome <?php echo $_SESSION['name']; ?> 👋</h2>

<h3>Role : <?php echo ucfirst($_SESSION['role']); ?></h3>

<br>

<a href="add_post.php">
<button>Add New Post</button>
</a>

<br><br>

<br><br>

<a href="view_posts.php">
<button>📚 View Posts</button>
</a>

<br><br>

<br><br>

<a href="logout.php">
<button>Logout</button>
</a>

</div>

</body>

</html>