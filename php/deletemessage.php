<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$del_vars);
    if($del_vars['eid'] !== '' && $del_vars['mid'] !== '' )
    {
        $eid = $del_vars['eid'];
		$mid = $del_vars['mid'];
        $sql = "DELETE FROM Messages WHERE EventID = '". $eid ."'AND MessageID = '" .$mid .   "';";
    }

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Message successfully deleted";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "Please contact system administrator";
    }
	$conn->close();
?>