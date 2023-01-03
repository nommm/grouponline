<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['reg_user'])) {

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $tel = mysqli_real_escape_string($conn, $_POST['telephone']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if (empty($uid)) {
        array_push($errors, "UID is required");
    }
    if (empty($tel)) {
        array_push($errors, "Telephone numbers is required");
    }
    if (empty($name)) {
        array_push($errors, "Firstname is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Password is not match");
    }

    $user_check_query = "SELECT * FROM student WHERE stuid = '$uid'";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['stuid'] === $uid) {
            array_push($errors, "UID already exists");
        }
    }


    if (count($errors) == 0) {
        $password = $password_1;
        $sql = "INSERT INTO student (stuid, stname, stgrade, sttel, stpassword, stuserlevel)
                    VALUES ('$uid', '$name','$grade','$tel','$password','student')";
        mysqli_query($conn, $sql);
        $row= mysqli_fetch_assoc(mysqli_query($conn, $sql));


        $_SESSION['success'] = "You are now logged in";
        $_SESSION['uid'] =  $uid;
        $_SESSION['userlevel'] = $row['stuserlevel'];
        print_r($errors);
        echo $_SESSION['success'];
        echo $_SESSION['uid'];
        header('location: ../index.php');
    } else {
        array_push($errors, "Have something wrong");
        $_SESSION['error'] = "Have something wrong";
        print_r($errors);
        header('location: ../register.php');
        echo $_SESSION['error'];
    }
}
