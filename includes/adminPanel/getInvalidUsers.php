<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            color:white;

        }

        table, td, th {
            border: 1px solid white;
            padding: 5px;
        }

        th {text-align: left;}
    </style>
    <script>

    </script>

</head>

<body>
<?php
include_once(__DIR__."/../DBInformation/dbInf.php");
$examRequest=new mysqli(host,username,password,dbname);
$exam=new mysqli(host,username,password,dbname);
$user=new mysqli(host,username,password,dbname);
$requestResult=$examRequest->query("SELECT `id`,`username` FROM `examrequest` WHERE `accept`=0");
$examResult=$exam->query("SELECT * FROM `exam`");
if($requestResult->num_rows==0){}
else{
    $i=0;
    $users=array();
    while ($rows=$requestResult->fetch_assoc()) {
        $users[$rows["id"]] = $rows["username"];
        $i++;
    }

    foreach ($users as $key=>$value){
        $userResult=$user->query("SELECT * FROM `users` WHERE `username`='$value'");
        $row=$userResult->fetch_assoc();
        echo "<table>";
        echo "
        <tr>
        <th>username</th>
        <th>email</th>
        <th>phone</th>
        <th>first name</th>
        <th>last name</th>
        <th>exam id</th>
        <th>accept</th>
        <th>decline</th>
        </tr>
        ";
        echo "<tr>";
        echo "<td>".$row["username"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "<td>".$row["firstname"]."</td>";
        echo "<td>".$row["lastname"]."</td>";
        echo "<td>".$key."</td>";
        echo "<td><button id=$key onclick='accept($key) '>accept</button></td>";
        echo "<td><button id=$key onclick='decline($key) '>decline</button></td>";
        echo "</tr>";
        echo "</table>";
    }
}
$exam->close();
$examRequest->close();
$user->close();
?>

</body>
</html>

