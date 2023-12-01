<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>new</title>
</head>

<body>
    <h1 align="center">new</h1>
    <p align="center">Time can only be on the hour and half hour,like 9.00 and 19.30</p>
    <form action="" method="post" name="inf">
        <p align="center">Name:<input type="text" name="sn" /></p>
        <p align="center">Data:<input type="text" name="ss" /></p>
        <p align="center">Time:<input type="text" name="sa" /></p>
        <p align="center"><input type="submit" name="insub" value="submit" /></p>
    </form>
    <?php
    $link = mysqli_connect('localhost', 'root', '123456', 'hospital');
    if (!$link){
        exit('worry!');
    }
    if (!empty($_POST["insub"])){
        $sn = $_POST['sn'];
        $ss = $_POST['ss'];
        $sa = $_POST['sa'];
        mysqli_query($link,"insert people (stuname, data, time) values ('$sn', '$ss', '$sa')");
        header('location:hospital.php');
    }  
    ?>
</body>
</html>