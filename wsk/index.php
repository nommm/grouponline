<?php
session_start();
include('./server/server.php');
if (!isset($_SESSION['uid'])) {
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

isset($_GET['search']) ? $search = $_GET['search'] : $search = "";
if (!empty($search)) {
    $sql = "SELECT * FROM grouptable WHERE gname LIKE '%" . $search . "%' LIMIT 0,6";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    $query_group = "SELECT * FROM grouptable WHERE gid LIMIT 0,6";
    $result = mysqli_query($conn, $query_group);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบเลือกชุมนุมออนไลน์</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a class="active" href="<?= $_SERVER['PHP_SELF']; ?>">หน้าแรก</a>
                <a href="group.php">ชุมนุม</a>
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
        <h1>ระบบเลือกชุมนุมออนไลน์</h1>
    </div>
    <div class="content">

        <center>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" class="search">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit" class="search_btn"><i class="fa fa-search"></i></button>
            </form>
            <div class="tablee" style="overflow-y:auto;">
                <table>
                    <tr>

                        <div class="toptable">
                            <th class="lefttable">ชื่อชุมนุม</th>
                            <th>จำนวนที่รับ</th>
                            <th>สถานที่</th>
                            <th>สถานะ</th>
                            <th class="righttable"></th>
                        </div>
                    </tr>
                    <?php do { ?>

                        <tr>
                            <td><?php echo $row['gname']; ?></td>
                            <td><?php echo $row['gamount']; ?>/<?php echo $row['gtotal']; ?></td>
                            <td><?php echo $row['gplace']; ?></td>
                            <td><?php if ($row['gamount'] != $row['gtotal']) { ?>
                                    <p>สามารถสมัครได้</p>
                                <?php } else { ?>
                                    <p>เต็มแล้ว</p>
                                <?php } ?>
                            </td>
                            <td><a href="detail.php?id=<?php echo $row['gid']; ?>">
                                    <button class="btn" type="button"><strong>ดูเพิ่มเติม</strong></button></td>
                        </tr>
                    <?php } while ($row = mysqli_fetch_assoc($result)); ?>
                    <tr>
                        <td class="leftbtable">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>

                        <td class="rightbtable">&nbsp;</td>
                    </tr>
                </table>

        </center>
    </div>
    </div>
</body>

<footer class="footer" style="text-align: center; font-size: 10px;margin:1%;">
    <p>เลขที่ 442/30 ต.ตลาดกระทุ่มแบน อ.กระทุ่มแบน จ.สมุทรสาคร 741 10 โทรศัพท์ 034471902 โทรสวาร 034471901</p>
    <p>Krathumbaen Wisetsamutthakhun School Address: 442/30 Taladkrathumbaen, Krathumbaen, Samutsakhon 74110 Tel 034471902 Fax.034471901</p>
</footer>

</html>
<?php
mysqli_free_result($result);
?>