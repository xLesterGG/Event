<?php 
	include('dbconnect.php');
	
	$result = $conn->query("SELECT * FROM Activities WHERE EventID =1;");

	$outp = [];

	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {		
		//$outp .= '{"EventID":"'  . $rs["EventID"] . '",';
		$datestring = $rs["ActivityDate"];
		$dateString = preg_replace("/\(.*\)/","",$datestring);
		
		$stime = $rs["StartTime"];
		$stime= preg_replace("/\(.*\)/","",$stime);
		$stime = new DateTime($stime, new DateTimeZone('Asia/Kuching'));
		
		
		$etime = $rs["EndTime"];
		$etime= preg_replace("/\(.*\)/","",$etime);
		$etime = new DateTime($etime, new DateTimeZone('Asia/Kuching'));

		
		/*$kch_time = new DateTimeZone('Asia/Kuching');
		$stime->setTimezone($kch_time);*/

		
		$outp[] = 
		[
			"ActivityID" => $rs["ActivityID"],
			"EventID" => $rs["EventID"],
			"ActivityName" => $rs["ActivityName"],
			"ActivityLocation" => $rs["ActivityLocation"],
			"ActivityDescription" => $rs["ActivityDescription"],
			"ActivityDate"  => date('d/m/Y', strtotime($dateString	.' +1 day')),
			"StartTime" => 	$stime->format('G.i A'),	
			"EndTime" => $etime->format('G.i A')			
			
		];
		
	}
	
	$conn->close();

	echo(json_encode($outp));
?>