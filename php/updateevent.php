<?php
    include('dbconnect.php');
    $sql = '';
    
    //This line translating all params from js file to a variable named $put_vars
    parse_str(file_get_contents("php://input"),$put_vars);
    if($put_vars['eid'] !== '' && $put_vars['name'] !== '' && $put_vars['desc'] !== '' 
	   && $put_vars['location'] !== '' )
    {
        $eid = $put_vars['eid'];
		$name = $put_vars['name'];		
		$desc = $put_vars['desc'];
		$location = $put_vars['location'];
		
		
		$sql = "UPDATE Events SET EventName= '" .$name ."', "
			."EventDesc= '" .$desc ."',"
			."EventLocation= '" .$location ."' "	
			."WHERE EventID = '" .$eid ."';";
    }

    //Respond Message
    if ($conn->query($sql) === TRUE) {
        echo "Event updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "Please contact system administrator";
    }
	$conn->close();
?>