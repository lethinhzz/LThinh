<?php
// goi noi dung cua tap tin
require_once('header.php');
// goi hai cai connect
require_once('connect.php');
$c = new connect();
// truy van
$dbLink = $c->connectToMySQL();
$a = $_GET['id'];
$sql = "SELECT * FROM product where catid= '$a'";
$re = $dbLink->query($sql);
// co gia tri tim thay dc lon hon 0 kiem dc ket qua


if ($re->num_rows > 0) {
?>
<div class="container">
        <div class="row mx-auto">
            <?php
            while ($row = $re->fetch_assoc()) {
            ?>

                <div class="card mb-3 col-3 mx-auto" style="width: 18rem;">
                    <img src="img/<?= $row['pimage'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">

                        <a href="detail.php?id=<?= $row['pid'] ?>" class="text-decoration-none">
                            <h6 class="text-center" style="font-size: 15px; color: black;"><?= $row['pname'] ?></h6>
                        </a>
                        <p class="card-cost text-center my-3" style="font-weight: bold; font-size: 30px;"><small class="text-muted"><?= $row['pprice'] ?>&#8363;</small></p>
                        <div class=" mx-auto"  style="text-align: center;">
                            <a href="cart.php?id=<?=$row['pid']?>"class="btn btn-warning nold-btn">add to cart</a>
                        </div>
                    </div>
                </div>
        <?php
            } //while
        } //if
        ?>
        </div>
    </div>
    <!-- body -->

    </body>

    </html>
    <?php
    require_once('footer.php');
    ?>