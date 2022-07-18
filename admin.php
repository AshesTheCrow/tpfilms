<?php 

include_once "header.php";

/* if(!isset($_SESSION["admin"])) //vérification admin !
{
    header("Location: index.php");
}

*/

?>

<h2>Ajouter un film</h2>
<form method="post">
    <input type="text" name="titreFilm" placeholder="Titre">
    <input type="text" name="descriptionFilm" placeholder="description">
    <input type="date" name="dateFilm" placeholder="date">
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<?php 

if(isset($_POST["ajouter"])) //si on clic sur le btn ajouter
{
    $titrefilm = $_POST["titrefilm"];
    $descriptfilm = $_POST["descriptfilm"];
    $datefilm = $_POST["datefilm"];

    $sql = "INSERT INTO films SET titre = ?, descript = ?, dates = ?"; //création de la requête
    $requete = $bdd->prepare($sql); //etape 1
    $requete->execute(array($titrefilm, $descriptfilm, $datefilm)); //etape 2

    var_dump($requete);
}


if(isset($_GET["modifID"])) //si un lien(modifier) de la page index.php est cliqué on arrive ici
{
    $sql = "SELECT * FROM news WHERE ID = ".$_GET["modifID"];  //création de la requête
    $requete = $bdd->prepare($sql);//etape 1
    $requete->execute();//etape 2
    $new = $requete->fetch();//etape 3

}


if(isset($_GET["deleteID"])) //si un lien(supprimer) de la page index.php est cliqué on arrive ici
{
    $sql = "DELETE FROM news WHERE ID = ".$_GET["deleteID"]; //création de la requête
    $requete = $bdd->prepare($sql); //etape 1
    $requete->execute(); //etape 2
    header("Location: ?ok");
}

if(isset($new)) //si on a une variable new créée alors on exectue le code
{ ?>

<h2>Modifier une new</h2>
<form method="post">
    <input type="hidden" name="ID" value="<?= $new["ID"] ?>" />
    <input type="text" name="titre" value="<?= $new["titre"] ?>" placeholder="Titre">
    <input type="text" name="body" value="<?= $new["body"] ?>" placeholder="Body">
    <button type="submit" name="modifier">Modifier</button>
</form>

<?php } 


if(isset($_POST["modifier"])) //si le btn modifier est cliqué
{
    $ID = $_POST["ID"];
    $titre = $_POST["titre"];
    $body = $_POST["body"];

    $sql = "UPDATE news SET titre = ?, body = ? WHERE ID = ?"; //requete
    $requete = $bdd->prepare($sql); //etape 1
    $requete->execute(array($titre, $body, $ID)); //etape 2
    header("Location: ?modifID=$ID"); //redirection
}