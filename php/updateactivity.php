<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$put_vars);
    if($put_vars['eid'] !== '' && $put_vars['aid'] !== ''  && $put_vars['name'] !== '' 
	  && $put_vars['location'] !== '' && $put_vars['desc'] !== '' && $put_vars['sdate'] !== '' && $put_vars['stime'] !== '' && $put_vars['etime'] !== '')
    {
        $eid = $put_vars['eid'];
		$aid = $put_vars['aid'];
		$name = $put_vars['name'];
		$location = $put_vars['location'];
		$desc = $put_vars['desc'];
		$sdate = $put_vars['sdate'];
		$stime = $put_vars['stime'];
		$etime = $put_vars['etime'];
		
		$sql = "UPDATE Activities SET ActivityName= '" .$name ."', "
			."ActivityLocation= '" .$location ."',"
			."ActivityDescription= '" .$desc ."', "
			."ActivityDate= '" .$sdate ."', "
			."StartTime= '" .$stime ."', "
			."EndTime= '" .$etime ."' "
			."WHERE EventID = '" .$eid ."' "
			."AND ActivityID = '" .$aid ."';";
    }

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "Please contact system administrator";
    }
	$conn->close();
?>