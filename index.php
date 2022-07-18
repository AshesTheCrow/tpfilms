<?php 

include_once "header.php";


$sql = "SELECT * FROM films LIMIT 15";
$requete = $bdd->prepare($sql);
$requete->execute();
$films = $requete->fetchAll();

echo "<table>
    <tr>
        <th>ID</th>
        <th>titre</th>
        <th>description</th>
        <th>date</th>
    </tr>";


    foreach($films as $f)
    {
        
        echo "<tr>";
        echo "<td>".$f["ID"]."</td>";
        echo "<td><a href='films.php?ID=".$f["ID"]."'>".$f["titre"]."</a></td>";
        echo "<td>".$f["description"]."</td>";
        echo "<td>".$f["date"]."</td>";
        echo "</tr>";

        // if(isset($_SESSION["admin"])) // Possibilité de cliquer sur un lien afin de supprimer ou modifier si on est admin
        // {
        //     echo '<a href="admin.php?deleteID='.$f["ID"].'">Supprimer</a> '; //Clic sur le lien -> page admin.php?deleteID=X
        //     echo '<a href="admin.php?modifID='.$f["ID"].'">Modifier</a>'; //modification -> page admin.php?modifID=X) 
        // }
    }
echo "</table>";


$sql = "SELECT * FROM series LIMIT 15";
$requete = $bdd->prepare($sql);
$requete->execute();
$series = $requete->fetchAll();

echo "<table>
    <tr>
        <th>ID</th>
        <th>titre</th>
        <th>description</th>
        <th>date</th>
        <th>saison</th>
    </tr>";


    foreach($series as $s)
    {
        
        echo "<tr>";
        echo "<td>".$s["ID"]."</td>";
        echo "<td><a href='series.php?ID=".$s["ID"]."'>".$s["titre"]."</a></td>";
        echo "<td>".$s["description"]."</td>";
        echo "<td>".$s["date"]."</td>";
        echo "<td>".$s["saison"]."</td>";
        echo "</tr>";

        // if(isset($_SESSION["admin"])) // Possibilité de cliquer sur un lien afin de supprimer ou modifier si on est admin
        // {
        //     echo '<a href="admin.php?deleteID='.$f["ID"].'">Supprimer</a> '; //Clic sur le lien -> page admin.php?deleteID=X
        //     echo '<a href="admin.php?modifID='.$f["ID"].'">Modifier</a>'; //modification -> page admin.php?modifID=X) 
        // }
    }
echo "</table>";


$sql = "SELECT * FROM animes LIMIT 15";
$requete = $bdd->prepare($sql);
$requete->execute();
$animes = $requete->fetchAll();

echo "<table>
    <tr>
        <th>ID</th>
        <th>titre</th>
        <th>description</th>
        <th>date</th>
        <th>saison</th>
    </tr>";


    foreach($animes as $a)
    {
        
        echo "<tr>";
        echo "<td>".$a["ID"]."</td>";
        echo "<td><a href='animes.php?ID=".$a["ID"]."'>".$a["titre"]."</a></td>";
        echo "<td>".$a["description"]."</td>";
        echo "<td>".$a["date"]."</td>";
        echo "<td>".$a["saison"]."</td>";
        echo "</tr>";

        // if(isset($_SESSION["admin"])) // Possibilité de cliquer sur un lien afin de supprimer ou modifier si on est admin
        // {
        //     echo '<a href="admin.php?deleteID='.$f["ID"].'">Supprimer</a> '; //Clic sur le lien -> page admin.php?deleteID=X
        //     echo '<a href="admin.php?modifID='.$f["ID"].'">Modifier</a>'; //modification -> page admin.php?modifID=X) 
        // }
    }
echo "</table>";



?>
