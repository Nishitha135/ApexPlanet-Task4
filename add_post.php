<?php
session_start();
include 'includes/db.php';

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

$message="";

if(isset($_POST['add'])){

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $user_id = $_SESSION['id'];

    if(empty($title) || empty($content)){
        $message="All fields are required!";
    }else{

        $stmt = $conn->prepare("INSERT INTO posts(title,content,user_id) VALUES(?,?,?)");
        $stmt->bind_param("ssi",$title,$content,$user_id);

        if($stmt->execute()){
            $message="Post Added Successfully!";
        }else{
            $message="Something went wrong!";
        }

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Post</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

<h2>Add New Post</h2>

<?php
if($message!=""){
    echo "<div class='success'>$message</div>";
}
?>

<form method="POST">

<input type="text"
name="title"
placeholder="Post Title"
required>
<textarea
name="content"
placeholder="Write your content here..."
required
style="width:100%;
height:250px;
padding:15px;
font-size:18px;
border-radius:10px;
border:none;
outline:none;
resize:vertical;
margin-top:10px;
margin-bottom:20px;">
</textarea>
<button name="add">Publish Post</button>

</form>

<br>

<a href="dashboard.php">⬅ Back to Dashboard</a>

</div>

</body>

</html>