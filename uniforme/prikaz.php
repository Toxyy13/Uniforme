<?php
    require_once "functions.php";
    $title = "prikaz";
    $table= 'artikal';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="stil.css">

</head>

<body class="prikazbody">
<div class="prikazwrap">
    <?php

    require_once "nav.php";            
        
        if(isset($_GET['id'])){ 
            $artikal_id = $_GET['id'];
        }

        $sql= "SELECT *
              FROM artikal
              INNER JOIN slika on artikal.id = slika.artikal_id 
              WHERE artikal.id = $artikal_id";
              
        $result = $mysqli->query($sql) or die($mysqli->error);
        $row = $result->fetch_assoc();
        $naziv = $row['naziv'];   
        $cena = $row['cena'];
        $opis = $row['opis'];

    ?>   


        <?php echo "<img src='{$row['put']}' alt='' class='shopimg'>"; ?>

        <form method="POST" class="cartForm">
            
            <?php

                echo "<h2>$naziv</h2>";
                echo "<label for=''><h5>Izaberi velicinu</h5></label><br>";                  
                    
                if($row['2XS'] == 1){
                    echo "<input type='radio' name='velicina' id='' value='2XS' required>2XS";
                }
                if($row['XS'] == 1){
                    echo "<input type='radio' name='velicina' id='' value='XS' required>XS";
                }
                if($row['S'] == 1){
                    echo "<input type='radio' name='velicina' id='' value='S' required>S";
                }
                if($row['M'] == 1){
                    echo "<input type='radio' name='velicina' id='' value='M' required>M";
                }
                if($row['L'] == 1){
                    echo "<input type='radio' name='velicina' id='' value='L' required>L";
                }
                if($row['XL'] == 1){
                    echo "<input type='radio' name='velicina' id='' value='XL' required>XL";
                }
                if($row['2XL'] == 1){
                    echo "<input type='radio' name='velicina' id='' value='2XL' required>2XL";
                }
                if($row['3XL'] == 1){
                    echo "<input type='radio' name='velicina' id='' value='3XL' required>3XL";
                }

                echo "<div>
                        <h5>Opis: </h5>
                        <p>$opis</p>
                    </div>";
                    
                echo "<br><label><h5>Cena: <h5></label>
                    <p>$cena</p>";

            ?>

            <button type='submit'  class='btn-prikaz' name="dodaj_u_korpu" onclick="" id="btnForm">Dodaj u korpu</button>
        
        </form>     

        <?php
            if(isset($_POST['velicina'])){
                $velicina = $_POST['velicina'];
                
                dodajElement($artikal_id,$velicina);
                // print_r($_SESSION['items']);
                header("Refresh:0");
            }
        ?>

</div>  
    
    <?php require_once "footer.php";?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
</body>
</html>