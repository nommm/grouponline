<?php
session_start();
include('./server/server.php');
//--------------------------------------------------------------------------------------|start
//----------------------------------|start|---------------------------------------------|start\/
function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

if (!isset($_SESSION['uid'])) {
  alert('คุณต้องเป็นสมาชิกก่อน');
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('location: login.php');
}
//--------------------------------------------------------------------------------------|start/\
//--------------------------------------------------------------------------------------|start
$id = $_GET['id'];
$sql = "SELECT * FROM grouptable,teacher WHERE grouptable.gid='$id' AND teacher.gid='$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
//--------------------------------------------------------------------------------------|CHECK?
//--------------------------------------------------------------------------------------|CHECK\/
$uid = $_SESSION['uid'];
$check = "SELECT * FROM selectevent WHERE stuid='$uid'";
$query = mysqli_query($conn, $check);
$result = mysqli_fetch_array($query);
//--------------------------------------------------------------------------------------|CHECK/\
//--------------------------------------------------------------------------------------|CHECK?
$amount = $row['gamount'];
$total = $row['gtotal'];
$stuid = $result['stuid'];


if ($row['gamount'] != $row['gtotal']) {
  $status = 'สามารถสมัครได้';
} else {
  $status = 'เต็มแล้ว';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/detail.css">
  <script src="./js/script.js"></script>
  <link rel="icon" type="image/x-icon" href="./css/image/wsklogo.png">
</head>

<body>
  <nav class="nav">
    <div class="nav2">

      <div class="opennav">
        <a style="cursor:pointer" onclick="openNav()">เมนู &#9776;</a>
      </div>
      <div class="nav2" id="nav_2">
        <a href="index.php">หน้าแรก</a>
        <a href="#" class="active">ชุมนุม</a>
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
    <h1>รายละเอียดของชุมนุม</h1>
  </div>
  <div class="content">
    <div class="content">
      <center>
        <table>
          <?php do { ?>
            <tr>
              <td class="lefttop">ชื่อชุมนุม</td>
              <td class="data"><?php echo $row['gname'] ?></td>
            </tr>
            <tr>
              <td background="#9082ff">ข้อมูลชุมนุม</td>
              <td class="data">
                <p>สถานที่ : <?php echo $row['gplace'] ?></p>
                <p>สถานะ : <?php echo $status ?>
                </p>
              </td>
            </tr>
            <tr>
              <td>จำนวนที่รับ</td>
              <td class="data"><?php echo $row['gamount'] ?> / <?php echo $row['gtotal'] ?></td>
            </tr>

            <td>ครูที่ปรึกษา</td>


            <td class="data"><?php do { ?><?php echo $row['tcname']; ?><br><?php } while ($row = mysqli_fetch_assoc($query)); ?></td>
          <?php } while ($row = mysqli_fetch_assoc($query)); ?>
        </table>
        <?php if($stuid == $uid){ ?>
            <button class="full" type="button">คุณมีชุมนุมอยู่แล้ว</button>
            <a href="index.php">
              <button class="btn">ย้อนกลับ</button>
            </a>
        <?php } elseif ($amount != $total) { ?>
          <a href="./server/select_action.php?id=<?php echo $id; ?>">
            <button class="btn" type="submit" name="select_action">เลือกชุมนุม</button>
          </a>
          <a href="index.php">
            <button class="btn">ยกเลิก</button>
          </a>
        <?php } else { ?>
          <button class="full" type="button">เต็มแล้ว</button>
          <a href="index.php">
            <button class="btn">ย้อนกลับ</button>
          </a>
        <?php } ?>
        
      </center>
    </div>
</body>

</html>
<?php
mysqli_free_result($query);
?>