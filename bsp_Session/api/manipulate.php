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

<?php	
		if(isset($_POST['projectToUpdate']))
    	{
	        	//$update=$db->query("UPDATE project SET name=\"".$_POST['editProjectName']."\", description=\"".$_POST['editProjectDesc']."\", createDate=\"".$_POST['editProjectDate']."\" WHERE id=\"".$editID."\"");
	        	$update=$db->prepare("UPDATE project SET name=:myname, description=:mydesc, createDate=:mycre WHERE id=:myid");
				$update->bindParam(':myname', $_POST['editProjectName'], PDO::PARAM_STR);
				$update->bindParam(':mydesc', $_POST['editProjectDesc'], PDO::PARAM_STR);
				$update->bindParam(':mycre', $_POST['editProjectDate'], PDO::PARAM_STR);
				$update->bindParam(':myid', $_POST['projectToUpdate'], PDO::PARAM_INT);
				$update->execute();
				//echo $update->fetch();
	        

	        $count=$update->rowCount();

	        if($count==1)
	        {
	        	$arr=array('change'=>1);
	        	//echo "1";
	        }	
	        else
	        {
	        	$arr=array('change'=>0);
	        	//echo "0";
	        }
	        echo json_encode($arr);
	        exit;
	    }
?>
<?php
		if(isset($_POST['projectToEdit']))
    	{
	        
	        	//$update=$db->query("UPDATE project SET name=\"".$_POST['editProjectName']."\", description=\"".$_POST['editProjectDesc']."\", createDate=\"".$_POST['editProjectDate']."\" WHERE id=\"".$editID."\"");
	        	$editID=$_POST['projectToEdit'];
	        	$change=$db->prepare("SELECT name, description, createDate FROM project WHERE id=:editID");
				$change->bindParam(':editID', $editID, PDO::PARAM_INT);
				$change->execute();
				$toChange=$change->fetch();
				?>


	        
<?php
	        $count=$change->rowCount();

	        if($count==1)
	        {
	        	$arr=array('name'=>$toChange['name'],'desc'=> $toChange['description'], 'date'=>$toChange['createDate']);
	        	//echo "1";

                //$arr->name = $toChange['name'];
                //$arr->desc = $toChange['description'];
                //$arr->date = $toChange['createDate'];

                ?>

                <?php
	        }	
	        else
	        {
	        	$arr=array('name'=>0);
	        	//echo "0";
	        }
	        echo json_encode($arr);

	        exit;
	    }
?>