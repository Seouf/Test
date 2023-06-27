<?php
require_once("../classes/database.php");
require_once("../classes/post.php");
$execute = count($_POST);

if ($execute) {
    try {
        $bd = new Database("localhost", "alua", "root", "");
    } catch (PDOException $e) {
        echo "Falha ao conectar ao banco de dados " . $e->getMessage() . "\n";
    }

    $post = Post::parse($_POST);
    $post->create($bd);

}
?>

<html>
    <head>
        <title>Criar um novo Post</title>
        <link rel="stylesheet" type="text/css" href="custom.css" />
    </head>
    <body>
<?php
    include_once("../includes/navbar.php"); 
    if (!$execute) {
?>
 

        <form action="create.php" method="POST">
            <div class="margincreate">
            <input type="text" name="title" placeholder="Title..."/>
            </div>
            <div class="margincreate">
                <label for="description">Post Description:</label>
            </div>
            <div class="margincreate">  
            <textarea  id="description" name="description" rows="10" cols="50" placeholder="Description..."></textarea>
            </div>
            <div class="margincreate">
            <input type="text" name="author" placeholder="Author..."/>
            <button type="submit">Submit</button>
            </div> </form>
<?php
    } else { ?>
    <h1> Your post has been successfully created! </h1>
<?php } ?>
    </body>
</html>