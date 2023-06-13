<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>

    </head>
    <body>

        <?php
            define("nome", "Fango");
            define("senha", "123456");

            if ($_GET["nome"] == nome && $_GET["senha"] == senha)
            echo "Bem-Vindo " . nome;
            else{
                echo "Usuário não encontrado";
            }

        ?>

        
        
    </body>
</html>