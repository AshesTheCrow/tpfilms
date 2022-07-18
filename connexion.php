<?php 

include_once "header.php";

?>

<h2>Connexion</h2>
<form method="post">
    <input type="text" name="login" placeholder="Login">
    <input type="text" name="pass" placeholder="Password">
    <button type="submit" name="connexion">Connexion</button>
</form>

<?php

if(isset($_POST["connexion"]))
{
    $login = $_POST["login"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM user WHERE login = ? AND pass = ?";
    $requete = $bdd->prepare($sql);
    $requete->execute(array($_GET["$login, $pass"]));
    $user = $requete->fetch();
    var_dump($user);
    if($user === false)
    {
        echo "bad logins";
    }
    else
    {
        echo "tu es connecté";
        $_SESSION["connect"] === true;
    }
}

?>