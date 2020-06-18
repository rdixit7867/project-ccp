<!DOCTYPE html>
<html>
<head>
<style>

#bod{
	font-family: Arial, Helvetica, sans-serif;
	width: 95%;
}

tr:hover{
	background-color:yellow;
}



th {
 text-align: center;
font-size:18px;
color:white;
padding:3px;
background-color: black;
line-height:190%;
border: 1px solid white;
}

caption{
	margin-top: 5px;
margin-bottom: 20px;
text-decoration: underline;
font-size:30px;
font-weight:bold;
color: darkblue;
}

tr{  
	vertical-align: center;
	line-height:120%;
	padding: 3px;
	border: 1px solid gray;
	background-color:rgba(255, 192, 203,0.7);
	margin-bottom:8px;
}

#tc{
	text-align: center;
	
}

#tm{
    width:45%;
    background-color:rgba(255, 180, 120,0.5);
}




td{
	border: 1px solid black;
	font-size:15px;
	padding: 6px;
	color:#000000;
}


</style>
<script src="jquery.min.js"></script>


</head>
<body>


<?php
//Include database configuration file
include('dbConfig.php');





if(isset($_POST["course_id"]) && !empty($_POST["course_id"])){
 
 


 //Get all course data
 $query = $db->query("SELECT * FROM ".$_POST['course_id']." WHERE ".$_POST['university_id']."_U !=0 ORDER BY ".$_POST['university_id']."_U");

//$query = $db->query('SELECT * FROM '.$_POST["course_id"]);

   
    //Count total number of rows
    $rowCount = $query->num_rows;
    




    //Display topics mapping table
    if($rowCount > 0){
        
		
		echo '<table id="bod">
		<caption>Curriculum Coverage for '.$_POST["university_id"].'</caption>
<tr>
<th>'.$_POST["university_id"].' Curriculum (Units & Topics)</th>
<th>Covered in</th>
<th>2Learn Topic Name</th>
<th>Activities </th>
</tr>';
				
        while($row = $query->fetch_assoc()){ 
		
echo '<tr id="ttr01">';

echo '<td id="tm">' . $row[$_POST["university_id"]] . '</td>';
	echo '<td id="tc">' . $row['ES_topic_id'] . '</td>';
	echo '<td >' . $row['ES_topic'] . '</td>';
	echo '<td id="tc">' . $row['total_duration'] . '</td>';		  
	echo '</tr>';			
}
echo '</table>';
        }
        
   else
   echo '<h3>COMING SOON!</h3>';  
}


?>
</body>
</html>