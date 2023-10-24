<?php
// goi noi dung cua tap tin
require_once('header.php');
// goi hai cai connect
require_once('connect.php');
$c = new connect();
// truy van
$dbLink = $c->connectToMySQL();
$a=$_GET['id'];
$sql = "SELECT * FROM product where pid= '$a'";
$re = $dbLink->query($sql);
// co gia tri tim thay dc lon hon 0 kiem dc ket qua


if($re->num_rows>0){
?>
<div class="container">
    <div class="row">
        <?php
            while($row=$re->fetch_assoc()){
        ?>
        <!-- html div col -->
        <div class="col-4">
                <div class="card " style="width: 18rem;">
                  <img src="./img/<?=$row['pimage']?>" class="card-img-top" alt="...">
                  <div class="card-body">
                <h5 class="card-title">
                    <a href="detail.php?id=<?=$row['pid']?>"> <?=$row['pname']?></a>
                   
                </h5>
                <?=$row['pprice']?>
                <div> <?=$row['pdesc']?></div>
                <p class="card-text"></p>
                <a href="cart.php?id=<?=$row['pid']?>"class="btn btn-warning nold-btn">add to cart</a>
                  </div>
                </div>
            </div>
        <?php
            } //while
        }//if
        // echo "hhhh";
        ?>
    </div>
</div>
        <!-- body -->

</body>
</html>
<?php
require_once('footer.php');
?>