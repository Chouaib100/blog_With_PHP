
<?php
include '../includes/header.php';
include '../includes/db.php';

if (!isLoggedIn()) {
    redirect('/pages/login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = sanitizeInput($_POST['title']);
    $content = sanitizeInput($_POST['content']);
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $title, $content]);
}

$stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id = ?");
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
<?php foreach ($posts as $post): ?>
    <div class="post">
        <h3><?php echo $post['title']; ?></h3>
        <p><?php echo $post['content']; ?></p>
    </div>
<?php endforeach; ?>

<?php
include '../includes/footer.php';
?>