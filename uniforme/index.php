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
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <?php require_once "nav.php"; ?>

    <div class="naslovnacnt"> 
      <?php
        if(isset($_GET['vrsta'])){
          
          $vrsta = $_GET['vrsta'];

          $sql="SELECT slika.put as put,
          artikal.id as id,
          artikal.naziv as naziv,
          artikal.cena as cena, 
          vrsta.naziv
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
                    <p>{$row['cena']}</p>
                  </div>";
              $count++;
            }
        } else {
          echo  "<div class='nsl'>
                  <a class='naslovna' href='index.php?vrsta=bluze'><img src='artikli/pocetna_z_slika' alt=''></a>
                  <a class='naslovna' href='index.php?vrsta=bluzeM'><img src='artikli/pocetna_m_slika' alt=''></a>
                </div>";
        }

        if($count===0){
          echo "<div class='ndstpn'>
                    <h3>ARTIKLI NISU TRENUTNO DOSTUPNI</h3>
                </div>";
                  
        }
      ?>
    </div>
    <?php require_once "footer.php";?>
   
    <script src="skripta.js"></script>
</body>
</html>
</html>