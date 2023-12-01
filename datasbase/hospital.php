<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appointment inquiry</title>
</head>

<body>
     <h1 align="center">Appointment inquiry</h1>
     <form action="" method="post" name="indexf">
        <p align="center"><input type="button" value="new" name="inbut" onClick="location.href='insert.php'" /></p>
        <p align="center"><input type="text" name="sel" /><input type="submit" value="search" name="selsub" /></p>
        <table align="center" border="1px" cellspacing="0px" width="800px">
            <tr><th>Number</th><th>Name</th><th>Data</th><th>Time</th><th>operate</th></tr>
<?php
    $link = mysqli_connect('localhost', 'root', '123456', 'hospital');
    if(!$link){
        exit('worry!');
    }
    if (empty($_POST["selsub"])){
        $res = mysqli_query($link, "select * from people order by stuid");
    }else{
        $sel = $_POST["sel"];
        $res = mysqli_query($link, "select * from people where stuid like '%$sel%' or stuname like '%$sel%' or data like '%$sel%' or time like '%$sel%'");
    }
    while ($row = mysqli_fetch_array($res)){
        echo '<tr align="center">';
        echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
              <td>
              <input type='submit' name='delsub$row[0]' value='delete' />
              </td>";
        echo '</tr>';
        if (!empty($_POST["delsub$row[0]"])){
        mysqli_query($link,"delete from people where stuid=$row[0] ");
        header('location:#');
        }    
    }

?>
        </table>
    </form>
</body>
</html>