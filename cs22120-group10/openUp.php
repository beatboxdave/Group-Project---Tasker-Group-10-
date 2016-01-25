<select onchange="showUser(this.value)" id="selectMe" name="blockField" id="test" class="nmeField">
	<option> Please select... </option>
	<?php 
		error_reporting(0);
		$conn= odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=C:/xampp/htdocs/site/dist/DB/world","", "");
		$sql = odbc_exec($conn, "SELECT Blocks FROM Blocks");
		while ($row = odbc_fetch_array($sql))
		{
			echo '<option value = "'.$row['Blocks'].'">'.$row['Blocks'].'</option>';
			// close while loop 
		}
		odbc_close($conn);
	?>
</select>

<div id="rooms">

</div>

