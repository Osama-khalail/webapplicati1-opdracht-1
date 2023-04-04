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
                <div class="bovenste-gedeelte-boxen links"><div class="logo"></div></div>
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
                    <div class="search__container">
                       <input class="search__input" type="text" placeholder="Search">
                       <h3 class=""></h3>
                    </div>                
                </div>
                <div class="onderst-gedeelte-boxen onderrechts"></div>
            </div>
        </nav>
        
        <div class="wrapper">
        <!--Top menu -->
        <div class="sidebar">
           <!--profile image & text-->
            <div class="profile">
                <img src="img/Magnifying_glass_icon.svg.png" alt="">
                <h3 class="h33"> Welcom</h3>
            
            </div>
            <!--menu item-->
            <ul>
                <li>
                    <a href="#" class="active">
                        <span class="item">Populaire gerechten</span>
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
$resulset = $conn->query("SELECT * FROM menu");
while ($item = $resulset->fetch()) {
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
 </main>
    <script src="javascript/searchbox.js"></script>
    
    



</body>
</html>