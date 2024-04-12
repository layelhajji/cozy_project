<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <link rel="stylesheet" href="./login.css">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-rO+919vLgl1UGwJ1TNEKjZo80pTxBMD7jxmB+G3Xq8U6yDgTHS+R6jvlU2Q8f84W4x4Zf/6YYpwzXIm8uyyWig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >

    <style>
      .error-msg{
        color:red;
        margin-top: 100px;
        position:absolute;
        transform: translate(820px,-740px);
      }
      .msgc{
        color: green ;
        margin-top: 100px;
        position:absolute;
        transform: translate(820px,-740px);
      }
    </style>
</head>
<body>
  <nav>
    <ul class="hovs" style="margin-left:20%;">
        <li class="hov"><a href="./home.html">Home</a></li>
        <li class="hov"><a href="./bio-herbel.html">Products</a></li>
        <li style="font-size: 30px; padding-left: 20px; padding-right: 20px;"><span>Cozy</span></li>
        <li class="hov"><a href="./login.php" style="color: rgb(241, 140, 142);">Log in</a></li>
        <li class="hov"><a href="">Blog</a></li>
    </ul>
<form action="" class="search-box">
    <input type="text" placeholder="Search" required/>
    <button type="submit" class="go-icon"><i class="fas fa-search"></i></button>
  </form>
</nav>
  <!-- login_page -->
  <div class="center">
    <div class="box1">Welcome Back !</div>
    <div class="box2">
            <div class="container">
              <div class="top-header">
                <header>Login</header>
              </div>
              <br>
              <form class="login" method="post">
              <div class="input-field">
                <input type="text" class="input" name="nom_utilisateur" id="nom_utilisateur" required placeholder="username">
                <i class="fas fa-user"></i>
              </div>
              <br>
              <div class="input-field">
                <input type="password" class="input" name="mot_de_passe" id="mot_de_passe" required placeholder="password">
                <i class="fas fa-lock"></i>
              </div>
              <br>
              <div class="bottom">
                <div class="left">
                  <input type="checkbox" id="check">
                  <label for="check">Remember Me</label>
                </div>
                <div class="right">
                  <label ><a href="#">Forgot Password ?</a> </label>
                </div>
              </div>
              <br>
              <div class="input-field">
                <button type="submit" class="submit" >login</button>
              </div>
              <br><br><br>
              <div class="msg">
                <div class="left-msg">
                  <label>Don't you have an account?</label>
                </div>
                <div class="right-msg">
                  <label ><a href="signup.php">Sign Up</a> </label>
                </div>
              </div>
            </div>
            </form>
          </div>     
  </div>
  <div class="border"></div>
  <!-- footer -->
  <footer>
    <div class="footer">
        <div class="contact">
         <h2>KEEP ON TOUCH</h2>
         <div class="icons">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>
         <br>
         <div class="contact">
            <ul style="list-style-type:none;">
                <li><i class="material-icons">phone</i>+216 70 158 269</li>
                <li><i class="material-icons">email</i>contact@gmail.com</li>
                <li><i class="material-icons">place</i>Campus Mannouba</li>
            </ul>
        </div> 
        </div>
        <hr>
        <div class="photo">
          <img  class="imag" src="./The 5 Skincare Trends You Need on Your Radar For Fall - Molly Sims.jfif" >
        </div>
    </div>
</footer>
<!-- php_code -->
<?php 
error_reporting(E_ALL);
//session_start();
// <!-- Connexion à la base de données MySQL -->
$conn = mysqli_connect('localhost', 'layel', 'layelensi1234', 'projet');

// <!-- Vérification de la connexion -->
if (!$conn) {
    die('Erreur de connexion à la base de données');
}

// <!-- Traitement du formulaire de connexion -->
if (isset($_POST['nom_utilisateur']) && isset($_POST['mot_de_passe'])) {
    // <!-- Récupération des données du formulaire -->
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // <!-- Requête pour récupérer l'enregistrement correspondant au nom d'utilisateur fourni -->
    $query = "SELECT * FROM utilisateur WHERE nom = '$nom_utilisateur'";
    $result = mysqli_query($conn, $query);

    // <!-- Vérification de l'existence de l'utilisateur dans la base de données -->
    if (mysqli_num_rows($result) > 0) {
        // <!-- Récupération de l'enregistrement de l'utilisateur -->
        $row = mysqli_fetch_assoc($result);

        // <!-- Vérification du mot de passe -->
        if ($mot_de_passe == $row['mot_de_passe']) {
            // <!-- Stockage des données de l'utilisateur dans la session -->
            $_SESSION['nom_utilisateur'] = $nom_utilisateur;
            $_SESSION['email'] = $row['email'];

            // redirection vers page d'accueil 
            echo "<script>" . "window.location.href='home.html'" . "</script>";

            exit();
        } else {
          echo "<div class='error-msg'>Incorrect password. Try Again.</div>";
         
        }
    } else {
      echo "<div class='error-msg'>User not found. Try Again.</div>";
    }
}
?>

</body>
</html>