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
while($row = odbc_fetch_array($result)) {
	$ID = $ID + 1;
	$a = 3;
	echo "<div id='slide2".$ID."' class = 'rooms'>";
	echo "<div id='click2".$ID."' class='clicker' onClick='animationSlide($ID, $a)'>";
    echo "<p>" . $row['Room'] . "</p>";
	echo "</div>";
	echo "<div id='roomContUp2".$ID."' class='hidden'>";
	echo "<form>";
	
	echo "<p>Checked PC's?";
	echo "<input class='check' type='checkbox' name='vehicle'>Yes</p>";
	echo "<p>Paper Needed?";
	echo "<input class='check' type='checkbox' name='vehicle'>Yes</p>";
	echo "<br>";
	
	echo "</form>";
	echo "</div>";
	echo "</div>";

}
echo " <button type='button' class='btn btn-default'>Submit</button>";
odbc_close($conn);
?>