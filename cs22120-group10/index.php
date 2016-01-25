<?php
session_start();
include('dbconfig.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_REQUEST['submited'])) {
	$_SESSION['name'] = $_POST['nmeField'];
}

?>
<html>
	<head>
		<meta name="viewport" content="width=120, initial-scale=1"/>
		<link rel="stylesheet" href="dist/css/CSS.css" type="text/css" />
		<script src="dist/js/jquery.js"></script>  
		<script src="dist/js/SpryTabbedPanels.js" type="text/javascript"></script>
		<script src="dist/js/functions.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="site-wrapper">
		<div class="contTitle">
			<div id="titleImage"></div>
		</div>	
		<div id="wrapper" class="contMain">
			<div id="TabbedPanels1" class="TabbedPanels">
				<ul id="panel" class="TabbedPanelsTabGroup">
					<li class="TabbedPanelsTab" tabindex="0"><h2>Log In</h2></li>
					<li class="TabbedPanelsTab" tabindex="0"><h2>Dashboard</h2></li>
					<li class="TabbedPanelsTab" tabindex="0"><h2>Member</h2></li>
					<li class="TabbedPanelsTab" tabindex="0"><h2>Task</h2></li>
					<li class="TabbedPanelsTab" tabindex="0"><h2>Task Status</h2></li>
				</ul>
				<div id="contLoad" class="TabbedPanelsContentGroup">
					<div id="add3" class="TabbedPanelsContent">
						<?php
							if(isset($_SESSION['name'])){
								echo "<p>You are logged in as: ".$_SESSION['name']."</p>";
							}else{
							echo "<div id='userIDCont'>";
								echo "<form class='form' method='POST'>";
									echo "<p>Username: </p>";
									echo "<select name='nmeField' id='test' class='nmeField'>";
									$sql = "SELECT * FROM team_member";
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)) {
										echo '<option>'.$row["name"].'</option>';
									}
									echo "</select><br>";
									echo "<button class='btn btn-default' name='submited'>Login</button>";
								echo "</form>";
							echo "</div>";
							}
						?>
					</div>
					<div class="TabbedPanelsContent">
						<?php
							if(isset($_SESSION['name'])){
								echo "<p>".$_SESSION['name']."</p>";
							}else{
								echo "<p> Please Login... </p>";
							}
						?>
					</div>
					<div id="one" class="TabbedPanelsContent">
						<h2> Team Members </h2>
						<?php
							if(isset($_SESSION['name'])){
								$sql = "SELECT * FROM team_member";
									$result = mysqli_query($conn, $sql);
									echo"<table class='team-mem-table'>";
									echo"<tr class='heading'>";
										echo"<td>ID</td>";
										echo"<td>Name</td>";
										echo"<td>Email</td>";
										echo"<td>Admin</td>";
									echo"</tr>";
									while($row = mysqli_fetch_assoc($result)) {
										echo '<tr onClick="nav()">';
											echo '<td class="ID">'.$row["ID"].'</td>';
											echo '<td class="name">'.$row["name"].'</td>';
											echo '<td class="email">'.$row["email"].'</td>';
											echo '<td class="admin">'.$row["admin"].'</td>';
										echo "</tr>";
									}
									echo"</table>";
							}else{
								echo "<p> Please Login... </p>";
							}
						?>
					</div>
					<div id="two" class="TabbedPanelsContent">
						<?php
							if(isset($_SESSION['name'])){
								echo "<p>".$_SESSION['name']."</p>";
							}else{
								echo "<p> Please Login... </p>";
							}
						?>
					</div>
					<div id="three" class="TabbedPanelsContent">
						<?php
							if(isset($_SESSION['name'])){
								echo "<p>".$_SESSION['name']."</p>";
							}else{
								echo "<p> Please Login... </p>";
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<script>
			function addIn(){
				funct1();
			}
			var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
		</script>
	</div>
	</body>
</html>