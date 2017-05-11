<?php 
	include('dbconnect.php');
	
	$result = $conn->query("SELECT MessageID FROM Messages ORDER BY MessageID DESC LIMIT 1;	");

	$outp = "";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") {
            $outp .= ",";
        }
		$outp .= '{"MessageID":"'  . $rs["MessageID"] . '"}';
	}
	
	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>