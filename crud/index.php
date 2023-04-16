<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/f47df9657a.js" crossorigin="anonymous"></script>
    <title>Document</title>
<?php
  require_once './database/conn.php';
?>
</head>
<body>
    <main>
        <nav class="top-nav">
            <div class="bovenste-gedeelte">
                <div class="bovenste-gedeelte-boxen links"><div class="logo"><img src="img/logo.jpeg" alt=""></div></div>
                <div class="bovenste-gedeelte-boxen midden"><div class="boven-menu">
                    <a class="text-menu" href="">Home</a>
                    <a class="text-menu" href="">Reserveren</a>
                    <a class="text-menu"  href="">Meer</a>
                    <a class="text-menu bestling-text" href="login.php">Bestel online</a>
                </div></div>
                <div class="bovenste-gedeelte-boxen rechts">
                    <div class="user-circle">
                      <a href="login.php"><i class='fas fa-user-circle'></i></a>
                     <a href=""><i class="fa fa-shopping-bag"></i></a></div>
                    </div>
                </div>
            <div class="onderste-gedeelte">
                <div class="onderst-gedeelte-boxen onderlinks">
                </div>
                <div class="onderst-gedeelte-boxen ondermidden">
                <?php
                     $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
                     $user = 'root';
                     $password = '';
                      $connectie = new PDO($dsn, $user, $password);

                      if(isset($_POST['search'])) {
                             $zoekterm = '%'.$_POST['search'].'%';
                                  $stmt = $connectie->prepare("SELECT * FROM menu WHERE naam LIKE ?");
                         $stmt->execute([$zoekterm]);
                          $resultSet = $stmt->fetchAll();
                                }


                         else {
                                   $resultSet = $connectie->query("SELECT * FROM menu")->fetchAll();
                                }
                                ?>
             
             
                <form method="post">
                <div class="search__container">
                <input class="search__input" type="text" placeholder="Search" name="search">
                <h3 class=""></h3>
                  </div>
                  </form>
                </div>
                <div class="onderst-gedeelte-boxen onderrechts"></div>
            </div>
        </nav>
        
        <div class="wrapper">
        <!--Top menu -->
        <div class="sidebar">
           <!--profile image & text-->
            <div class="profile">
                <h4 class="h33"> Zorba Populaire gerechten </h4>
            
            </div>
            <!--menu item-->
            <ul>
                <li>
                    <a href="#" class="active">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="item">Hartige Crepês </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="item">Zoete Crepês</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="item">Special Crêpes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="item">Spaanse Quesadillas</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="item">Griekse Pita's</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="item">Wrap Burger</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="item">Wrappini's</span>
                    </a>
                </li>
            </ul>
            </div>
            <div class="big-div-eten">
            <?php
foreach($resultSet as $item) {
  echo '<div class="eten-box">';
  echo '<div class="gerecht-text">';
  echo '<div class="gerecht-naam"><p>' . $item['naam'] . '</p></div>';
  echo '<div class="gerecht-omschrijving"><p>' . $item['bijschrijving'] . '</p></div>';
  echo '</div>';
  echo '<div class="prijs-box">';
  echo '<div class="prijs"> &euro;' .  $item['prijs']  . '</div>';
  echo '<div class="Toe-voegen-en-verwijderen-boxen">';
  echo '<div class="Toe-voegen-box"><div class="Toe-voegen-text"><a href="" class="Toe-voegen-text">Toe voegen</a></div></div>';
  echo '<div class="verwijderen-box"><a href="" class="Toe-voegen-text">verwijderen</a></div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
?>
       
         
 
        </div>
        
    </div>
    <footer class="footer-distributed">

<div class="footer-left">

    <h3><span>Welcome bij Zorba</span></h3>

    <p class="footer-links">
        <a href="#" class="link-1">Home</a>
                
        <a href="#">About</a>
        
        <a href="#">Contact</a>
    </p>

</div>

<div class="footer-center">

    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>6811 AN Arnhem</span> Gele Rijders Plein 1</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>+31 699-66-555 </p>
    </div>

    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="">restaurant@gmail.com</a></p>
    </div>

</div>

<div class="footer-right">

    <p class="footer-company-about">
        <span>Over het restaurant</span>
        Zorba is een streetfoodrestaurant dat is gevestigd in de stad Groningen. Het restaurant is vernoemd naar Zorba de Griek, een bekend boek van de Griekse schrijver Nikos Kazantzakis.</p>

    <div class="footer-icons">

        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>

    </div>

</div>

</footer>
 </main>
    <script src="javascript/searchbox.js"></script>
    
    



</body>
</html>