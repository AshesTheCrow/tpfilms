<?php

include_once "header.php";


$sql = "SELECT * FROM series WHERE ID = ? LIMIT 15";
$requete = $bdd->prepare($sql);
$requete->execute(array($_GET["ID"]));
$series = $requete->fetchAll();

echo "<table>
    <tr>
        <th>ID</th>
        <th>titre</th>
        <th>description</th>
        <th>date</th>
        <th>Saison précédente</th>
        <th>Saison suivante</th>
    </tr>";


    foreach($series as $s)
    {
        echo "<tr>";
        echo "<td>".$s["ID"]."</td>";
        echo "<td><a href='series.php?ID=".$s["ID"]."'>".$s["titre"]."</a></td>";
        echo "<td>".$s["description"]."</td>";
        echo "<td>".$s["date"]."</td>";

        if(empty($s["IDSaisonPrecedente"]))
        {
            echo "<td></td>";
        }
        else
        {
            echo "<td><a href='?ID=".$s["IDSaisonPrecedente"]."'>Saison précédente</a></td>";
        }

        if(empty($s["IDSaisonSuivante"]))
        {
            echo "<td></td>";
        }
        else
        {
            echo "<td><a href='?ID=".$s["IDSaisonSuivante"]."'>Saison suivante</a></td>";
        }

        echo "</tr>";

        // if(isset($_SESSION["admin"])) // Possibilité de cliquer sur un lien afin de supprimer ou modifier si on est admin
        // {
        //     echo '<a href="admin.php?deleteID='.$f["ID"].'">Supprimer</a> '; //Clic sur le lien -> page admin.php?deleteID=X
        //     echo '<a href="admin.php?modifID='.$f["ID"].'">Modifier</a>'; //modification -> page admin.php?modifID=X) 
        // }
    }
echo "</table>";

$sql = "SELECT * FROM relation_acteurs_series, acteurs WHERE acteursID = acteurs.ID AND seriesID = ?";
$requete = $bdd->prepare($sql);
$requete->execute(array($_GET["ID"]));
$series = $requete->fetchAll();

foreach($series as $s)
{
    echo $s["nom"]."<br>";
}

?>