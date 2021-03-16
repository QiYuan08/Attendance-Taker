<?php
// TODO: verify correct code and show correct error msg
// conn to db
require 'config.php';

if (isset($_POST['submitBtn'])){

    // get inputted data first
    $name = $_POST['name'];
    $class = $_POST['class'];
    $code = $_POST['code'];
    date_default_timezone_set('Asia/Kuala_Lumpur'); // get the date from time stamping
    
    // empty check
    if (empty($name)) {
        header("Location: ../index.php?error=emptyname");
        exit();
    } else if (empty($class)) {
        header("Location: ../index.php?error=emptyclass");
        exit();
    } else if (empty($code)) {
        header("Location: ../index.php?error=emptycode");
        exit();
    }
    
    $date = date('Y-m-d');
    // start sql query
    $sql = "SELECT * FROM attendence WHERE Name='$name' AND code='$code' AND class='$class' AND Date='$date'";
    $result = mysqli_query($db, $sql);

    // if student already take attendence
    if (mysqli_num_rows($result) > 0){
        header("Location: ../taken.php");
        exit();
    }

    // check if the code is correct with teacher code
    $sql = "SELECT * FROM teacher WHERE Name='Kung Kha Eng' AND Username='Kung'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($code !== $row['code']){
        header("Location: ../index.php?error=code");
        exit();
    }

    // else take the attendence of the student
    $date = date('Y-m-d H:i:s');

    echo $date;
    $sql = "INSERT INTO attendence (AttendenceID, Name, class, Date, code) VALUES ('$code', '$name', '$class', '$date', '$code')";
    $result = mysqli_query($db, $sql);

    if ($result == false){
        echo("Error description: " . mysqli_error($db));
        header('Location: ../index.php?error='.mysqli_error($db));
    } else {
        header('Location: ../success.php');
    }
    

} else {
    header('Location: ../index.php?error=button');
}