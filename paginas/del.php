<?php
require_once("../classes/database.php");
require_once("../classes/post.php");
try {
    $bd = new Database("localhost", "alua", "root", "");
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados " . $e->getMessage() . "\n";
}
$id=$_GET['id'];
$post= Post::getById($bd,$id); 


?>
<html>
    <head>
        <title>Confirmar exclusão </title>
        <link rel="stylesheet" type="text/css" href="../indexstyles/pagecustom.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/scripts/scripts.js"></script>
    <script type="text/javascript"></script>
    </head>
    <body>
    <?php include_once("../includes/navbar.php");
    $execute=$_GET['execute'] ?? null;
    if ($execute){
        $post->delete($bd,$id);?>
        <h1> Post deleted Sucessfully <h1> <br /> <a href='/'>[Home]</a>
    <?php }
    
    else {?>

<div class="confirmone">
    <h1>Do you wish to delete this post?<h1>
</div>
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
          <small style='display:inline'><?= $post->date ?></small>
    </div>
  </div>
</div>
</div>
  <div><a href='/paginas/del.php?execute=true&id=<?=$post->id ?>'>[Confirm]</a></div>
    <div><a href='../index.php'>[Cancel]</a></div>

<?php } ?>
    </body>
</html>