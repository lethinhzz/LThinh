<?php
use FTP\Connection;

require_once('header.php');
require_once('connect.php');
if (isset($_POST['btnRegister'])) {
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $usr = $_POST['usrname'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = isset($_POST['grpGender']) ? $_POST['grpGender'] : ''; // Corrected the gender variable
    $ht = $_POST['hometown'];

    $sql = "INSERT INTO `user`(`username`, `password`, `phone`, `email`, `gender`, `hometown`) VALUES (?,?,?,?,?,?) ";
    $re = $dbLink->prepare($sql);
    $valueArray = [
        $usr, $pass, $phone, $email, $gender, $ht // Removed unnecessary quotes
    ];

    $stmt = $re->execute($valueArray);
    if ($stmt) {
        echo "Congratulations! You have successfully registered!";
    } else {
        echo "Registration failed";
    }
}
?>
<div class="container">
    <h2>Member Registration</h2>
    <form id="formreg" class="formreg" name="formreg" role="form" method="POST">
        <div class="row mb-3">
            <label for="username" class="col-sm-2">Username:</label>
            <div class="col-sm-10">
                <input id="username" type="text" name="usrname" class="form-control" value="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2">Password:</label>
            <div class="col-sm-10">
                <input id="password" type="password" name="password" class="form-control" value="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="phone" class="col-sm-2">Phone:</label>
            <div class="col-sm-10">
                <input id="phone" type="text" name="phone" class="form-control" value="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2">Email:</label>
            <div class="col-sm-10">
                <input id="email" type="text" name="email" class="form-control" value="">
            </div>
        </div>
        <div class="row mb-3">
            <label for="gender" class="col-sm-2">Gender:</label>
            <div class="col-sm-10">
                <div class="form-check d-sm-inline-flex">
                    <input type="radio" name="grpGender" value="female" class="form-check-input">
                    <label class="form-check-label">Female</label>
                </div>
                <div class="form-check d-inline-flex">
                    <input type="radio" name="grpGender" value="male" class="form-check-input">
                    <label class="form-check-label">Male</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="hometown" class="col-sm-2">Hometown:</label>
            <div class="col-sm-10">
                <select id="hometown" class="form-select" name="hometown">
                    <option selected value="unknown">Choose your hometown</option>
                    <option value="ct">Cần Thơ</option>
                    <option value="st">Sóc Trăng</option>
                    <option value="vl">Vĩnh Long</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="d-grid col-2 mx-auto">
                <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>
