<?php
$user="root";
$pass="";
$bd = new PDO('mysql:host=localhost;dbname=alua', $user, $pass);

try{
$bd = new PDO('mysql:host=localhost;dbname=alua', $user, $pass);
echo "Ligando o anti-boludo";
} catch (PDOException $a) {
echo "Falha no anti-boludo";
}

$rotina = $_GET['rotina'];

if($rotina == "add") {
$nome= $_POST['Nicks'];
$nivel= $_POST['Nivel'];
echo "$nome - $nivel";

$sql= "INSERT INTO `bloqueados`(`Nome`,`Nivel`) VALUES (\"$nome\",\"$nivel\")";

$result = $bd->exec($sql);
var_dump($result);

} elseif ($rotina == "del") {
    $id = $_GET['ID'];
    $sql= "DELETE FROM `bloqueados` WHERE `ID` = \"$id\"";
    $result = $bd->exec($sql);
}

else {
    echo "Rotina não encontrada";
    }

    header('Location: /');
?>