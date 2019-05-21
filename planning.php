<!DOCTYPE html>
<html>
<head>
	<title>Planningstool</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/planning4.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
include ('navbar.php');
?>

<?php
$GamenameErr = $StarttimeErr = $InstructorErr = $PlayersErr = "";
$Gamename = $Starttime = $Instructor = $Players = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["Gamename"])) {
    	$GamenameErr = "Keuze is vereist!";
  	} else {
    	$Gamename = test_input($_POST["Gamename"]);
  	}

	if (empty($_POST["Starttime"])) {
    	$StarttimeErr = "Een starttijd is vereist!";
 	} else {
   		$Starttime = test_input($_POST["Starttime"]);
 	}

	if (empty($_POST["Instructor"])) {
    	$InstructorErr = "Een Uitlegpersoon is vereist!";
  	} else {
    	$Instructor = test_input($_POST["Instructor"]);
  	}

  	if (empty($_POST["Players"])) {
    	$PlayersErr = "";
  	} else {
    	$Players = test_input($_POST["Players"]);
  	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname	= "Planningstool";

    $Begintime = $_POST["Begintime"];
    $Instructor = $_POST["Instructor"];
    $Players = $_POST["Players"];
    $Gamename = $_POST["Gamename"];
    $conn = new PDO("mysql:host=$servername;dbname=Planningstool", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	try {
	    
	   	$stmt =  $conn->prepare("INSERT INTO Planning (Begintime, Instructor, Players, Gamename) VALUES (:Begintime,:Instructor,:Players,:Gamename)");

	    $stmt->bindParam(':Begintime', $Begintime);
	    $stmt->bindParam(':Instructor', $Instructor);
	    $stmt->bindParam(':Players', $Players);
	    $stmt->bindParam(':Gamename', $Gamename);
	    $stmt=$pdo->prepare($stmt);
	    $stmt->execute($stmt);
	    header('Location: http://localhost/Werkfolder/Week5%20,6%20&%207/Opdracht/speloverzicht.php');
	    }
	catch(PDOException $e)
	    {
	    echo "Connection failed: " . $e->getMessage();
	    }
	}

    $sql1 = "SELECT id, name FROM games";
	$result = $conn->query($sql1);
	$rows = $result->fetchAll();

    $dbresult = $conn->prepare($sql2);

    // exec($sql2);

    // $execute = $dbresult->execute(array(":Begintime"=>$Begintime,":Instructor"=>$Instructor,":Players"=>$Players,":Gamename"=>$Gamename));

?>
<div>
	<h1 class="planningstitel">Planning</h1>
	<br>
	<p class="errortext">De vakken met * zijn verplicht</p>
	<form method="POST" action="planning.php">
		<div class="form-group1">
			Keuze spel:
			<select name="Gamename" class="form-control" value="<?php $Gamename ?>">
				<?php
					foreach($rows as $row){
				?>
				<option><?php echo $row["name"]?></option>
				<?php
				}
				?>
			</select>
			<span class="error">* <?php echo $GamenameErr;?></span>
		</div>
		<div class="form-group2">
			Starttijd:
			<input type="time" class="form-control" name="Begintime" value="<?php $Begintime ?>">
			<span class="error">* <?php echo $StarttimeErr;?></span>
		</div>
		<div class="form-group3">
			Uitlegpersoon:
			<input type="text" class="form-control" name="Instructor" value="<?php $Instructor ?>">
			<span class="error">* <?php echo $InstructorErr;?></span>
		</div>
		<div class="form-group4">
			Spelers:<br>
			<input type="text" class="form-control-speler" name="Players" value="<?php $Players ?>">
		</div>
		<input type="submit" name="Submit">
		<input type="reset">
	</form>




</div>
</body>
</html>