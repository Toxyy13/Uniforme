<?php
        require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stil.css">
    <link rel="stylesheet" href="formm.css">

    <title>Forma</title>
</head>
<body>
    
<div>
    <?php require_once "nav.php";?>

    <form method="post">
        <label for="name">Ime:</label>
        <input type="text" id="name" name="name" required>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" required>

        <label for="email">E-mail adresa:</label>
        <input type="email" id="email" name="email" required>

        <label for="Grad">Grad:</label>
        <input type="text" id="grad" name="grad" required>

        <label for="postanski_br">Postanski broj:</label>
        <input type="text" id="postanski_br" name="postanski_br" required>

        <label for="ulica">Ulica i broj:</label>
        <input type="text" id="ulica" name="ulica" required>

        <label for="message">Poruka:</label>
        <textarea id="message" name="message" ></textarea>

        <button type="submit" name="submit">Poruci</button>
    </form>

<?php
?>

    <?php require_once "footer.php"?>
</div>


</body>
</html>