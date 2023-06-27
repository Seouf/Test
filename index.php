<?php
require_once("classes/database.php");
require_once("classes/post.php");

try {
    $bd = new Database("localhost", "alua", "root", "");
} catch (PDOException $e) {
    echo "Deu errado";
}
$posts = Post::all($bd);

?>

<html>

<head>

</head>

<body>

    <?php
    include_once("includes/navbar.php");

    foreach ($posts as $post) {

    ?>
        <h1> <?= $post->title ?></h1>
        <p><?= $post->description ?></p>
        <p> <?= $post->author ?> - <?= $post->date ?></p>
        <hr />

    <?php
    }
    ?>
</body>

</html>