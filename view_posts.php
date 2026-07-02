<?php
session_start();
include 'includes/db.php';

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

$sql = "SELECT posts.*, users.name
        FROM posts
        JOIN users ON posts.user_id = users.id
        ORDER BY posts.id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Posts</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .post{
            background:#fff;
            color:#333;
            padding:20px;
            margin:20px 0;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,.2);
        }

        .post h3{
            color:#2575fc;
        }

        .actions a{
            text-decoration:none;
            padding:10px 15px;
            border-radius:8px;
            color:white;
            margin-right:10px;
        }

        .edit{
            background:#28a745;
        }

        .delete{
            background:#dc3545;
        }

        .back{
            display:inline-block;
            margin-top:20px;
            background:#2575fc;
            color:white;
            padding:12px 20px;
            border-radius:10px;
            text-decoration:none;
        }
    </style>

</head>

<body>

<div class="container" style="width:800px;">

<h2>📚 All Posts</h2>

<?php
if($result->num_rows > 0){

while($row = $result->fetch_assoc()){
?>

<div class="post">

<h3><?php echo htmlspecialchars($row['title']); ?></h3>

<p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>

<hr>

<p>
<b>Posted By:</b>
<?php echo htmlspecialchars($row['name']); ?>
</p>

<div class="actions">

<a class="edit"
href="edit_post.php?id=<?php echo $row['id']; ?>">
Edit
</a>

<?php
if($_SESSION['role']=="admin"){
?>

<a class="delete"
href="delete_post.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this post?');">
Delete
</a>

<?php } ?>

</div>

</div>

<?php
}
}else{
echo "<h3>No Posts Available</h3>";
}
?>

<a class="back" href="dashboard.php">
⬅ Back to Dashboard
</a>

</div>

</body>

</html>