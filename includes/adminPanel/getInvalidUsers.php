<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
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

$mysql=new mysqli(host,username,password,dbname);
$result=$mysql->query("SELECT `username`,`email`,`phone`,`firstname`,`lastname` FROM `users` WHERE `accept`=0");
echo "<table>
<tr>
<th>username</th>
<th>email</th>
<th>phone</th>
<th>firstname</th>
<th>lastname</th>
<th>accept</th>
<th>decline</th>
</tr>
";
if($result!==false){
    while ($rows=$result->fetch_assoc()){
        $username=$rows["username"];
        echo "<tr>";
        echo "<td>" . $rows["username"]."</td>";
        echo "<td>" . $rows["email"]."</td>";
        echo "<td>" . $rows["phone"]."</td>";
        echo "<td>" . $rows["firstname"]."</td>";
        echo "<td>" . $rows["lastname"]."</td>";
        echo "<td>"."<button id=$username onclick='accept(this.id)'>accept</button>"."</td>";
        echo "<td>"."<button id=$username onclick='decline(this.id)'>decline</button>"."</td>";
        echo "</tr>";
    }
}
echo "</table>";

$mysql->close();
?>

</body>
</html>

