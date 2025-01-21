<?php

include "../includes/db.php";

$stmt = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC");
$posts = $stmt->fetchAll();
?>

<h1>Blog Posts</h1>
<?php foreach ($posts as $post) : ?>
    <div>
        <h2><?php echo $post['title']; ?></h2>
        <h2><?php echo $post['content']; ?></h2>
        <a href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
    </div>
<?php endforeach; ?>
