<!DOCTYPE html>
<html>
<head>
	<title>Planningstool</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/speloverzicht4.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
include ('navbar.php');
?>

<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname	= "Planningstool";

try {
    $conn = new PDO("mysql:host=$servername;dbname=Planningstool", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    $sql1 = "SELECT id, name, play_minutes FROM games";
    $result = $conn->query($sql1);
    $row = $result->fetch();

	$sql2 = "SELECT Id, Begintime, Instructor, Players, Gamename, (SELECT play_minutes FROM games WHERE Planning.Gamename = games.name) as play_minutes FROM Planning ORDER BY Begintime";
	$resultaat = $conn->query($sql2);
	$rijen = $resultaat->fetchAll();

	foreach ($rijen as $rij){
	
	$time = $rij["Begintime"];
?>
	<div>
	<table>
		<tr>
			<th class="Game">Game</th>
			<th class="Starttime">Starttime</th>
			<th class="Instructor">Instructor</th>
			<th class="duration">Duration</th>
			<th class="name">Names</th>
		</tr>
		<tr>
			<td class="Game"><?php echo $rij["Gamename"]?></td>
			<td class="Starttime"><?php echo substr($time, 0 , -8)?></td>
			<td class="Instructor"><?php echo $rij["Instructor"]?></td>
			<td class="duration"><?php echo $rij["play_minutes"]?></td>
			<td class="name"><?php echo $rij["Players"]?></td>
		</tr>
	</table>
	</div>
<?php
	}
?>

</body>
</html>





