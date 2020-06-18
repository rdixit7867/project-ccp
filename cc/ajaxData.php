<script src="jquery.min.js"></script>
<?php
//Include database configuration file
include('dbConfig.php');



if(isset($_POST["university_id"]) && !empty($_POST["university_id"])){  


		
	//Get all branch data
    $query = $db->query("SELECT * FROM branches WHERE university_id = '".$_POST['university_id']."' AND status = 1 ORDER BY branch_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display branchs list
    if($rowCount > 0){
        echo '<option value="">Select Branch</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['branch_id'].'">'.$row['branch_name'].'</option>';
        }
    }else{
        echo '<option value="">Branch not available</option>';
    }	
	
}



if(isset($_POST["branch_id"]) && !empty($_POST["branch_id"])){
    //Get all course data
    $query = $db->query("SELECT * FROM courses WHERE branch_id = ".$_POST['branch_id']." AND status = 1 ORDER BY course_name ASC");
    
	
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display courses list
    if($rowCount > 0){
        echo '<option value="">Select Course</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
        }
    }else{
        echo '<option value="">Course not available</option>';
    }
}



?>
