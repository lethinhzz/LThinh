<?php
require_once('header.php');
include_once('connect.php');

$c = new connect();
$dbLink = $c->connectToMySQL();
$sql = 'SELECT * FROM product';
$re = $dbLink->query($sql);

if (isset($_POST['update'])) {
    $c = new Connect();
    $dbLink = $c->connectToPDO();

    $id = $_POST['proId']; // Sử dụng proId để xác định sản phẩm cần cập nhật
    $name = $_POST['proName'];
    $price = $_POST['price'];
    $desc = $_POST['proDe'];
    $date = $_POST['proDate'];
    $quan = $_POST['quan'];
    $cat = $_POST['catId'];
    $img = str_replace(' ', '-', $_FILES['Pro_image']['name']);
    $imgdir = './img/';
    $flag = move_uploaded_file(
        $_FILES['Pro_image']['tmp_name'],
        $imgdir . $img
    );

    if ($flag) {
        $sql = "UPDATE `product` SET `pname` = ?, `pprice` = ?, `pquan` = ?, `pdesc` = ?, `pimage` = ?, `pdate` = ?, `catid` = ? WHERE pid = ?";
        $re = $dbLink->prepare($sql);
        $v = [$name, $price, $quan, $desc, $img, $date, $cat, $id]; // Thêm $id vào mảng giá trị
        $stmt = $re->execute($v);

        if ($stmt) {
            echo "Update successful";
        } else {
            echo "Product update failed";
        }
    }
}
?>

<div class="container">
    <h2>Update product</h2>
    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-12">
            <label for="proId" class="col-sm-2">ID</label>
                <div class="col-sm-10">
                    <input id="proId" type="text" name="proId" class="form-control" value="">
                </div>
                <label for="proName" class="col-sm-2">Name</label>
                <div class="col-sm-10">
                    <input id="proName" type="text" name="proName" class="form-control" value="">
                </div>
                <label for="price" class="col-sm-2">Price</label>
                <div class="col-sm-10">
                    <input id="price" type="text" name="price" class="form-control" placeholder="Price" value="">
                </div>
                <label for="ProDe" class="col-sm-2">Product Description</label>
                <div class="col-sm-10">
                    <input id="proD" type="text" name="proDe" class="form-control" placeholder="Product Description" value="">
                </div>
                <label for="proDate" class="col-sm-2">Product Date</label>
                <div class="col-sm-10">
                    <input id="proDate" type="date" name="proDate" class="form-control" placeholder="Product Name" value="">
                </div>
                <label for="quan" class="col-sm-2">Quannity</label>
                <div class="col-sm-10">
                    <input id="quan" type="text" name="quan" class="form-control" placeholder="Quannity" value="">
                </div>
                <div class="form-group">
                    <label for="image-vertical">Image</label>
                    <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                </div>
                <label for="catId" class="col-sm-2">Cat Id</label>
                <div class="col-sm-10">
                    <input id="catId" type="text" name="catId" class="form-control" placeholder="Cat Id" value="">
                </div>
            </div>
        </div>
        <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="update" class="btn btn-warning">Update</button>
                    </div>
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="btnReset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </div>
    </form>
</div>

<?php
require_once('footer.php');
?>