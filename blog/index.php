

<?php
// index.php

include 'includes/db.php'; // تأكد من تضمين ملف الاتصال بقاعدة البيانات
include 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>

<h1>Blog Posts</h1>
<?php foreach ($posts as $post): ?>
    <div class="post">
        <h2><?php echo $post['title']; ?></h2>
        <p><?php echo $post['content']; ?></p>
        <a href="pages/post.php?id=<?php echo $post['id']; ?>">Read More</a>
    </div>
<?php endforeach; ?>

<?php
include 'includes/footer.php';
?>