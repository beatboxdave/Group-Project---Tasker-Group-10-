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

if(isset($_REQUEST['addMember'])) {
	$memberName = $_POST['memberName'];
	$admin = $_POST['admin'];
	$string = str_replace(' ', '', $memberName);
	$email = $string . "@group10.com";
	$sql = "INSERT INTO team_member (name, email, admin)
		VALUES ('$memberName', '$email', '$admin')";
	if ($conn->query($sql) === TRUE) {
		?>
		<script>
			alert("New record added!");
		</script>
		<?php
		header("location:index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_REQUEST['editEmp'])) {
	$currName = $_POST['currName'];
	$id = $_POST['id'];
	$memberName = $_POST['nameEdit'];
	$admin = $_POST['adminEdit'];
	if(empty( $memberName ) == true ){
		$string = str_replace(' ', '', $currName);
		$email = $string . "@group10.com";
		$sql = "UPDATE team_member SET name='$currName', email='$email', admin='$admin' WHERE ID=$id";
	}else{
		$string = str_replace(' ', '', $memberName);
		$email = $string . "@group10.com";
		$sql = "UPDATE team_member SET name='$memberName', email='$email', admin='$admin' WHERE ID=$id";
	}
	if ($conn->query($sql) === TRUE) {
		?>
		<script>
			alert("Record updated!");
		</script>
		<?php
		header("location:index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_REQUEST['editTask'])){
	$empName = $_POST['memberName'];
	$status = $_POST['taskStatus'];
	$endDate = $_POST['endDate'];
	$elements = $_POST['taskElements'];
	$id = $_POST['id'];
	
	$sql = "UPDATE task_data SET teamMember='$empName', expEndDate='$endDate', taskElements='$elements', status='$status' WHERE ID=$id";
	if ($conn->query($sql) === TRUE) {
		?>
		<script>
			alert("Record updated!");
		</script>
		<?php
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_REQUEST['deleteEmp'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM team_member WHERE ID=$id";
	if ($conn->query($sql) === TRUE) {
		?>
		<script>
			alert("Record deleted!");
		</script>
		<?php
		header("location:index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_REQUEST['deleteTask'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM task_data WHERE ID=$id";
	if ($conn->query($sql) === TRUE) {
		?>
		<script>
			alert("Record deleted!");
		</script>
		<?php
		header("location:index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if(isset($_REQUEST['addTask'])) {
$title = $_POST['taskName'];
$member	= $_POST['memberName'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$status = $_POST['status'];
$taskElements = $_POST['description'];
	
$sql = "INSERT INTO task_data (title, teamMember, status, startDate, expEndDate, taskElements)
		VALUES ('$title', '$member', '$status', '$startDate', '$endDate', '$taskElements')";
	
	if ($conn->query($sql) === TRUE) {
		?>
		<script>
			alert("Added Task!");
		</script>
		<?php
		header("location:index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
?>
<html>
	<head>
		<meta name="viewport" content="width=120, initial-scale=1"/>
		<link rel="stylesheet" href="dist/css/CSS.css" type="text/css" />
		<script src="dist/js/jquery.js"></script>  
		<script src="dist/js/SpryTabbedPanels.js" type="text/javascript"></script>
		<script src="dist/js/functions.js" type="text/javascript"></script>
		<script src="dist/js/validation.js" type="text/javascript"></script>
	</head>
	<body>
	<div class="site-wrapper">
		<div class="contTitle">
			<div id="titleImage"></div>
		</div>	
		<div id="wrapper" class="contMain">
			<div id="TabbedPanels1" class="TabbedPanels">
				<ul id="panel" class="TabbedPanelsTabGroup">
					<li class="TabbedPanelsTab" tabindex="0"><h2>Home</h2></li>
					<li class="TabbedPanelsTab" tabindex="0"><h2>Member</h2></li>
					<li class="TabbedPanelsTab" tabindex="0"><h2>Add Task</h2></li>
					<li class="TabbedPanelsTab" tabindex="0"><h2>Edit Task</h2></li>
				</ul>
				<div id="contLoad" class="TabbedPanelsContentGroup">
					<!-- HOME PAGE -->
					<div id="add3" class="TabbedPanelsContent">
						<?php
							if(isset($_SESSION['name'])){
								echo "<p>You are logged in as: ".$_SESSION['name']."</p>";
								?>
								<form action="logout.php" method="post">
									<button class='btn btn-default' name='logOut'>Log Out</button>
								</form>
								<?php
							}else{
							echo "<div id='userIDCont'>";
								echo "<form class='form' action='index.php' method='POST'>";
									echo "<p>Username: </p>";
									echo "<select name='nmeField' id='test' class='nmeField'>";
									$sql = "SELECT * FROM team_member";
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)) {
										echo '<option>'.$row["email"].'</option>';
									}
									mysqli_close($con);
									echo "</select><br/><br/>";
									echo "<button class='btn btn-default' name='submited'>Login</button>";
								echo "</form>";
							echo "</div>";
							}
						?>
					</div>
					<!-- TEAM MEMBERS -->
					<div id="one" class="TabbedPanelsContent">
						<?php
							if(isset($_SESSION['name'])){
								?>
								<h2> Team Members </h2>
								<form method="post" onSubmit='return validateMembers()' name="addMember">
									<label>Name: </label><input style="width:20%;" placeholder="Name" class='nmeField' name="memberName" type="text" required> </input>
									<label>Admin: </label><select style="width:15%;" name='admin' id='test' class='nmeField' required>								
										<option>Yes</option>
										<option>No</option>
									</select>
									<button class='btn btn-default' style="margin-top:0px;" name='addMember'>Add</button>
								</form>
								<?php
								$ID=0;
								$sql = "SELECT * FROM team_member";
									$result = mysqli_query($conn, $sql);
									echo"<table class='team-mem-table'>";
									echo"<tr class='heading'>";
										echo"<td>Name</td>";
										echo"<td>Email</td>";
										echo"<td>Admin</td>";
									echo"</tr>";
									while($row = mysqli_fetch_assoc($result)) {
										echo '<tr>';
											echo '<form onSubmit="return validateMembersEdit()" name="memberEdit" action="index.php" method="post">';
											echo '<input type="hidden" name="id" value="'.$row["ID"].'">';
											echo '<td class="name"><input name="nameEdit" type="text" value="'.$row["name"].'"/></td>';
											echo '<input type="hidden" name="currName" value="'.$row["name"].'">';
											echo '<td class="email">'.$row["email"].'</td>';
											echo '<td class="admin">';
											echo '<select name="adminEdit" id="test" required>';									
											if($row["admin"]=="Yes"||$row["admin"]=="yes"){
												echo '<option>'.$row["admin"].'</option>';
												echo '<option>No</option>';
											}else{
												echo '<option>'.$row["admin"].'</option>';
												echo '<option>Yes</option>';
											}
											echo '</select>';
											echo '</td>';
											echo '<td class="edit-btn"><button name="editEmp">Update</button></td>';
											echo '<td class="edit-btn"><button name="deleteEmp">Delete</button></td>';
											echo '</form>';
										echo "</tr>";
									
									}
									echo"</table>";
							}else{
								echo "<p> Please Login... </p>";
							}
						?>
					</div>
					<!-- ADD TASKS --> 
					<div id="two" class="TabbedPanelsContent">
						<?php
							if(isset($_SESSION['name'])){
								echo "<h2>Adding Tasks</h2>";
						?>
						<!--FIELDS REQUIRED FOR ADDING A TASK -->
						<form name="details" onSubmit="return validateTasks()" action="index.php" method="post">
		  
							<!-- Task Field -->
							<input type="text" name="taskName" class='nmeField' style="width:30%" placeholder="Task Name" required/><br/><br/>

							<!-- Member Name Field -->
							<?php
								echo "<select name='memberName' id='test' class='nmeField' required>";
									$sql = "SELECT * FROM team_member";
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)) {
										echo '<option>'.$row["name"].'</option>';
									}
									mysqli_close($con);
								echo "</select><br>";
							?>
							<br/>

							<!-- Start Date -->
							<input class='nmeField' name="startDate" placeholder="Start date-(yyyy-mm-dd)" type="text" required></input>

							<!-- Finish Date -->
							<input class='nmeField' name="endDate" class='nmeField' placeholder="End date-(yyyy-mm-dd)"type="text" required></input>
							<br/><br/>
							
							<select class="nmeField" name="status" required>
								<option>Allocated</option>
								<option>Completed</option>
								<option>Abandoned</option>
							</select>
							<br/><br/>
							
							<!-- Task Description -->
							<label>Describe the task:</label><br/>
							<textarea class="nmeField" style="max-width:60%; width:80%;height:120px;" name="description" rows="4" cols="30" value="Description"></textarea>
							<br/><br/>
							<!-- Add form -->
							<button type="submit" name="addTask" class='btn btn-default'>Add Task</button>
						</form>
						<!-- USER TO LOGIN IF SESSION NOT SET -->
						<?php
							}else{
								echo "<p> Please Login... </p>";
							}
						?>
					</div>
					<!-- VIEW TASKS -->
					<div id="three" class="TabbedPanelsContent">
						<?php
							if(isset($_SESSION['name'])){
								echo "<h2> Task Status </h2>";
									$sql = "SELECT * FROM task_data";
									$result = mysqli_query($conn, $sql);
									echo"<table class='task-dat-table'>";
									echo"<tr class='heading'>";
										echo"<td>Title</td>";
										echo"<td>Team Member</td>";
										echo"<td>Status</td>";
										echo"<td>Start Date</td>";
										echo"<td>Expected End Date</td>";
										echo"<td>Task Description</td>";
									echo"</tr>";
									while($row = mysqli_fetch_assoc($result)) {
										echo "<form method='post' onSubmit='return validateTasksEdit()' action='index.php' name='updateTask'>";
										echo '<tr>';
											echo '<input type="hidden" name="id" value="'.$row["ID"].'">';
											echo '<td class="title">'.$row["title"].'</td>';
											
											echo '<td class="teamMember">';
											echo '<select name="memberName" required/>';
												echo '<option>'.$row["teamMember"].'</option>';
												$sql = "SELECT * FROM team_member";
												$rs = mysqli_query($conn, $sql);
												while($rw = mysqli_fetch_assoc($rs)) {
													if($rw['name'] != $row["teamMember"]){
														echo '<option>'.$rw["name"].'</option>';
													}
											}
											echo "</td>";
											
											echo '<td class="status">';
											echo "<select name='taskStatus'>";
												echo "<option>".$row["status"]."</option>";
												if($row["status"]=='Allocated'){
													echo "<option>Completed</option>";
													echo "<option>Abandoned</option>";
												}else if($row["status"]=='Completed'){
													echo "<option>Allocated</option>";
													echo "<option>Abandoned</option>";
												}else if($row["status"]=='Abandoned'){
													echo "<option>Completed</option>";	
													echo "<option>Allocated</option>";
												}
											echo "</td>";
											
											echo '<td class="startDate">'.$row["startDate"].'</td>';
											
											echo '<td class="expEndDate">';
											echo "<input type='text' name='endDate' value='".$row["expEndDate"]."'></input>";
											echo "</td>";
											
											echo '<td class="taskElements">';
											echo "<textarea name='taskElements'>".$row["taskElements"]."</textArea>";
											echo "</td>";
											echo '<td class="edit-btn"><button name="editTask">Update</button></td>';
											echo '<td class="edit-btn"><button name="deleteTask">Delete</button></td>';
										echo "</tr>";
										echo "</form>";
									}
									echo"</table>";
					
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