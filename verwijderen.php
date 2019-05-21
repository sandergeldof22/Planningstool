<!DOCTYPE html>
<html>
<head>
	<title>Verwijderen</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/verwijderen2.css">
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
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM games";
	$result = $conn->query($sql1);
	$row = $result->fetch(PDO::FETCH_ASSOC);


?>

<div class="grid-container">
  <div class="grid-item1">
  	<h1 class="verwijderen">Verwijderen</h1>
  </div>
  <div class="grid-item2">
  	<img src="afbeeldingen/<?php echo $row['image'] ?>">
  </div>
  <div class="grid-item3">
  	<p class="dik">Naam:</p><br>
  	<?php echo $row['name'] ?>
  </div>  
  <div class="grid-item4">
  	 <a onclick="validate()"; href="begone.php?delete=<?php echo $row['id']; ?>">Delete</a>
  </div>
</div>

<script type="text/javascript">
  function validate(){
    return confirm('Weet u zeker dat u het wilt verwijderen?');
  }
</script>

</body>
</html>