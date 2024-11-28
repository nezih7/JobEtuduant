<?php
$host = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$database = "project"; // Nom de la base de données

// Tentative de connexion à la base de données
$conn = mysql_connect($host, $username);

// Vérification de la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : ");
}
mysql_select_db($database, $conn);
  $nom = $_POST['nm']; // Sanitize and trim input
  $prenom = $_POST['pr'];
  $date_naissance =$_POST['dn'];
  $region = $_POST['rg'] ;
  $email = $_POST['em'];
  $mot_de_passe = $_POST['ps'];
  $cin =$_POST['cin'] ;
  $telephone =$_POST['tel'];
  $fac=$_POST['fc'];
  $niveau=$_POST['nv'];
$requete="SELECT * FROM `etudiant` where cin='$cin'";
$resultat=mysql_query($requete,$conn);
if(mysql_num_rows($resultat)==1){
  
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
    
    <title>Redirection en cours...</title>
    <meta http-equiv="refresh" content="20;url=../HTML/connexion (1).html">  </head>
  <body>
  
  <div class="centered-block"><h1></h1><img src="../res/oops.PNG">
    <p>Vous allez être redirigé vers la page de connexion dans 5 secondes.</p>
    <p>ETUDIANT EXISTE DANS NOTRE BD</p>
  </div>
  
  </body>
  </html>
  <?php
}

else {
  $sql = "INSERT INTO `etudiant` (cin, Nom, Prenom,date,Niveau, Region, Ville, Email, pwd, description,tel,fac)
   VALUES ('$cin', '$nom', '$prenom', '$date_naissance','$niveau', '$region', '$ville', '$email', '$mot_de_passe', '', '$telephone','$fac')";
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
    <link rel="stylesheet" href="style.css">
    <title>Redirection en cours...</title>
    <meta http-equiv="refresh" content="20;url=../HTML/connexion (1).html">  </head>
  <body>
  
  <div class="centered-block"><h1></h1><img src="../res/success.PNG">
    <p>Vous allez être redirigé vers la page de connexion dans 5 secondes.</p>
    <p>etudiant ajouter</p>
  </div>
  
  </body>
  </html>
  
  

  
  
  <?php  }
mysql_close($conn);
  

?>