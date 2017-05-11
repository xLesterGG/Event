<?php 
	include('dbconnect.php');
	$result = $conn->query("SELECT * FROM Events;");

	$outp = "";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") {
            $outp .= ",";
        }
		$outp .= '{"EventID":"'  . $rs["EventID"] . '",';
		$outp .= '"EventName":"'  . $rs["EventName"] . '",';
		$outp .= '"EventDesc":"'  . $rs["EventDesc"] . '",';
        $outp .= '"EventLocation":"'  . $rs["EventLocation"] . '"}';
	}
	
	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>