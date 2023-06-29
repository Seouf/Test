<?php
require_once("../classes/database.php");
require_once("../classes/post.php");
$uploader = count($_POST);

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
        <title>Edição de post</title>
        <link rel="stylesheet" type="text/css" href="../indexstyles/pagecustom.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/scripts/scripts.js"></script>
    <script type="text/javascript"></script>
    </head>
    <body>
        <?php include_once("../includes/navbar.php"); 
            if (!$uploader) { ?>
        
        <form action="edit.php?id=<?= $post->id ?>" method="POST">
            <div class="margincreate">
                <label for="title">Title:</label>
            </div>
        <div class="margincreate">
        <input type="text" name="title" placeholder="Type your Title..." value="<?= $post->title ?>"/>
        </div>
        <div class="margincreate">
            <label for="description">Post Description:</label>
        </div>
        <div class="margincreate">  
        <textarea  id="description" name="description" rows="10" cols="50" placeholder="Type your Description..."><?= $post->description ?></textarea>
        </div>
        <div class="margincreate">
            <label for="author">Author:</label>
        </div>
        <div class="margincreate">
        <input type="text" name="author" placeholder="Type your name..." value= '<?= $post->author ?>' />
        <button type="submit">Submit</button>
        </div> </form>

        <?php } else { 
            $post= Post::parse($_POST);
            $post->edit($bd,$id)?>
            <h1> Your post was sucessfuly edited <h1>
        <?php } ?>
    </body>
</html>