<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}


if(isset($_POST['ville'],$_POST['bas'],$_POST['haut'])){
    $result = $bdd->query("INSERT INTO Météo VALUES ('','".$_POST['ville']."', '".$_POST['bas']."','".$_POST['bas']."')");
    $_POST = array();
    $result->closeCursor();
    header('Location: index.php');
}


$resultat = $bdd->query('SELECT * FROM météo');
$donnees = $resultat->fetch();

echo '<table>';
echo '<tr>';
    echo '<th>Ville</th>';
    echo '<th>haut</th>';
    echo '<th>bas</th>';
    echo '</tr>';
while ($donnees = $resultat->fetch()){   
    echo '<tr>';
    echo '<td>', $donnees['ville'], '</td>';
    echo '<td>', $donnees['haut'], '</td>';
    echo '<td>', $donnees['bas'], '</td>';
    echo '</tr>';
}
echo '</table>';


$resultat->closeCursor();
var_dump($_POST);
?>



<form action="index.php" method="post">
    <label for="ville">Ville:</label>
    <input type="text" id="ville" name="ville"><br>
    <label for="bas">Bas:</label>
    <input type="text" id="bas" name="bas"><br>
    <label for="haut">Haut:</label>
    <input type="text" id="haut" name="haut"><br>
    <input type="submit">
</form>
