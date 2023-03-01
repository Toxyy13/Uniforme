
    
<nav >
    <a href="index.php" class="logonaslov"><img src="artikli/logo.png" id="logo" alt=""></a>
    <div class="vrsta">
        <a href="" class="meni">
            ZENSKA UNIFORMA</a>
        <ul class="vrste"><br><br>
            <li><a href="index.php?vrsta=bluze">Bluze</a></li><br>
            <li><a href="index.php?vrsta=pantalone">Pantalone</a></li><br>
            <li><a href="index.php?vrsta=mantil">Mantil</a></li><br>
            <li><a href="index.php?vrsta=haljine">Haljine</a></li><br>
            <li><a href="index.php?vrsta=suknje">Suknje</a></li><br>
        </ul>
    </div>
    <div class="vrsta">
        <a href="" class="meni">MUSKA UNIFORMA</a>
        <ul class="vrste"><br><br>
            <li><a href="index.php?vrsta=bluzeM">Bluze</a></li> <br>
            <li><a href="index.php?vrsta=pantaloneM">Pantalone</a></li><br>
            <li><a href="index.php?vrsta=mantilM">Mantil</a></li><br>

        </ul>
    </div>
    <a href="" class="vrsta">KAPE</a>
    <a href="" class="vrsta">MAJICE</a>
    <a href="cart.php" class="cart vrsta">
            <i class="bi bi-cart" id="cart"></i>
            <?php 
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo "<span>$count</span>";
                } 
                else 
                    echo "<span>0</span>";

            ?>
    </a>
</nav>




