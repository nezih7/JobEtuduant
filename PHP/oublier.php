<?php
$cin = $_POST['cin']; 
$npas = $_POST['ps'];
$host = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$database = "project"; // Nom de la base de données

// Connexion à la base de données
$conn = mysql_connect($host, $username);

// Vérification de la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysql_error());
} else {
    echo "La connexion à la base de données a réussi !";
}

// Sélection de la base de données
$db_selected = mysql_select_db($database, $conn);
if (!$db_selected) {
    die("Impossible de sélectionner la base de données : " . mysql_error());
} else {
    echo "La base de données a été sélectionnée avec succès !";
}

// Assurez-vous d'échapper les valeurs des variables pour éviter les injections SQL


// Requête SQL pour vérifier les informations de connexion dans la base de données
$sql = "SELECT * FROM `etudiant` WHERE cin=$cin;";
$result = mysql_query($sql, $conn);
$sql1 = "SELECT * FROM `etrepreneur` WHERE cin=$cin;";
$result1 = mysql_query($sql1, $conn);

if (!$result) {
    echo "Erreur lors de l'exécution de la requête : " . mysql_error();
}elseif(!$result1)
{
    echo "Erreur lors de l'exécution de la requête : " . mysql_error(); 
}
 elseif (mysql_num_rows($result) == 1) {
    $sql2 = "UPDATE `etudiant` SET pwd='$npas' WHERE cin=$cin ;";
    $result2 = mysql_query($sql2, $conn);
    
    echo "mot de passe modifié !";
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
    <link rel="icon" type="image/x-icon" href="../res/22 (1).png">
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="5;url=../HTML/connexion (1).html">
        <title>Redirection en cours...</title>
 
    </head>
    <body><p>Si la redirection ne fonctionne pas, veuillez cliquer sur ce <a href="../HTML/connexion (1).html">lien</a>.</p></body>
    </html>
    <?php
} elseif (mysql_num_rows($result1) == 1) {
    $sql3 = "UPDATE `etrepreneur` SET pwd='$npas' WHERE cin=$cin;";
    $result3 = mysql_query($sql3, $conn);
    echo "mot de passe modifié !";
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
    <link rel="icon" type="image/x-icon" href="../res/22 (1).png">
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="5;url=../HTML/connexion (1).html">
        <title>Redirection en cours...</title>
 
    </head>
    <body><p>Si la redirection ne fonctionne pas, veuillez cliquer sur ce <a href="../HTML/connexion (1).html">lien</a>.</p></body>
    </html>
    <?php
    
} else {
    echo "Identifiants introuvable. Veuillez réessayer.";
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
    <link rel="icon" type="image/x-icon" href="../res/22 (1).png">
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="5;url=../HTML/connexion (1).html">
        <title>Redirection en cours...</title>
 
    </head>
    <body><p>Si la redirection ne fonctionne pas, veuillez cliquer sur ce <a href="../HTML/connexion (1).html">lien</a>.</p></body>
    </html>
    <?php
}

// Fermeture de la connexion MySQL
mysql_close($conn);
?>
