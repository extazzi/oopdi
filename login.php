<?php
require __DIR__ . "/vendor/autoload.php";
$users = new App\DBSystem\RegisteryUsers();
//var_dump($users instanceof \App\DBInterface\IConnection);
session_start();
if (isset($_POST['reg_registery'])) {
    $fname = !empty($_POST['reg_fname']) ? htmlspecialchars($_POST['reg_fname']) : '';
    $lname = !empty($_POST['reg_lname']) ? htmlspecialchars($_POST['reg_lname']) : '';
    $mail = !empty($_POST['reg_mail']) ? htmlspecialchars($_POST['reg_mail']) : '';
    $gender = !empty($_POST['reg_gender']) ? $_POST['reg_gender'] : 0;
    $users->registery($fname, $lname, $mail, $gender);
}
if (isset($_POST['aut_auth'])) {
    $lname = !empty($_POST['aut_lname']) ? htmlspecialchars($_POST['aut_lname']) : '';
    $mail = !empty($_POST['aut_mail']) ? htmlspecialchars($_POST['aut_mail']) : '';
    $users->authorization($lname, $mail);
}
if (isset($_SESSION['user_session'])){
    header('Location: http://localhost/oop/');
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
<link href="css/style.css" rel="stylesheet">
<script src="js/common.js"></script>

<div>
    <div class="row align-items-center" style="height: 100%">
        <div class="col-lg-6 left-content registery">
            <form class="form-horizontal" method="post" style="width: 70%;">
                <div class="form-group">
                    <label class="control-label" for="lastName">Фамилия:</label>
                    <div class="col-xs-5">
                        <input type="text" class="form-control" name="reg_lname" id="lastName"
                               placeholder="Введите фамилию">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="firstName">Имя:</label>
                    <div class="col-xs-5">
                        <input type="text" class="form-control" name="reg_fname" id="firstName" placeholder="Введите имя">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputEmail">Email:</label>
                    <div class="col-xs-5">
                        <input type="email" class="form-control" name="reg_mail" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div style="display: flex">
                    <div style="flex-basis: 50%">
                        <div class="form-group">
                            <label class="control-label">Пол:</label>
                            <div class="col-xs-2">
                                <label class="radio-inline">
                                    <input type="radio" name="reg_gender" checked value="0"> Мужской
                                </label>
                            </div>
                            <div class="col-xs-2">
                                <label class="radio-inline">
                                    <input type="radio" name="reg_gender" value="1"> Женский
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; flex-basis: 50%; align-items: center; justify-content: flex-end">
                        <div class="">
                            <input type="submit" name="reg_registery" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6 left-content authorization d-none">
            <form class="form-horizontal" method="post" style="width: 70%;">
                <div class="form-group">
                    <label class="control-label" for="aut_lastName">Фамилия:</label>
                    <div class="col-xs-5">
                        <input type="text" class="form-control" name="aut_lname" id="aut_lastName"
                               placeholder="Введите фамилию">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="aut_inputEmail">Email:</label>
                    <div class="col-xs-5">
                        <input type="email" class="form-control" name="aut_mail" id="aut_inputEmail" placeholder="Email">
                    </div>
                </div>
                <div style="display: flex; flex-basis: 50%; align-items: center; justify-content: flex-end">
                    <div class="">
                        <input type="submit" name="aut_auth" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-6 right-content">
            <div class="content reg" data-class="registery"
                 style="display: flex; flex-basis: 50%; align-items: center; justify-content: center">
                <a href=""><p>Регистрация</p></a>
            </div>
            <div class="content auth" data-class="authorization"
                 style="display: flex; flex-basis: 50%; align-items: center; justify-content:  flex-end">
                <a href=""><p>Авторизация</p></a>
            </div>
        </div>
    </div>
</div>