<?php

require_once 'init.php';

if (isset($_POST["token"])) {
    $mysqli = getConnection();

    $id = null;
    $name = clean($_POST["inputName"], $mysqli);
    $email = clean($_POST["inputEmail"], $mysqli);
    $phone = clean($_POST["inputPhone"], $mysqli);
    $age = clean($_POST["inputAge"], $mysqli);
    $remark = clean($_POST["inputRemark"], $mysqli);
    $interest = clean($_POST["inputInterest"], $mysqli);
    $status = clean($_POST["inputStatus"], $mysqli);

    $stmt = $mysqli -> prepare("INSERT INTO table_register VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt -> bind_param('sississs', $name, $id, $phone, $email, $age, $status, $interest, $remark);

    if ($stmt -> execute()) {
        $stmt -> close();

        $mysqli -> close();

        header("Location: ../registerOffline.php?registered=true");
        die();
    } else {

        $stmt -> close();

        $mysqli -> close();

        header("Location: ../registerOffline.php?failed=true");
        die();
    }

}
?>