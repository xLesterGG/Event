<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$del_vars);
    if($del_vars['eid'] !== '' && $del_vars['aid'] !== '' )
    {
        $eid = $del_vars['eid'];
		$aid = $del_vars['aid'];
        $sql = "DELETE FROM Activities WHERE EventID = '". $eid ."'AND ActivityID = '" .$aid .   "';";
    }

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Activity successfully deleted";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "Please contact system administrator";
    }
	$conn->close();
?>