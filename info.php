<!DOCTYPE html>
<html>
<head>
	<title>Planningstool</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/info4.css">
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

    $sql1 = "SELECT id, name, image, description, expansions, skills, url, youtube, min_players, max_players, play_minutes, explain_minutes FROM games where id=".$_GET["id"];
	$result = $conn->query($sql1);
	$row = $result->fetch();

	$sql2 = "SELECT Begintime, Instructor, Players FROM Planning WHERE Planning.Gamename = :name";
	$res = $conn->prepare($sql2);
	$res->bindParam(":name", $row['name']);
	$resultaat = $res->execute();
	$rij = $res->fetch();


		$time = $rij["Begintime"];

?>
<div class="grid-container">
  <div class="grid-item1">
  	<h1><?php echo $row['name'] ?></h1>
  </div>
  <div class="grid-item2">
  	<img src="afbeeldingen/<?php echo $row['image'] ?>">
  </div>
  <div class="grid-item3">
  	<p class="dik">Skills:</p><br>
  	<?php echo $row['skills'] ?>
  </div>  
  <div class="grid-item4">
  	<?php echo $row['youtube'] ?>
  </div>
  <div class="grid-item5">
  	<p class="dik">Description:</p>
  	<?php echo $row['description'] ?>
  </div>
  <div class="grid-item6">
  	<p class="dik">Link naar de website van het spel:</p>
  	<a class="link" href="<?php echo $row['url'] ?>"><?php echo $row['url'] ?></a>
  </div>
  <div class="grid-item7">
  	<p class="dik">Begintijd:</p>&nbsp;<?php echo substr($time, 0 , -8) ?>
  	<br>
  	<p class="dik">Uitlegpersoon:</p>&nbsp;<?php echo $rij["Instructor"] ?>
  </div>  
  <div class="grid-item8">
  	<p class="dik">Spelers:</p>&nbsp;<?php echo $rij["Players"] ?>
  </div>
  <div class="grid-item9">
    <p class="dik">Minimum Players:</p>&nbsp;<?php echo $row['min_players'] ?>
  	<p class="dik">Maximum Players:</p>&nbsp;<?php echo $row['max_players'] ?>
  	<p class="dik">Play Minutes:</p>&nbsp;<?php echo $row['play_minutes'] ?>
  	<p class="dik">Explain Minutes:</p>&nbsp;<?php echo $row['explain_minutes'] ?></div>
</div>

</body>
</html>