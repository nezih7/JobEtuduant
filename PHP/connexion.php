<?php
// Informations de connexion à la base de données
$cin = $_POST['cin'];
$pas = $_POST['pass'];
$host = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL (ajustez si nécessaire)
$database = "project"; // Nom de la base de données

// Tentative de connexion à la base de données
$conn = new mysqli($host, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Requête SQL pour vérifier les informations de connexion dans la base de données
$sql = "SELECT * FROM `etudiant` WHERE cin = ? AND pwd = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $cin, $pas);
$stmt->execute();
$result = $stmt->get_result();

$sql1 = "SELECT * FROM `entrepreneur` WHERE cin = ? AND pwd = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("ss", $cin, $pas);
$stmt1->execute();
$result1 = $stmt1->get_result();

if ($result->num_rows == 1) {
    // L'utilisateur est un étudiant
    $ligne = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="../res/22 (1).png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenue étudiant</title>
        <link rel="stylesheet" href="../CSS/accueil.css">
    </head>
    <body>
    <video autoplay muted loop id="bgVideo">
        <source src="../res/video1.mp4" type="video/mp4">
    </video>
    <div id="form1">
        <div id="form">
            <h1>Liste des informations</h1>
            <ul>
                <li><?php echo "Cin : " . $ligne["cin"]; ?></li>
                <li><?php echo "Nom : " . $ligne["Nom"]; ?></li>
                <li><?php echo "Prenom : " . $ligne["Prenom"]; ?></li>
                <li><?php echo "Email : " . $ligne["Email"]; ?></li>
                <li><?php echo "Téléphone : " . $ligne["tel"]; ?></li>
            </ul>
        </div>
    </div>
    <?php
    $sqlOffres = "SELECT * FROM offresemploi";
    $resultOffres = $conn->query($sqlOffres);
    ?>
    <div id="form2">
        <h1>Travail disponible</h1>
        <?php while ($offre = $resultOffres->fetch_assoc()) { ?>
            <div id="form0">
                <ul class="ul">
                    <li><?php echo "Nom de l'entreprise : " . $offre["nomEntreprise"]; ?></li>
                    <li><?php echo "Titre du poste : " . $offre["titrePoste"]; ?></li>
                    <li><?php echo "Description du poste : " . $offre["descriptionPoste"]; ?></li>
                    <li><?php echo "Salaire proposé : " . $offre["salairePropose"]; ?></li>
                    <li><?php echo "Adresse e-mail de contact : " . $offre["adresseEmailContact"]; ?></li>
                    <li><?php echo "Lieu : " . $offre["Lieu"]; ?></li>
                </ul>
            </div>
        <?php } ?>
    </div>
    </body>
    </html>
    <?php
} elseif ($result1->num_rows == 1) {
    // L'utilisateur est un entrepreneur
    $ligne = $result1->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <link rel="icon" type="image/x-icon" href="../res/22 (1).png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenue entrepreneur</title>
        <link rel="stylesheet" href="../CSS/accueil.css">
    </head>
    <body>
    <form action="../HTML/work.html" method="post" name="f">
        <video autoplay muted loop id="bgVideo">
            <source src="../res/video1.mp4" type="video/mp4">
        </video>
        <div id="form1">
            <div id="form">
                <h1>Liste des informations</h1>
                <ul>
                    <li><?php echo "Cin : " . $ligne["cin"]; ?></li>
                    <li><?php echo "Nom : " . $ligne["Nom"]; ?></li>
                    <li><?php echo "Prenom : " . $ligne["Prenom"]; ?></li>
                    <li><?php echo "Email : " . $ligne["Email"]; ?></li>
                    <li><?php echo "Téléphone : " . $ligne["tel"]; ?></li>
                </ul>
                <div class="button-container">
                    <input type="submit" value="Ajouter un Travail">
                </div>
            </div>
        </div>
        <?php
        $sqlOffres = "SELECT * FROM offresemploi, entrepreneur WHERE entrepreneur.cin = '$cin' AND offresemploi.cin = entrepreneur.cin";
        $resultOffres = $conn->query($sqlOffres);
        if ($resultOffres->num_rows == 0) {
            ?>
            <div id="form2">
                <h1>Vos demandes</h1>
                <div id="form0">
                    <h2 style="color:red;text-align:center;">Aucun travail trouvé ! Il faut ajouter un travail.</h2>
                </div>
            </div>
            </form>
            </body>
            </html>
            <?php
        } else {
            ?>
            <div id="form2">
                <h1>Vos demandes</h1>
                <?php while ($offre = $resultOffres->fetch_assoc()) { ?>
                    <div id="form0">
                        <ul class="ul">
                            <li><?php echo "Nom de l'entreprise : " . $offre["nomEntreprise"]; ?></li>
                            <li><?php echo "Titre du poste : " . $offre["titrePoste"]; ?></li>
                            <li><?php echo "Description du poste : " . $offre["descriptionPoste"]; ?></li>
                            <li><?php echo "Salaire proposé : " . $offre["salairePropose"]; ?></li>
                            <li><?php echo "Adresse e-mail de contact : " . $offre["adresseEmailContact"]; ?></li>
                            <li><?php echo "Lieu : " . $offre["Lieu"]; ?></li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            </form>
            </body>
            </html>
            <?php
        }
    }
else {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <link rel="icon" type="image/x-icon" href="../res/22 (1).png">
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="5;url=../HTML/connexion (1).html">
        <title>Redirection en cours...</title>
    </head>
    <body>
    <p>Identifiants introuvables. Veuillez réessayer. Si la redirection ne fonctionne pas, cliquez sur ce 
       <a href="../HTML/connexion (1).html">lien</a>.</p>
    </body>
    </html>
    <?php
}

// Fermer la connexion
$conn->close();
?>
