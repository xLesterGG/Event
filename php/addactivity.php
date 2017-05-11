<?php
    include('dbconnect.php');

    if(isset($_POST['eid']) || isset($_POST['id']) || isset($_POST['name']) || isset($_POST['location'])  || isset($_POST['desc']) || isset($_POST['sdate']) || isset($_POST['stime'])  || isset($_POST['etime']))
    {
		$eid = $_POST['eid'];
        $id = $_POST['id'];
        $name = $_POST['name'];
		$location = $_POST['location'];
		$desc = $_POST['desc'];
		$sdate = $_POST['sdate'];
		$stime = $_POST['stime'];
		$etime = $_POST['etime'];
		

	  $sql = "INSERT INTO Activities(EventID, ActivityID,ActivityName,ActivityLocation,ActivityDescription,ActivityDate,StartTime,EndTime) VALUES(".$eid .",'" .$id ."','" .$name ."','" .$location ."','" .$desc ."','" .$sdate ."','" .$stime ."','" .$etime ."');";
		
	
		
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
	$conn->close();
?>