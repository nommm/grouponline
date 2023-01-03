<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="icon" type="image/x-icon" href="./css/image/wsklogo.png">
    <link rel="stylesheet" href="./css/regis.css">
</head>

<body class="body2">
    
        <div class="header2">
            <h1 class="hrad1">เข้าสู่ระบบ</h1>
        </div>
        <div class="content">
            <form action="./server/login_db.php" method="post">
                <div class="input-group">
                    <input type="text" name="uid" placeholder="รหัสประจำตัวนักเรียน">
                </div>
                <div class="input-group">
                    <input type="password" name="password_1" placeholder="รหัสผ่าน">
                </div>
                <div class="input-group">
                    <button type="submit" name="login_user" class="btn">เข้าสู่ระบบ</button>
                </div>
                <p>เป็นสมาชิกแล้วหรือไม่? <a href="register.php">สมัครสมาชิก</a></p>
            </form>
        </div>

</body>

</html>