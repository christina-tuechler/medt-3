<?php	
		if(isset($_POST['projectToDelete']))
    	{
	        $deleteID = $_POST['projectToDelete'];
	        $delete=$db->prepare("DELETE FROM project WHERE id=:deleteID");
			$delete->bindParam(':deleteID', $deleteID);
			$delete->execute();

	        $count=$delete->rowCount();

	        if($count==1)
	        {
	        	$arr=array('delete'=>1);
	        	//echo "1";
	        }	
	        else
	        {
	        	$arr=array('delete'=>0);
	        	//echo "0";
	        }
	        echo json_encode($arr);
	        exit;
	    }
?>