<?php 
    session_start();
    include('server.php');

    $errors = array();
    print_r($errors);
    if (isset($_POST['login_user'])) {
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $password = mysqli_real_escape_string($conn, $_POST['password_1']);
        if(empty($uid)) {
            array_push($errors, "UID is required");
        }
        if(empty($password)) {
            array_push($errors, "Password is required");
        }
        print_r($errors);
        if(count($errors) == 0 ) {
            $query = "SELECT * FROM student WHERE stuid = '$uid' AND stpassword = '$password'";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['success'] = "You are now logged in";
                $_SESSION['userlevel'] = $row['stuserlevel'];
                $_SESSION['uid'] = $uid;
                print_r($errors);
                header('location: ../index.php');
            } else {
                array_push($errors,"Wrong username or password combination");
                $_SESSION['error'] = "";
                print_r($errors);
                header('location: ../login.php');

            }
    
        }
    }


?>