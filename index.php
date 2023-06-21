<?php
$user="root";
$pass="";
$bd = new PDO('mysql:host=localhost;dbname=alua', $user, $pass);

try{
$bd = new PDO('mysql:host=localhost;dbname=alua', $user, $pass);
} catch (PDOException $a) {
echo "Falha no anti-boludo";
}

$sql="SELECT * FROM `bloqueados` order by `Nome`";
$result = $bd->query($sql)->fetchAll();


?>

<html>

<head>
    <meta charset="utf-8">
    <title>Este é o titulo da pagina.</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>

    <div id="main-content">
        <div id="side-bar">
            <ul>
                <li><button href="#" data-show="1" display="none" class="aba">Tab 1</button></li>
                <li><button href="#" data-show="2" display="none" class="aba">Tab 2</button></li>
                <li><button href="#" data-show="3" display="none" class="aba">Tab 3</button></li>
                <li><button href="#" data-show="4" display="none" class="aba">Tab 4</button></li>
                <li><button href="#" data-show="5" display="none" class="aba">Blacklist</button></li>
            </ul>
        </div>
        <div id="content">
            <span id="tab-1" class="texto" style="display:none">Esta página está com um texto interessante sobre camelos <br /></span>
            <span id="tab-2" class="texto" style="display:none">Esta página está com um texto mais ou menos sobre cavalos <br /></span>
            <span id="tab-3" class="texto" style="display:none">Esta página está com alguma coisa ai<br /></span>
            <span id="tab-4" class="texto" style="display:none" > 
                <input type="text" name="filtragem" id="filtro" />
                <ul id="nomes-filtrados"> </ul>
            </span>
            <span id="tab-5" class="texto" style="display:none">

            <form action="blacklist.php?rotina=add" method="POST">
                <input type="text" name="Nicks" id="Nicks" placeholder="Nome..."/>
                <input type="text" name="Nivel" id="Níveis" placeholder="Nível..."/>
                <button type="submit">Submit </button>
            </form>
                
                <ul>
                <?php
                    for ($x = 0; $x < count($result); $x++) {
                         echo "<li><a href='blacklist.php?rotina=del&ID=" . $result[$x]['ID'] . "'>[Excluir]</a> " . $result[$x]["Nome"] . " " . $result[$x]["Nivel"] . "</li>";
                    }
                ?>
                </ul>
            </span>
            
            
        </div>
     </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script type="text/javascript">
        var mostrar = $(".aba")
    
        mostrar.on('click', function(event){
            var numero = $(event.target).data('show')
            $(".texto").hide()
            $("#tab-" + numero).show()
        })

    </script>
    

</body>

</html>