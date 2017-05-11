<?php
    include('dbconnect.php');

    if(isset($_POST['eid']) || isset($_POST['mid']) || isset($_POST['user']) || isset($_POST['message'])  || isset($_POST['time']))
    {
		$eid = $_POST['eid'];
        $mid = $_POST['mid'];
        $user = $_POST['user'];
		$message = $_POST['message'];
		$time = $_POST['time'];
		
		

	  $sql = "INSERT INTO Messages(EventID,MessageID,NickName,Message,MessageTime) VALUES('".$eid ."','" .$mid ."','" .$user ."','" .$message ."','" .$time ."');";
		
	
		
        if ($conn->query($sql) === TRUE) {
            echo "Message posted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
	$conn->close();
?>