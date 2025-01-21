<?php

session_start();
if (!isset($_SESSION["user_id"])){
    header("Location: login.php");
}

include '../includes/db.php';

if ($_SESSION['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO posts(title, content, user_id) VALUES(?, ?, ?)");
    $stmt->execute([$title, $content, $user_id]);
}

$stmt = $pdo->prepare("SELECT*FROM posts WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$posts = $stmt->fetchAll();

?>

<h1>Dashboard</h1>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <button type="submit">Add Post</button>
</form>


<h2>Your Posts</h2>
<?php foreach ($posts as $post) : ?>
   <div>
       <h3><?php echo $post['title']; ?></h3>
       <h3><?php echo $post['title']; ?></h3>
   </div>
<?php endforeach; ?>
