<?php
// Informations de connexion à la base de données
$host = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$database = "project"; // Nom de la base de données

// Tentative de connexion à la base de données
$conn = mysql_connect($host, $username);

// Vérification de la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : ");
} 
// Sélection de la base de données
mysql_select_db($database, $conn);
// Requête SQL pour vérifier les informations de connexion dans la base de données
$nom=$_POST["companyName"];
$type=$_POST["companyType"];
$titre=$_POST["jobTitle"];
$des=$_POST["jobDescription"];
$salary=$_POST["salary"];
$cin=$_POST["cin"];
$Lieu=$_POST["lieu"];
$mail=$_POST["contactEmail"];
$sql = "INSERT INTO offresemploi (id, nomEntreprise, typeEntreprise, titrePoste, descriptionPoste, salairePropose, adresseEmailContact, Lieu)
   VALUES ('$nom', '$type', '$titre', '$des','$salary', '$cin', '$Lieu', '$mail')";
$resultat=mysql_query($sql,$conn);
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    /* Basic styling for the centered block (optional) */
/* Centering everything (body and content) */
body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh; /* Set minimum height to viewport height */
  font-family: sans-serif; /* Choose your preferred font */
  margin: 0;
  padding: 0;
  background-color: rgba(0, 0, 0, 0.5); /* Light background for the page */
}

/* Optional styling for the centered block */
.centered-block {
  text-align: center;
  width: 600px; /* Adjust width as needed */
  height:300px;
  background-color: #f0f0f0; /* Light gray background */
  border-radius: 5px; /* Rounded corners */
  padding: 20px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
  transition: all 0.3s ease-in-out; /* Smooth transition on hover */
}

.centered-block:hover {
  transform: scale(1.05); /* Slightly enlarge on hover */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
}

  </style>
  <link rel="icon" type="image/x-icon" href="../res/22 (1).png">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../CSS/style.css">
  <title>Redirection en cours...</title>
  <meta http-equiv="refresh" content="20;url=../HTML/connexion (1).html">  </head>
<body>

<div class="centered-block"><img src="../res/success.PNG">
  <p>Vous allez être redirigé vers la page de connexion dans 20 secondes.</p>
</div>

</body>
</html>





<?php  

mysql_close($conn)

?>