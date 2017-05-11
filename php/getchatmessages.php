<?php 
	include('dbconnect.php');
	//parse_str(file_get_contents("php://input"),$vars);
	//$id = $vars['id'];
	//$id = 1;
	//echo $id;
	//$result = $conn->query("SELECT * FROM Messages WHERE EventID ='" . $id . "' ;");
	$result = $conn->query("SELECT * FROM Messages WHERE EventID =1;");

	$outp = "";

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") {
            $outp .= ",";
        }
		$outp .= '{"EventID":"'  . $rs["EventID"] . '",';
		$outp .= '"MessageID":"'  . $rs["MessageID"] . '",';
		$outp .= '"NickName":"'  . $rs["NickName"] . '",';
		$outp .= '"Message":"'  . $rs["Message"] . '",';
        $outp .= '"MessageTime":"'  . $rs["MessageTime"] . '"}';
	}
	
	$outp ='['.$outp.']';
	$conn->close();

	echo($outp);
?>


