<?php

include_once "header.php";


$sql = "SELECT * FROM films WHERE ID = ? LIMIT 15";
$requete = $bdd->prepare($sql);
$requete->execute(array($_GET["ID"]));
$films = $requete->fetchAll();

echo "<table>
    <tr>
        <th>ID</th>
        <th>titre</th>
        <th>description</th>
        <th>date</th>
        <th>Film précédent</th>
        <th>Film suivant</th>
    </tr>";


    foreach($films as $f)
    {
        echo "<tr>";
        echo "<td>".$f["ID"]."</td>";
        echo "<td><a href='films.php?ID=".$f["ID"]."'>".$f["titre"]."</a></td>";
        echo "<td>".$f["description"]."</td>";
        echo "<td>".$f["date"]."</td>";

        if(empty($f["IDFilmPrecedent"]))
        {
            echo "<td></td>";
        }
        else
        {
            echo "<td><a href='?ID=".$f["IDFilmPrecedent"]."'>Précédent</a></td>";
        }

        if(empty($f["IDFilmSuivant"]))
        {
            echo "<td></td>";
        }
        else
        {
            echo "<td><a href='?ID=".$f["IDFilmSuivant"]."'>Suivant</a></td>";
        }

        echo "</tr>";

        // if(isset($_SESSION["admin"])) // Possibilité de cliquer sur un lien afin de supprimer ou modifier si on est admin
        // {
        //     echo '<a href="admin.php?deleteID='.$f["ID"].'">Supprimer</a> '; //Clic sur le lien -> page admin.php?deleteID=X
        //     echo '<a href="admin.php?modifID='.$f["ID"].'">Modifier</a>'; //modification -> page admin.php?modifID=X) 
        // }
    }
echo "</table>";

$sql = "SELECT * FROM relation_acteurs_films, acteurs WHERE acteursID = acteurs.ID AND filmsID = ?";
$requete = $bdd->prepare($sql);
$requete->execute(array($_GET["ID"]));
$acteurs = $requete->fetchAll();

foreach($acteurs as $a)
{
    echo $a["nom"]."<br>";
}

?>