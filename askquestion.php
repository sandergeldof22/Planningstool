<script type="text/javascript">
function askQuestion(){
	$question = confirm("Are you Sure?");
	if ($question === true) {
		header("http://localhost/Werkfolder/Week5%20,6%20&%207/Opdracht/index.php");
	} else {
		return false;
	}
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



?>
</script>

