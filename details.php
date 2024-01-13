<?php session_start();
$userId = $_SESSION['user_id'];
$host = "localhost:3309";
    $user = "root";
    $mdp = "";
    $bdd = "asi"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Evente</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <style>



/* Style de la petite photo de profil */
.profile-link img.profile-img {
  width: 30px; /* Ajustez la taille souhaitée */
  height: 30px;
  border-radius: 50%;
  margin-right: 10px; /* Ajoute une marge à droite du nom pour l'espace */
}

/* Styliser le lien du profil */
.profile-link {
  display: flex;
  align-items: center;
}

/* Styliser le nom à côté de la photo de profil */
.profile-link span {
  margin-right: 5px;
}

/* Styliser le dropdown */
.dropdown ul {
  display: none;
  /* Autres styles pour le dropdown... */
}

/* Afficher le dropdown au survol du lien du profil */
.dropdown:hover ul {
  display: block;
}


  .content-container {
    max-width: 800px; /* Ajustez la largeur maximale selon vos besoins */
    margin: 0 auto; /* Centre le contenu horizontalement */
    padding: 20px; /* Ajoute un peu d'espace autour du contenu */
  }

  .event-details {
    text-align: center; /* Centre le texte à l'intérieur de la div */
    margin-top: 20px; /* Ajoute un espace au-dessus de la div */
  }

  .event-details img {
    max-width: 100%; /* L'image s'ajustera à la largeur de son conteneur parent */
    height: auto; /* L'image conserve son ratio d'aspect */
    margin-bottom: 20px; /* Ajoute un espace en dessous de l'image */
  }

  .event-details h1 {
    font-size: 24px; /* Ajustez la taille de la police selon vos besoins */
    margin-bottom: 10px; /* Ajoute un espace en dessous du titre */
  }

  .event-details p {
    margin-bottom: 10px; /* Ajoute un espace en dessous de chaque paragraphe */
  }

  .event-details button {
    background-color: #4154f1; /* Couleur de fond du bouton */
    color: #fff; /* Couleur du texte du bouton */
    padding: 10px 20px; /* Ajoute de l'espace à l'intérieur du bouton */
    border: none; /* Supprime la bordure du bouton */
    border-radius: 5px; /* Ajoute une bordure arrondie au bouton */
    cursor: pointer; /* Change le curseur au survol du bouton */
    font-size: 16px; /* Ajustez la taille de la police selon vos besoins */
  }
</style>




  <!-- Favicons -->
 
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Clhome.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MeFamily
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

	
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">MM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
    <ul>
        <li><a class="active" href="Clhome.php">Home</a></li>
       
        <li><a href="contact.html">Contact</a></li>
        
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
    </div>
    
 
  </header><!-- End Header -->
  
  
  
  <?php
// Récupérez l'ID de l'événement à partir de l'URL

$Id = isset($_GET['id']) ? $_GET['id'] : null;

if ($Id !== null) {
    // Récupérez les détails de l'événement en fonction de l'ID
    // Utilisez votre logique de requête SQL pour récupérer les données de la base de données
    $host = "localhost:3309";
    $user = "root";
    $mdp = "";
    $bdd = "asi";

    try {
        $connexion = new PDO("mysql:host=$host;dbname=$bdd", $user, $mdp);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = $connexion->prepare("SELECT * FROM article WHERE id = :Id");
        $requete->bindParam(':Id', $Id, PDO::PARAM_INT);
        $requete->execute();
        $articledet = $requete->fetch(PDO::FETCH_ASSOC);

        // Check if $articledet is an array before using it
        if (is_array($articledet)) {
            // Display details only if $articledet is an array
?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="content-container">
                <!-- Détails de l'événement -->
                <div class="event-details">
                    <img src="<?php echo $articledet['image']; ?>" alt="Image de l article">
                    <h1><?php echo $articledet['nom']; ?></h1>
                    <p>prix:<?php echo $articledet['prix']; ?></p>
                    <p>dispo:<?php echo $articledet['dispo']; ?></p>
                    <!-- Ajoutez d'autres détails au besoin -->

                    <!-- Bouton pour quelque chose (ajoutez une action et un lien selon vos besoins) -->
                    <button>Ajouter a la liste </button>
                </div>
            </div>
<?php
        } else {
            // Handle the case where no data is found for the specified ID
            echo "Aucun article trouvé pour l'ID spécifié.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    } finally {
        $connexion = null;
    }
} else {
    echo "Erreur : ID de l'article non spécifié.";
}
?>


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Evente</h3>
  
      <p>Evente - L'expertise pour tous vos événements, publics et professionnels</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>

      <div class="copyright">
        &copy; Copyright <strong><span>Evente</span></strong>. All Rights Reserved
      </div>
   
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/family-multipurpose-html-bootstrap-template-free/ -->
        Designed by Esst
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>