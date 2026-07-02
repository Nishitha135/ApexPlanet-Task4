<?php
session_start();
include 'includes/db.php';
 
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: view_posts.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM posts WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if(isset($_POST['update'])){

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $update = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $update->bind_param("ssi",$title,$content,$id);

    if($update->execute()){
        header("Location: view_posts.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Post</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

<h2>✏ Edit Post</h2>

<form method="POST">

<input
type="text"
name="title"
value="<?php echo htmlspecialchars($post['title']); ?>"
required>
<textarea
name="content"
rows="12"
style="width:100%; height:250px; padding:15px; font-size:16px; border-radius:10px; resize:vertical;"
required><?php echo htmlspecialchars($post['content']); ?></textarea>


<button name="update">
Update Post
</button>

</form>

<br>

<a href="view_posts.php">⬅ Back</a>

</div>

</body>

</html>