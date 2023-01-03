<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link rel="icon" type="image/x-icon" href="./css/image/wsklogo.png">
    <link rel="stylesheet" href="./css/regis.css">
</head>

<body>
    <div class="header">
        <h1 class="hrad1">สมัครสมาชิก</h1>
    </div>
    <div class="content">
        <form action="./server/register_db.php" method="post">
            <div class="input-group">
                <input type="text" name="uid" placeholder="เลขประจำตัวนักเรียน" required pattern="[0-9]{5}" title="กรุณากรอกเลขประจำตัวนักเรียนให้ถูกต้อง">
            </div>
            <div class="input-group">
                <input type="text" name="name" placeholder="ชื่อ - นามสกุล">
            </div>
            <div class="input-group">

                <select name="grade" required title="กรุณาเลือกระดับชั้นปี">
                    <option value="">ระดับชั้น</option>
                    <optgroup label="มัธยมศึกษาปีที่1">
                        <option value="1/1">1/1</option>
                        <option value="1/2">1/2</option>
                        <option value="1/3">1/3</option>
                        <option value="1/4">1/4</option>
                        <option value="1/5">1/5</option>
                        <option value="1/6">1/6</option>
                        <option value="1/7">1/7</option>
                        <option value="1/8">1/8</option>
                        <option value="1/9">1/9</option>
                        <option value="1/10">1/10</option>
                    <optgroup label="มัธยมศึกษาปีที่2">
                        <option value="2/1">2/1</option>
                        <option value="2/2">2/2</option>
                        <option value="2/3">2/3</option>
                        <option value="2/4">2/4</option>
                        <option value="2/5">2/5</option>
                        <option value="2/6">2/6</option>
                        <option value="2/7">2/7</option>
                        <option value="2/8">2/8</option>
                        <option value="2/9">2/9</option>
                        <option value="2/10">2/10</option>
                    <optgroup label="มัธยมศึกษาปีที่3">
                        <option value="3/1">3/1</option>
                        <option value="3/2">3/2</option>
                        <option value="3/3">3/3</option>
                        <option value="3/4">3/4</option>
                        <option value="3/5">3/5</option>
                        <option value="3/6">3/6</option>
                        <option value="3/7">3/7</option>
                        <option value="3/8">3/8</option>
                        <option value="3/9">3/9</option>
                        <option value="3/10">3/10</option>
                    <optgroup label="มัธยมศึกษาปีที่4">
                        <option value="4/1">4/1</option>
                        <option value="4/2">4/2</option>
                        <option value="4/3">4/3</option>
                        <option value="4/4">4/4</option>
                        <option value="4/5">4/5</option>
                        <option value="4/6">4/6</option>
                        <option value="4/7">4/7</option>
                        <option value="4/8">4/8</option>
                        <option value="4/9">4/9</option>
                        <option value="4/10">4/10</option>
                    <optgroup label="มัธยมศึกษาปีที่5">
                        <option value="5/1">5/1</option>
                        <option value="5/2">5/2</option>
                        <option value="5/3">5/3</option>
                        <option value="5/4">5/4</option>
                        <option value="5/5">5/5</option>
                        <option value="5/6">5/6</option>
                        <option value="5/7">5/7</option>
                        <option value="5/8">5/8</option>
                        <option value="5/9">5/9</option>
                        <option value="5/10">5/10</option>
                    <optgroup label="มัธยมศึกษาปีที่6">
                        <option value="6/1">6/1</option>
                        <option value="6/2">6/2</option>
                        <option value="6/3">6/3</option>
                        <option value="6/4">6/4</option>
                        <option value="6/5">6/5</option>
                        <option value="6/6">6/6</option>
                        <option value="6/7">6/7</option>
                        <option value="6/8">6/8</option>
                        <option value="6/9">6/9</option>
                        <option value="6/10">6/10</option>
                </select>
            </div>
            <div class="input-group">
                <input type="tel" name="telephone" placeholder="เบอร์โทรศัพท์" required pattern="[0-9]{10}" title="กรุณาเบอร์โทรศัพท์ให้ครบ 10 ตัว">
            </div>
            <div class="input-group">
                <input type="password" name="password_1" placeholder="รหัสผ่าน" pattern=".{8,}">
            </div>
            <div class="input-group">
                <input type="password" name="password_2" placeholder="ยืนยันรหัสผ่าน">
            </div>
            <div class="input-group">
                <button type="submit" name="reg_user" class="btn">สมัครสมาชิก</button>
                <button type="reset" name="cancle" class="btn">รีเซ็ต</button>
            </div>
            <p>เป็นสมาชิกแล้วหรือไม่? <a href="login.php">เข้าสู่ระบบ</a></p>
        </form>

    </div>
</body>

</html>