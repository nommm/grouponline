<? 
session_start();

include('server.php');

$error = array();
$id = $_GET['id'];
$uid = $_SESSION['uid'];

if (!isset($_SESSION['uid'])) {
    alert('คุณต้องเป็นสมาชิกก่อน');
    header("location: detail.php?id='$id'");
}
if (isset($_GET['id'])) {

    $check = "SELECT * FROM selectevent WHERE stuid='$uid'";
    $query = mysqli_query($conn, $check);
    $result = mysqli_fetch_array($query);
    if($result['stuid'] != $uid){
    
        if(count($error) == 0){
            $sql = "UPDATE grouptable SET gamount = gamount+1 WHERE gid={$id}";
            $select = "INSERT INTO selectevent (stuid,gid) VALUES ('$uid','$id')";
            mysqli_query($conn, $sql);
            mysqli_query($conn, $select);

            echo $_SESSION['uid'];
            echo $_GET['id'];
            print_r($error);
            
        } else {
            array_push($error, "have something wrong, please check your code error over 0");
            print_r($error);
        }

    } else {
        array_push($error, "STUDENT ID HAS ALREADY EXITS");
        print_r($error);
        header('laction: index.php');
    }
} else {
    array_push($error, "have something wrong,please check your code");
    print_r($error);
}
