<?php
require_once('header.php');
include_once('connect.php');

$c = new connect();
$dbLink = $c->connectToMySQL();
$sql = 'SELECT * FROM product';
$re = $dbLink->query($sql);

if(isset($_POST['ADD'])){
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $id = $_POST['proId'];
    $name = $_POST['proName'];
    $price = $_POST['price'];
    $desc = $_POST['proDe'];
    $date = '2023-04-14';
    $quan = $_POST['quan'];
    $cat = $_POST['catId'];
    $img = str_replace(' ','-',$_FILES['Pro_image']['name']);
    $imgdir = './img/';
    $flag = move_uploaded_file(
        $_FILES['Pro_image']['tmp_name'],
        $imgdir.$img
    );
    if($flag){
        $sql ="INSERT INTO `product`(`pname`, `pprice`, `pquan`, `pdesc`, `pimage`, `pdate`, `catid`) VALUES (?,?,?,?,?,?,?)";
        $re = $dbLink->prepare($sql);
        $v = [$name,$price,$quan,$desc,$img,$date,$cat];
        $stmt = $re->execute($v);
        if($stmt){
            echo "Congrats";
        }
    }else{
        echo "failed";
    }


}
?>

<div class="container">
    <h2>Product Add</h2>

    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
            
            <div class="row mb-3">
                <div class="col-12">
                    <label for="proId" class="col-sm-2">ProductID</label>
                    <div class="col-sm-10">
                        <input id="proid" type="text" name="proId" class="form-control" placeholder="ProductID" value="">
                    </div>  
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="proName" class="col-sm-2">Product Name</label>
                    <div class="col-sm-10">
                        <input id="proName" type="text" name="proName" class="form-control" placeholder="Product Name" value="">
                    </div>  
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="price" class="col-sm-2">Price</label>
                    <div class="col-sm-10">
                        <input id="price" type="text" name="price" class="form-control" placeholder="Price" value="">
                    </div>
                </div>  
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="ProDe" class="col-sm-2">Product Description</label>
                    <div class="col-sm-10">
                        <input id="proD" type="text" name="proDe" class="form-control" placeholder="Product Description" value="">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="proDate" class="col-sm-2">Product Date</label>
                    <div class="col-sm-10">
                        <input id="proDate" type="date" name="proDate" class="form-control" placeholder="Product Name" value="">
                    </div>
</div>  
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="quan" class="col-sm-2">Quannity</label>
                    <div class="col-sm-10">
                        <input id="quan" type="text" name="quan" class="form-control" placeholder="Quannity" value="">
                    </div>
                </div>  
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <label for="image-vertical">Image</label>
                        <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <label for="catId" class="col-sm-2">Cat Id</label>
                    <div class="col-sm-10">
                        <input id="catId" type="text" name="catId" class="form-control" placeholder="Cat Id" value="">
                    </div>
                </div>  
            </div>

            <div class="row mb-3">
                <div class="col-2 ms-auto row">
                    <div class="col-6 d-grid mx-auto">
                        <button type="submit" name="ADD" class="btn btn-warning">Submit</button>
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