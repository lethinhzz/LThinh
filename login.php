
<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnLogin'])){
    if(isset($_POST['pass'])&&isset($_POST['gmail'])){
        $pass = $_POST['pass'];
        $email = $_POST['gmail'];
        $c = new Connect();
        $dbLink =$c->connectToPDO();
        $sql= "SELECT * FROM user WHERE email =? and password = ?";
         $stmt = $dbLink->prepare($sql);
         $re = $stmt->execute(array("$email", "$pass"));
         $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if ($numrow==1){
            echo "Login successfully";
            setcookie("cc_username",$row['username'],time()+3600);
            header("Location: allproduct.php");
        } else {
            echo "Something wrong with your info <br>";
        }
    }else {
        echo "Please enter your info";
    }
}
?>
<div class="d-md-flex half">
    <div class="bg"></div>
</div>
<div class="container">
            <form action="#" class="form form-vertical" name="formlogin" role="form" method="post" enctype="multipart/form-data"> 
                <div class="row mb-3 ">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="username" class="col-sm-2"> Username</label>
                         <input id="username" type="text" name="user" class="form-control" placeholder="username">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="password" class="col-sm-2"> Password</label>
                         <input id="password" type="password" name="pass" class="form-control" placeholder="password">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                         <label for="gmail" class="col-sm-2"> Gmail</label>
                         <input type="email" name="gmail" id="gmail" class="form-control" placeholder="           @gmail.com">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
                            <label for="remember me " class="col-sm-3">Remember me</label>
                            <input type="checkbox" name="rmbme" id="rmb" checked="checked">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 mx-auto">
                        <div class="form-group">
<a href="#" class="col-sm-3">Forget password?</a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-1 mx-auto">
                        <div class="form-group">
                           <input type="submit" value="Log In" class="btn btn-info" name="btnLogin">
                        </div>
                    </div>
                </div>
            </form>
</div>
<?
require_once('footer.php');
?>