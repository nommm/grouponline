<?php
session_start();
include('./server/server.php');
//--------------------------------------------------------------------------------------|start
//----------------------------------|start|---------------------------------------------|start
function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
$id = $_SESSION['uid'];
if (!isset($_SESSION['uid'])) {
    alert('คุณต้องเป็นสมาชิกก่อน');
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
//--------------------------------------------------------------------------------------|start
//--------------------------------------------------------------------------------------|start

$sql = "SELECT * FROM student WHERE stuid = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);


$checksql = "SELECT * FROM selectevent WHERE stuid = '$id'";
$ck_query = mysqli_query($conn, $checksql);
$rw = mysqli_fetch_assoc($ck_query);
$gid = $rw['gid'];

$gsql = "SELECT * FROM grouptable WHERE gid = '$gid'";
$g_query = mysqli_query($conn, $gsql);
$r = mysqli_fetch_assoc($g_query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดผู้ใช้</title>
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="icon" type="image/x-icon" href="./css/image/wsklogo.png">
    <script src="./js/script.js"></script>
</head>

<body>
    <nav class="nav">
        <div class="nav2">

            <div class="opennav">
                <a style="cursor:pointer" onclick="openNav()">เมนู &#9776;</a>
            </div>
            <div class="nav2" id="nav_2">
                <a href="index.php">หน้าแรก</a>
                <a href="#" class="active">รายละเอียดผู้ใช้</a>
            </div>
        </div>
        <div class="nav3">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a>user: <strong class="user_name"><?php echo $_SESSION['username']; ?></strong></a>
                <a href="userinfo.php">• รายละเอียดผู้ใช้</a>
                <a href="index.php?logout='1'">• ออกจากระบบ</a>
            </div>
        </div>
    </nav>
    <div class="header">
        <h1>รายละเอียดผู้ใช้</h1>
    </div>
    <div class="content">
        <div class="content">
            <center>
                <table>
                    <tr>
                        <td class="lefttop" style="text-align: end;">ชื่อ</td>
                        <td class="data"><?php echo $row['stnametltle'] ?> <?php echo $row['stname'] ?></td>
                    </tr>
                    <tr>
                        <td background="#9082ff" style="text-align: end;">เลขประจำตัวนักเรียน</td>
                        <td class="data">
                            <p><?php echo $row['stuid'] ?></p>

                        </td>
                    </tr>
                    <tr>
                        <td background="#9082ff" style="text-align: end;">ระดับชั้น</td>
                        <td class="data">
                            <p>ม.<?php echo $row['stgrade'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td background="#9082ff" style="text-align: end;">เบอร์โทรศัพท์</td>
                        <td class="data">
                            <p><?php echo $row['sttel'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td background="#9082ff" style="text-align: end;">ชุมนุม</td>
                        <td class="data">
                                <a href="detail.php?id=<?php echo $r['gid'] ?> "><?php echo $r['gname'] ?></a>
                        </td>
                    </tr>

                </table>

                <a href="index.php">
                    <button class="btn">ย้อนกลับ</button>
                </a>
            </center>
        </div>
</body>

</html>