<?php




if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if(empty($username)){
        array_push($errors,'მომხმარებლის ველი ცარიელია');
    }

    if(empty($password)){
        array_push($errors,'პაროლის ველი ცარიელია');
    }

    if(count($errors) == 0 ){
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)){
            $_SESSION['username'] = $username;
            header('location:admin.php');
        }else{
            array_push($errors,'მომხმარებლის სახელი ან პაროლი არასწორია');
        }
    }


}

date_default_timezone_set('Asia/tbilisi');
$t = date('h:i:s');
$d = date('Y-m-d');
$m=date('D');
$msg='';
$smile = '';
$x = rand(1,2);
$y = rand(1,4);
$ms='';

if(isset($_POST['pasuxi'])){
    echo "<style>.content button{display: none;}</style>";
    if($x == 1){
        echo "<style>h1{display: none;}</style>";
        $msg= 'დღეს დარჩი სახლში';
        $smile = '<img src="img/smile.png" style="width: 150px; margin-top: 20px;">';
    }

    elseif($x == 2){
        echo "<style>h1{display: none;}</style>";
        $msg= 'დღეს გაისეირნე პარკში';
        $smile = '<img src="img/smile.png" style="width: 150px; margin-top: 20px;">';
    }
    $sql="INSERT INTO dge (msg,saati,dge) VALUES ('$msg','$t','$d')";
    mysqli_query($con,$sql);

    if($y == 1){
        echo "<iframe src='mus/1.mp3' allow='autoplay' style='display: none;'></iframe>";
    }

    if($y == 2){
        echo "<iframe src='mus/2.mp3' allow='autoplay' style='display: none;'></iframe>";
    }

    if($y == 3){
        echo "<iframe src='mus/3.mp3' allow='autoplay' style='display: none;'></iframe>";
    }

    if($y == 4){
        echo "<iframe src='mus/4.mp3' allow='autoplay' style='display: none;'></iframe>";
    }

    if($m == 'Mon'){
        $ms = '( ორშაბათი )';
    }

    elseif($m == 'Tue'){
        $ms = ' სამშაბათი )';
    }

    elseif($m == 'Wed'){
        $ms = '( ოთხშაბათი )';
    }

    elseif($m == 'Thu'){
        $ms = '( ხუთშაბათი )';
    }

    elseif($m == 'Fri'){
        $ms =  '( პარასკევი )';
    }

    elseif($m == 'Sat'){
        $ms =  '( შაბათი )';
    }

    elseif($m == 'Sun'){
        $ms = '( კვირა )';
    }

}


?>