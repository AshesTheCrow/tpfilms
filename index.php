<?php 

include_once "header.php";


//Il faut que sur la page index lorsqu'on y accède en non admin
//il faut qu'elles soient triées 
$sql = "SELECT * FROM films";
$requete = $bdd->prepare($sql);
$requete->execute();
$films = $requete->fetchAll();

foreach($films as $f)
{
    echo "<p>".$f["ID"]."</p>";

    if(isset($_SESSION["admin"])) // Possibilité de cliquer sur un lien afin de supprimer ou modifier si on est admin
    {
        echo '<a href="admin.php?deleteID='.$f["ID"].'">Supprimer</a> '; //Clic sur le lien -> page admin.php?deleteID=X
        echo '<a href="admin.php?modifID='.$f["ID"].'">Modifier</a>'; //modification -> page admin.php?modifID=X) 
    }
    
    echo "<p>".$f["titre"]."</p>";
    echo "<p>".$f["descript"]."</p>";
    echo "<p>".$f["dates"]."</p>";

    echo "<br>";
}



?>
