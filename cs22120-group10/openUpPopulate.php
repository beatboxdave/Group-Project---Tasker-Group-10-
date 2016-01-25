<?php
error_reporting(0);
$q = ($_GET['q']);
$ID = 0;
echo "<p>".$q."</p>";
$conn= odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=C:/xampp/htdocs/site/dist/DB/world","", "");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}
$sql = "SELECT Room FROM [".$q."]";
$result = odbc_exec($conn,$sql);
echo "<form method='POST'>";
$addRoom=array();
while($row = odbc_fetch_array($result)) {
	$test = $row['Room'];
	array_push($addRoom,"$test");
	$ID++;
	$a = 2;
	echo "<div id='slide1".$ID."' class = 'rooms'>";
	echo "<div id='click1".$ID."' class='clicker' onClick='animationSlide($ID, $a)'>";
    echo "<p>" . $row['Room'] . "</p>";
	echo "</div>";
	echo "<div id='roomContUp1".$ID."' class='hidden'>";
	echo "<p>Checked PC's?";
	echo "<input class='check' type='checkbox' name='vehicle'>Yes</p>";
	echo "<p>Paper Needed?";
	echo "<input class='check' id='paperReq".$ID."' type='radio' value='no' name='vehicle'>No";
	echo "<input class='check' id='paperReq".$ID."' type='radio' value='yes' name='vehicle'>Yes</p>";
	echo "<br>";
	
	echo "</div>";
	echo "</div>";

}
echo "<button class='btn btn-default' name='openSub'>Submit</button>";
echo "</form>";
odbc_close($conn);
?>
