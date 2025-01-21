<?php

include '../includes/db.php';

$post_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->execute(['id' => $post_id]);
$post = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $user_id = $_POST['user_id'];

    $stmt = $pdo->prepare("INSERT INTO comments (post_id, user_id, comment) VALUES (?, ?, ?)");
    $stmt->execute([$post_id, $user_id, $comment]);
}

$stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = ?");
$stmt->execute([$post_id]);
$comments = $stmt->fetchAll();

?>

<h1><?php echo $post['title'];?></h1>
<h1><?php echo $post['content'];?></h1>

<h2>Comments</h2>
<?php foreach ($comments as $comment) : ?>
      <div>
          <p><?php echo $comments['comments'];  ?></p>
      </div>
<?php endforeach; ?>

<form method="POST">
    <textarea name="comment" placeholder="Add a comment" required></textarea>
    <button type="submit"> Submit </button>
</form>

