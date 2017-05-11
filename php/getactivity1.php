<?php 
	include('dbconnect.php');
	
	$result = $conn->query("SELECT * FROM Activities WHERE EventID =1;");

	$outp = "";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") {
            $outp .= ",";
        }
		//$outp .= '{"EventID":"'  . $rs["EventID"] . '",';
		$outp .= '{"ActivityID":"'  . $rs["ActivityID"] . '",';
		$outp .= '"EventID":"'  . $rs["EventID"] . '",';
		$outp .= '"ActivityName":"'  . $rs["ActivityName"] . '",';
		$outp .= '"ActivityLocation":"'  . $rs["ActivityLocation"] . '",';
		$outp .= '"ActivityDescription":"'  . $rs["ActivityDescription"] . '",';
		$outp .= '"ActivityDate":"'  . $rs["ActivityDate"] . '",';		
		$outp .= '"StartTime":"'  . $rs["StartTime"] . '",';		
        $outp .= '"EndTime":"'  . $rs["EndTime"] . '"}';
	}
	
	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>