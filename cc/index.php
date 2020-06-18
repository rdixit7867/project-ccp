<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Curriculum Coverage</title>
<link rel="icon" type="image/png" href="images/logobt.png" />

 <style type="text/css">
 
 body{
background-image: url("images/image.jpg");

}
 
.select-boxes{width: 95%;text-align:center; font-size: 18px; font-weight: bold;}
select {
   
    border: 1px double #000;
 
    font-family: Georgia;
    font-weight: bold;
    font-size: 14px;
    height: 40px;
    padding: 7px 8px;
    width: 300px;
    outline: none;
    margin: 20px 55px 40px 5px;
}
select option{
    font-family: Georgia;
    font-size: 14px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




<script type="text/javascript">
$(document).ready(function(){
	

	
    $('#university').on('change',function(){
       var universityID = $(this).val();
        if(universityID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
            
                data:'university_id='+universityID,
                success:function(html){
                    $('#branch').html(html);
                    $('#course').html('<option value="">Select Branch first</option>'); 
                }
            }); 
        }else{
            $('#branch').html('<option value="">Select University first</option>');
            $('#course').html('<option value="">Select Branch first</option>'); 
        }
    });
    
    $('#branch').on('change',function(){
        var branchID = $(this).val();
        if(branchID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                
                data:'branch_id='+branchID,
                success:function(html){
                    $('#course').html(html);
                }
            }); 
        }else{
            $('#course').html('<option value="">Select Branch first</option>'); 
        }
    });
	
	$('#course').on('change',function(){
		
		var universityID = $('#university').val();
        var courseID = $(this).val();
		
        if(courseID){
            $.ajax({
                type:'POST',
                url:'ajaxDataCourse.php',
                
                data:'course_id='+courseID+'&university_id='+universityID,
                success:function(html){
                    $('#list').html(html);
                }
            }); 
        }else{
            $('#list').html('<p>Select the options.</p>'); 
        }
    });		
});
</script>
</head>

<body>
<div class="maincontainer">
		 <header class="header">
             	  <div class="hadeLogo" > 
                    <a class="navbar-brand" href="https://2learn.in/shop/" style="color: #000">
                        <img src="images/logobt.png" alt="2Learn" style="margin-top:0.5%; margin-bottom:-0.5%; height:70px; margin-left:2%;"/></a>
             	   </div>
      <nav class="navbar navbar-default">
           <div class="container-fluid">
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
      

          </div>

                        
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

 
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </header>
     <div class="mainclass">
     <div class="titel">
     <h3>Verify coverage of your curriculum </h3>
</div>
<hr  class="hr"/>

            
    <div class="middel_div_right" align="center">
       

 <div class="select-boxes">
    <?php
    //Include database configuration file
    include('dbConfig.php');
    
    //Get all universities data
    $query = $db->query("SELECT * FROM universities WHERE status = 1 ORDER BY university_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
	University:<select name="university" id="university">
        <option value="">Select University</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['university_id'].'">'.$row['university_name'].'</option>';
            }
        }else{
            echo '<option value="">University not available</option>';
        }	
 
 ?>
    </select>
	
	Branch:<select name="branch" id="branch">
        <option value="">Select University first</option>
    </select>
	
	Course:<select name="course" id="course">
        <option value="">Select Branch first</option>
    </select>
    </div>

    <div id="list">
	<p>Here is the list</p>
	</div>      
 
 </div>
   
   
</body>
</html>