<!DOCTYPE html>
<html>
<head>
	<title>Verander</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/verander.css">
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

	if(isset($_POST['submit']))
	{

	$name = $row['name'];
	$image = $row['image'];
	$description = $row['description'];
	$expansions = $row['expansions'];
	$skills = $row['skills'];
	$url = $row['url'];
	$youtube = $row['youtube'];
	$min_players = $row['min_players'];
	$max_players = $row['max_players'];
	$play_minutes = $row['play_minutes'];
	$explain_minutes = $row['explain_minutes'];
	}



?>
	<div>
		<h1 class="spelgegevens">Spelgegevens aanpassen</h1>
		<br>
		<form method="POST" action="<?php $_PHP_SELF ?>">
			<div class="form-group">
				Naam:
				<input type="text" name="name" value='<?=$name?>' placeholder="<?php echo $row['name'] ?>">
			</div>
			<div class="form-group">
				Image:
				<input type="file" name="image" value='<?=$image?>'>
			</div>
			<div class="form-group">
				Description:
				<br>
				<textarea name="description" rows="5" cols="80" value='<?=$description?>' placeholder="<?php echo $row['description'] ?>"></textarea>
				<p class="warning">Let op! voer < p > op het begin in en < /p > in bij het eind</p>
			</div>
			<div class="form-group">
				Expansions:
				<input type="text" name="expansions" placeholder="<?php echo $row['expansions']?>" value='<?=$expansions?>'>
			</div>
			<div class="form-group">
				Skills:
				<br>
				<textarea name="skills" rows="5" cols="50" value='<?=$skills?>' placeholder="<?php echo $row['skills'] ?>"></textarea>
			</div>
			<div class="form-group">
				URL:
				<input type="text" name="url" value='<?=$url?>' placeholder="<?php echo $row['url'] ?>">
			</div>
			<div class="form-group">
				Youtube:
				<input type="text" name="youtube" value='<?=$youtube?>'  placeholder="Youtube Link">
			</div>
			<div class="form-group">
				Minimun Players:
				<input type="number" name="min_players" value='<?=$min_players?>' placeholder="<?php echo $row['min_players'] ?>">
			</div>
			<div class="form-group">
				Maximum Players:
				<input type="number" name="max_players" value='<?=$max_players?>' placeholder="<?php echo $row['max_players'] ?>">
			</div>
			<div class="form-group">
				Playable Minutes:
				<input type="number" name="play_minutes" value='<?=$play_minutes?>' placeholder="<?php echo $row['play_minutes'] ?>">
			</div>
			<div class="form-group">
				Explanation minutes:
				<input type="number" name="explain_minutes" value='<?=$explain_minutes?>' placeholder="<?php echo $row['explain_minutes'] ?>">
			</div>
			<input type="Submit" name="update" value="update" id="Update">
			<input type="reset">

		</form>

<?php


if(isset($_POST['update'])){

	try {
    $conn = new PDO("mysql:host=$servername;dbname=Planningstool", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

	$name = $_POST['name'];
	$image = $_POST['image'];
	$description = $_POST['description'];
	$expansions = $_POST['expansions'];
	$skills = $_POST['skills'];
	$url = $_POST['url'];
	$youtube = $_POST['youtube'];
	$min_players = $_POST['min_players'];
	$max_players = $_POST['max_players'];
	$play_minutes = $_POST['play_minutes'];
	$explain_minutes = $_POST['explain_minutes'];


	$sqlupdate = "UPDATE games SET name='$name', image='$image', description='$description', expansions='$expansions', skills='$skills', url='$url', youtube='$youtube', min_players='$min_players', max_players='$max_players', play_minutes='$play_minutes', explain_minutes='$explain_minutes' WHERE id=".$_GET["id"];


try { 
$statement = $conn->prepare($sqlupdate);
$statement->execute();

}
 catch(PDOException $e) {
  echo $e->getMessage();
 }
}

?>
	</div>

</body>
</html>



































