<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/adminplaner2.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <title> admin planer2</title>
  <?php
  require_once './database/conn.php';
?>

</head>
<body>
      <input type="checkbox" id="nav-toggle">
    <div class="side-bar">
        <div class="sidebar-brand">
            <h2><span class="lab la-dog"></span><span>Logo</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php" class="active">
                      <span class="las la-igloo"></span>
                      <span>Dashobard</span></a>
                </li>
                <li>
                    <a href="">
                      <span class="las la-users"></span>
                      <span>klanten</span></a>
                </li>
                <li>
                    <a href="gerechten.php">
                      <span class="las la-clipboard-list"></span>
                      <span>Gerechten</span></a>
                </li>
                <li>
                    <a href="">
                      <span class="las la-shopping-bag"></span>
                      <span>bestelling</span></a>
                </li>
                <li>
                    <a href="">
                      <span class="las la-receipt"></span>
                      <span>Inveentaris</span></a>
                </li>
                <li>
                    <a href="">
                      <span class="las la-user-circle"></span>
                      <span>Accounts</span></a>
                </li>
                <li>
                    <a href="">
                      <span class="las la-clipboard-list"></span>
                      <span>Taken</span></a>
                </li>
                
               
            </ul>
        </div>
    </div>
    <div class="main-content">
      <header>
        <h2>
          <label for="nav-toggle">
            <span class="las la-bars"></span>
          </label>
          Dashboard
        </h2>
        <div class="search-wrapper">
          <span class="las la-search"></span>
          <input type="search" placeholder="Zoek hier"/>
        </div>
        <div class="user-wrapper">
          <img src="img/user.jpeg" width="40px" height="40px" alt="">
          <div class="">
            <h4>Osama F khlil</h4>
            <small>Super admin</small>
          </div>
        </div>
      </header>
      <main>
        <div class="cards">
          <div class="card-single">
            <div>
            <h1>54</h1>
            <span>Klanten</span>
            </div>
            <div>
            <span class="las la-users"></span>
          </div>
          </div>
          <?php
              $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
              $user = 'root';
              $password = '';
              $dbh = new PDO($dsn, $user, $password);


              $stmt = $dbh->prepare("SELECT COUNT(*) as count FROM menu");
              $stmt->execute();
              $result = $stmt->fetch();

             // Haal het resultaat op
              $aantalGerechten = $result['count'];
              ?>

             <div class="card-single">
             <div>
                 <h1><?php echo $aantalGerechten; ?></h1>
               <span>Gerechten</span>
                  </div> 
                    <div>
                       <span class="las la-clipboard"></span>
                       </div>
                 </div>
          <div class="card-single">
            <div>
            <h1>256</h1>
            <span>bestelling</span>
            </div>
            <div>
            <span class="las la-clipboard-list"></span>
          </div>
          </div>
          <div class="card-single">
            <div>
            <h1>100K&euro;</h1>
            <span class="inkomen-text">inkomen</span>
            </div>
            <div>
            <span class="lab la-google-wallet"></span>
          </div>
          </div>
        </div>
        <div class="reecent-grid">
            <div class="projects">
            <?php
            if(isset($_POST['submit_button'])) {
   
              $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
              $user = 'root';
              $password = '';
          $dbh = new PDO($dsn, $user, $password);
           // Leesbaarheid
           $naam = $_POST['gerecht-naam'];
           $bijschrijving = $_POST['gerecht-beschrijving'];
           $prijs = $_POST['gerecht-prijs'];
                 // Informatie toevoegen aan de database.
                  $statement = $dbh->prepare("INSERT INTO menu(naam, bijschrijving, prijs) VALUES (?, ?, ?)");
                   $statement->execute([$naam, $bijschrijving, $prijs]);
                  }
                  ?>
                    <div class="card-header">
                      <h3>Gerechten</h3> 
                     <a href="verwijder_gerecht.php"><button id="">Gerecht verwijderen <span class="las la-arrow-right"></span></button></a> 
                      <button id="popup-button">Voeg een nieuw gerecht toe <span class="las la-arrow-right"></span></button>
                    </div>
                    <div id="popup" class="popup">
                       <div class="popup-content">
                         <span class="close close2">&times;</span>
                         <h4 class="voeg-text">Voeg een nieuw gerecht toe</h4>
                         <form  class="gerecht-invullen"method="POST" action="">
                          <label for="gerecht-naam">Naam gerecht:</label>
                           <input type="text" id="gerecht-naam" name="gerecht-naam"><br><br>
                           <label for="gerecht-beschrijving">Beschrijving:</label> 
                           <textarea id="gerecht-beschrijving" name="gerecht-beschrijving"></textarea><br><br>
                          <label for="gerecht-prijs">Prijs:</label>
                           <input type="text" id="gerecht-prijs" name="gerecht-prijs"><br><br>  
                             <input type="submit" name="submit_button" value="Toevoegen">
                            </form>
                            </div>
                          </div> 
                            
                 <div class="card-body">
                       <table width="100%">
                          <thead>
                             <tr> 
                               <td>Naam</td>
                               <td>Omschrijving</td>
                               <td>Prijs</td>
                             </tr>
                          </thead>
                          <tbody>
                            <?php
                           $resulset = $conn->query("SELECT * FROM menu");
                           while ($item = $resulset->fetch()) {
                                  echo '<tr>';
                                  echo '<td>' . $item['naam'] . '</td>';
                                  echo '<td>' . $item['bijschrijving'] . '</td>';
                                  echo '<td>';
                                  echo '<span class="status"></span>';
                                  echo '&euro;' . $item['prijs'];
                                  echo '</td>';
                                  echo '</tr>';
                                       }
                                        ?>
                                        </tbody>
                       </table>
                 </div>
            </div>
             <div class="customers">
                   <div class="card-header">
                       <h3>Nieuw klanten</h3>
                        <button>See all <span class="las la-arrow-right"></span></button>
                 </div>
                    <div class="card-body">
                          <div class="customer">
                               <div class="customer-img" >
                               <img src="img/kalnten.png"  width="40px"
                                height="40px" alt="">
                                 <div class="info">
                                       <h4>Dylan,Backus</h4>
                                       <small>Adres:Arnhem</small>
                                 </div>
                               </div>
                               <div class="contact">
                                   <span class="las la-user-circle"></span>
                                   <span class="las la-comment"></span>
                                   <span class="las la-phone"></span>
                               </div>
                          </div>
                          <div class="customer">
                               <div class="customer-img">
                               <img src="img/kalnten.png"  width="40px"
                                height="40px" alt="">
                                 <div class="info">
                                       <h4>Dylan,Backus</h4>
                                       <small>Adres:Arnhem</small>
                                 </div>
                               </div>
                               <div class="contact">
                                   <span class="las la-user-circle"></span>
                                   <span class="las la-comment"></span>
                                   <span class="las la-phone"></span>
                               </div>
                          </div>
                          <div class="customer">
                               <div class="customer-img">
                               <img src="img/kalnten.png"  width="40px"
                                height="40px" alt="">
                                 <div class="info">
                                       <h4>Dylan,Backus</h4>
                                       <small>Adres:Arnhem</small>
                                 </div>
                               </div>
                               <div class="contact">
                                   <span class="las la-user-circle"></span>
                                   <span class="las la-comment"></span>
                                   <span class="las la-phone"></span>
                               </div>
                          </div>
                          <div class="customer">
                               <div class="customer-img">
                               <img src="img/kalnten.png"  width="40px"
                                height="40px" alt="">
                                 <div class="info">
                                       <h4>Dylan,Backus</h4>
                                       <small>Adres:Arnhem</small>
                                 </div>
                               </div>
                               <div class="contact">
                                   <span class="las la-user-circle"></span>
                                   <span class="las la-comment"></span>
                                   <span class="las la-phone"></span>
                               </div>
                          </div>
                          <div class="customer">
                               <div class="customer-img">
                               <img src="img/kalnten.png"  width="40px"
                                height="40px" alt="">
                                 <div class="info">
                                       <h4>Dylan,Backus</h4>
                                       <small>Adres:Arnhem</small>
                                 </div>
                               </div>
                               <div class="contact">
                                   <span class="las la-user-circle"></span>
                                   <span class="las la-comment"></span>
                                   <span class="las la-phone"></span>
                               </div>
                          </div>
                     </div>
                  </div>
              </div>        
        </div>  
      </main>
    </div>
</body>
<script src="adminplaner2.js"></script>
</html>