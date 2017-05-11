<?php 
	include('dbconnect.php');
	
	$result = $conn->query("SELECT ActivityID FROM Activities ORDER BY ActivityID DESC LIMIT 1;	");

	$outp = "";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") {
            $outp .= ",";
        }
		//$outp .= '{"EventID":"'  . $rs["EventID"] . '",';
		$outp .= '{"ActivityID":"'  . $rs["ActivityID"] . '"}';
	}
	
	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>