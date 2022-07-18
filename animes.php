<?php

include_once "header.php";


$sql = "SELECT * FROM animes WHERE ID = ? LIMIT 15";
$requete = $bdd->prepare($sql);
$requete->execute(array($_GET["ID"]));
$animes = $requete->fetchAll();

echo "<table>
    <tr>
        <th>ID</th>
        <th>titre</th>
        <th>description</th>
        <th>date</th>
        <th>Saison précédente</th>
        <th>Saison suivante</th>
    </tr>";


    foreach($animes as $a)
    {
        echo "<tr>";
        echo "<td>".$a["ID"]."</td>";
        echo "<td><a href='animes.php?ID=".$a["ID"]."'>".$a["titre"]."</a></td>";
        echo "<td>".$a["description"]."</td>";
        echo "<td>".$a["date"]."</td>";

        if(empty($a["IDSaisonPrecedente"]))
        {
            echo "<td></td>";
        }
        else
        {
            echo "<td><a href='?ID=".$a["IDSaisonPrecedente"]."'>Saison précédente</a></td>";
        }

        if(empty($a["IDSaisonSuivante"]))
        {
            echo "<td></td>";
        }
        else
        {
            echo "<td><a href='?ID=".$a["IDSaisonSuivante"]."'>Saison suivante</a></td>";
        }

        echo "</tr>";

        // if(isset($_SESSION["admin"])) // Possibilité de cliquer sur un lien afin de supprimer ou modifier si on est admin
        // {
        //     echo '<a href="admin.php?deleteID='.$f["ID"].'">Supprimer</a> '; //Clic sur le lien -> page admin.php?deleteID=X
        //     echo '<a href="admin.php?modifID='.$f["ID"].'">Modifier</a>'; //modification -> page admin.php?modifID=X) 
        // }
    }
echo "</table>";

?>