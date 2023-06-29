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
<link rel="stylesheet" type="text/css" href="/indexstyles/pagecustom.css" />
</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/scripts/scripts.js"></script>
    <script type="text/javascript"></script>
    <?php
    include_once("includes/navbar.php");

    foreach ($posts as $post) {

    ?>
 <div class="container">
<div class="card__header"> </div>
  <div class="card">
    <div class="card__body">     
      <h4><?= $post->title ?></h4>
      <p><?= $post->description ?></p>
    </div>
    <div class="card__footer">
      <div class="user">
         <div class="user__info">
          <h5 style='display:inline'><?= $post->author ?></h5>
          <small style='display:inline'><?= $post->date ?></small> <a href='/paginas/edit.php?id=<?= $post->id ?>'>[Editar]</a><a href='/paginas/del.php?id=<?= $post->id ?>'>[Excluir]</a>
        </div>
      </div>
    </div>
  </div>

    <?php
    }
    ?>
</body>

</html>