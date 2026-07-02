<?php
session_start();
include 'includes/db.php';

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}

if($_SESSION['role']!="admin"){
    die("Access Denied!");
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM posts WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: view_posts.php");
exit();
?>