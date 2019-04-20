<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Group7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- frontend work to make it looks better 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script> 
    -->
</head>
<?php
    require "header.php"
?>
<body>
	<main>
	<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
        <th scope="col">Heading</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
    </tbody>
  </table>
</div>
<?php
echo '<tbody>';
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $rows[] = $row;
            echo '<tr>';
            echo '<td>'.$row['reportName'].'</td>'.'<td>'.$row['categoryName'].'</td>'.'<td>'.$row['subcategoryName'].'</td>'.'<td>'.$row['reportDateUploaded'].'</td>';
            echo '</tr>';     
        }
 echo '</tbody>';
 echo '</table>';





 function showTables($table, $order) {

	global $conn;

	$query = "SELECT * FROM $table ORDER BY $order ASC LIMIT 0, 30 ";
	$returnTables = mysqli_query($conn, $query);

	$sql_columns_name = "SHOW COLUMNS FROM $table";

	$sql_columns_result = mysqli_query($conn,$sql_columns_name);

	$column_arr = array();

	while($row = mysqli_fetch_array($sql_columns_result)){
		$column_arr[] = $row['Field'];
	}

	echo '<table>';

	while ($row = mysqli_fetch_array($returnTables)) {

			for ($i=0; $i < count($column_arr); $i++) {
					echo "<tr>";  
						echo "<td>".$row[$column_arr[$i]]."</td><br>";
					echo "</tr>";
			}

	}

	echo '</table>';
}

?>
	</main>
</body>
</html>
<?php
    require "footer.php"
?> 