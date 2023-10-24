<?php
require_once("header.php");
require_once("connect.php");
$c = new connect();
$dblink = $c->connectToPDO();

if(isset($_COOKIE['cc_username'])){
if(isset($_GET['id'])){
    $pid=$_GET['id'];
   
    $findSql="SELECT * FROM `cart` WHERE `user_id` = ? and `pid` = ?"; // đi hỏi coi khách hàng mua hay chưa 
    $re=$dblink->prepare($findSql);
    $valueArray = [
       'thinh',$pid
    ];
    $stmt = $re->execute($valueArray);
    if ($re->rowCount()==0) { //chua mua hang nhe 
        $sql= "INSERT INTO `cart`(`user_id`, `pid`, `pCount`, `date`) VALUES (?,?,1,CURDATE())";
    }else {
        $sql="UPDATE `cart` SET `pCount`=`pCount`+1,`date`=CURDATE() WHERE `user_id` = ? and `pid` = ?";
    }
    $re1=$dblink->prepare($sql);
    $valueArray1 = [
        'thinh',$pid
    ];
    $stmt = $re1->execute($valueArray1);
}
$showCartSql ="SELECT   `pname`, `pprice`,`pimage`, `pCount` FROM `cart` c, `product` p  WHERE
c.pid = p.pid and `user_id` = ?";
$re1=$dblink->prepare($showCartSql);
    $valueArray1 = [
        'thinh'
    ];
    $stmt = $re1->execute($valueArray1);
    $rows = $re1->fetchAll(PDO::FETCH_BOTH);
  }
  else{
    header("Location: login.php");
  }
?>
<style>
    @media (min-width: 1025px) {
    .h-custom {
    height: 100vh !important;
    }
    }
    
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
    }
    
    .card-registration .select-arrow {
    top: 13px;
    }
    
    .bg-grey {
    background-color: #eae8e8;
    }
    
    @media (min-width: 992px) {
    .card-registration-2 .bg-grey {
    border-top-right-radius: 16px;
    border-bottom-right-radius: 16px;
    }
    }
    
    @media (max-width: 991px) {
    .card-registration-2 .bg-grey {
    border-bottom-left-radius: 16px;
    border-bottom-right-radius: 16px;
    }
    }
</style>

<section class="h-100 h-custom" style="background-color: #fff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    <h6 class="mb-0 text-muted"><?=$re1->rowCount()?>items</h6>
                  </div>
                  <hr class="my-4">
                  <?php
                foreach($rows as $row){
                ?>
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="./img/<?=$row['pimage']?>"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?=$row['pname']?></h6>
                      <h6 class="text-black mb-0"></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>

                      <input id="form1" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-sm" />

                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?=$row['pprice']?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                  <?php
                }
                ?>
                  <div class="pt-5">
                    <h6 class="mb-0"><a href="allproduct.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</section>