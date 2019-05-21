<!DOCTYPE html>
<html>
<head>
	<title>Planningstool</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index4.css">
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

    $sql1 = "SELECT id, name, image, description, expansions, skills, url, youtube, min_players, max_players, play_minutes, explain_minutes FROM games";
	$result = $conn->query($sql1);

	foreach ($result as $row){

?>
	<table>
		<tr>
			<th class="id">id</th>
			<th class="name">name</th>
			<th class="image">image</th>
			<th class="description">description</th>
			<th class="expansions">expansions</th>
			<th class="skills">skills</th>
			<th class="url">URL</th>
			<th class="youtube">youtube</th>
			<th class="minplayer">min_players</th>
			<th class="maxplayer">max_players</th>
			<th class="playminutes">play_minutes</th> 
			<th class="explain">explain_minutes</th>
			<th class="changes">Changes</th>
		</tr>
		<tr>
			<td class="id"><?php echo $row['id'] ?></td>
			<td class="name"><a href="info.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
			<td class="image"><img src="afbeeldingen/<?php echo $row['image'] ?>"></td>
			<td class="description"><?php echo $row['description'] ?></td>
			<td class="expansions"><?php echo $row['expansions'] ?></td>
			<td class="skills"><?php echo $row['skills'] ?></td>
			<td class="url"><a href="<?php echo $row['url'] ?>">Website Spel</a></td>
			<td class="youtube"><?php echo $row['youtube'] ?></td>
			<td class="minplayer"><?php echo $row['min_players'] ?></td>
			<td class="maxplayer"><?php echo $row['max_players'] ?></td>
			<td class="playminutes"><?php echo $row['play_minutes'] ?></td>
			<td class="explain"><?php echo $row['explain_minutes'] ?></td>
			<td class="changes">
				<button onclick="window.location.href = 'verander.php?id=<?php echo $row['id'] ?>';">Pas aan</button>
				<br>
				<p>of</p>
				<br>
				<button onclick="window.location.href = 'verwijderen.php?id=<?php echo $row['id'] ?>';">Verwijderen</button>
			</td>
		</tr>
	</table>
	<br>


<?php
	}
?>

</body>
</html>