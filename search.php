<?php
require_once('header.php');
require_once('connect.php');
?>


    <div class="row mx-auto">
        <?php
        $c = new Connect();
        $dblink = $c->connectToPDO();

        if (isset($_GET['search'])) {
            $nameP = $_GET['search'];
        } else {
            $nameP = "";
        }

        $sql = "SELECT * FROM product WHERE pname LIKE ?";
        $re = $dblink->prepare($sql);
        $valueArray = ["%$nameP%"]; //dieu kien like
        $re->execute($valueArray);
        $row = $re->fetchAll(PDO::FETCH_BOTH); //fetchAll lay toan bo
        if ($re->rowCount() > 0) {
            foreach ($row as $r):
                ?>

                <div class="row card mb-3 col-3 mx-auto" style="width: 18rem;">
                    <img src="img/<?= $r['pimage'] ?>" class="card-img-top my-3" alt="..."
                        style="max-width: 100%; height: auto; border: 1px solid black; border-radius: 6px;">

                    <div class="card-body mx-auto">
                        <a href="detail.php?id=<?= $r['pid'] ?>" class="text-decoration-none">
                            <h6 class="text-center" style="font-size: 15px; color: black;">
                                <?= $r['pname'] ?>
                            </h6>
                        </a>

                        <p class="card-cost text-center" style="font-weight: bold; font-size: 30px;"><small class="text-muted">
                                <?= $r['pprice'] ?>
                            </small></p>

                        <div class="row add-to-cart mx-auto">
                            <button class="btn btn-warning btn-rounded-pill mx-auto">
                                <a href="cart.php?id=<?= $r['pid'] ?>" class="text-decoration-none text-black">Add to cart<i
                                        class="fas fa-shopping-cart"></i></a>
                            </button>
                        </div>
                    </div>
                </div>

                <?php
            endforeach;
            ?>

            <?php
        } else {
            echo "Nothing";
        }
        ?>
    </div>
</div>

<?php
require_once('footer.php');
?>