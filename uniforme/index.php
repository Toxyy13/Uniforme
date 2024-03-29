<?php
    require_once "functions.php"; 

    $title = "Six Uniformeee";
    $table = 'artikal';
    
    // $haljina= 'haljina';
    // $pantalone = 'pantalone';
    
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$title";?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="stil.css">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php require_once "nav.php"; ?>

    <div class="naslovnacnt"> 
      <?php
        if(isset($_GET['vrsta'])){
          
          $vrsta = $_GET['vrsta'];

          $sql="SELECT slika.put as put,
          artikal.id as id,
          artikal.naziv as naziv,
          artikal.cena as cena, 
          vrsta.naziv as vrsta
          FROM slika
          INNER JOIN artikal on slika.artikal_id = artikal.id
          INNER JOIN vrsta on vrsta.id = artikal.vrsta_id
          WHERE vrsta.naziv = '{$vrsta}'";

          $result = $mysqli->query($sql) or die($mysqli->error);
          $count = 0;
          while($row = $result->fetch_assoc()){
            echo "<div>
                    <a href='prikaz.php?id={$row['id']}'><img src='{$row['put']}' alt=''></a>
                    <p>{$row['naziv']}</p>
                    <p class='cena'>{$row['cena']} din</p>
                  </div>";
              $count++;
            }
        } else {
          echo  "<div class='nsl'>
                  
                </div>";
                echo "<style>
                .naslovnacnt , .nsl{
                    display:block;
                    height:70vh;
                }
              </style>";
        }

        if($count===0){
          echo "<div class='ndstpn'>
                    <h3>ARTIKLI NISU TRENUTNO DOSTUPNI</h3>
                </div>";
        }

      ?>
      <!-- <script>
        $(document).ready(function() {
          setInterval(function() {
            $('.rotiraj-levo').animate({ deg: '-=15deg' }, { duration: 500 });
            $('.rotiraj-desno').animate({ deg: '+=15deg' }, { duration: 500 });
          }, 5000); // promena smera rotacije svakih 5 sekundi
        });
        </script> -->
    </div>

    <?php require_once "footer.php";?>
   
    
</body>
</html>
</html>