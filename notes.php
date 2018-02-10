<!--DOCTYPE-->
<html>
<?php
$con = mysqli_connect("localhost","root","","bcaip");
 ?>
<head>
	<title>BCA IP - NOTES</title>
	<meta charser="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link rel="stylesheet" href="stylesheet.css" type="text/css">
</head>
<body>
<?php
if(isset($_GET['course']))
{
	$course=$_GET['course'];
	
}
else{
	$course='bca';
}

if(isset($_GET['sem']))
{
	$sem=$_GET['sem'];
	
}

?>
<script type="text/javascript">
function showsub(ddlFruits)  {
var selectedText = ddlFruits.options[ddlFruits.selectedIndex].innerHTML;
        var selectedValue = ddlFruits.value;
        
        
		window.open("?course="+selectedValue,"_self")
		} ;
		function showsu(dlFruits)  {
var selectedText = dlFruits.options[dlFruits.selectedIndex].innerHTML;
        var selectedValue = dlFruits.value;
        var val ='<?php echo $course; ?>';
		var str1="course=";
		var str2="&sem="
		var res = str1+val+str2+selectedValue;
        
		window.open("?"+res,"_self")
		} 
</script>


<nav role="navigation">

		
			<div class="navbar navbar-default navbar-inverse custom-main-navbar">

				<div class="container">

				<div class="navbar-header">
					
					<button type="button" class="pull-left navbar-toggle" data-toggle="collapse" data-target="#main-nav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">BCA</a>

				</div>

				<div class="collapse navbar-collapse" id="main-nav">
				
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a>
					<li><a href="question_papers.php">Question Papers</a>
					<li><a href="practicals.php">Practicals</a>
					<li><a href="video_tutorials.html">Video Tutorials</a>
				</ul>

				</div>

			</div>

	</nav>

	<!--END OF MAIN NAVIGATION-->

<div class="container filter-container">

	<form method="POST" action="notes.php" enctype="multipart/form-data">

			<select required="" id="" name='course' onchange="showsub(this);">
               <?php
if(isset($_GET['course']))
{           echo"
	           <option  selected='' value='$course'>$course</option>
";  }
else{ echo" <option disabled='' selected=''>Course</option> ";
}
  ?>
               <option value='bca'>BCA</option>
               <option value='mca'>MCA</option>
            </select>

	
			<select required="" id="" name='sem' onchange="showsu(this);" >
             <?php
			 if(isset($_GET['sem']))
{            
             echo"
               <option selected='' value='$sem'>SEM $sem</option> ";
}
else
{           echo"  
	          <option disabled='' selected=''>Semester</option>";
			  }
  ?>
               <option value='1'>SEM 1</option>
               <option value='2'>SEM 2</option>
               <option value='3'>SEM 3</option>
               <option value='4'>SEM 4</option>
               <option value='5'>SEM 5</option>
               <option value='6'>SEM 6</option>
            </select>


			<select required="" id="" name="sub">
               <option disabled="" selected="">Subject</option>
			   <?php 
			    if(isset($_GET['course'])&&isset($_GET['sem']))
				{ $course=$_GET['course'];
			      $sem=$_GET['sem'];
				  
					$sub_q="select * from cources where sem=$sem AND course='$course'";
					$sub_e=mysqli_query($con,$sub_q);
					while($sub_r= mysqli_fetch_array($sub_e))
			          {  
				         $subject=$sub_r['subject'];
						 $subjectcode=$sub_r['subjectcode'];
						 
						 echo "<option value='$subjectcode'>$subject</option>
                         ";
					  }
				}

			   ?>
            </select>

            <select required="" id="" name='type'>
               <option disabled="" selected="">Unit</option>
               <option value='1'>Unit 1</option>
               <option value='2'>Unit 2</option>
               <option value='3'>Unit 3</option>
               <option value='4'>Unit 4</option>
               
            </select>   			

			
				<input class="btn btn-info filter-button" type="submit" name="search" value="Search">
				
    </form>

<div class="row">
			<!--tabel-->

			<div class="col-md-9">
			<table class="table table-bordered table-responsive table-striped custom-table">

				<thead>

					<th>Subject Code</th>
					<th>Subject</th>
					<th>Description</th>
					<th>Unit</th>
					<th>File</th>

				</thead>
				<tbody>
				<tr>
                <?php

                  if(isset($_POST['search']))
                    {
	                    $sub=$_POST['sub'];
	                    $course_p=$_POST['course'];
	                    $sem_p=$_POST['sem'];
						if(isset($_POST['type']))
						{$type=$_POST['type'];}
	

                    if(!empty($sub)&&!empty($course_p)&&!empty($sem_p))
                       {
						 if(!empty($type))
					    {
                         $q1="select * from notes where subjectcode='$sub' AND unit=$type ";  
                        }
						 if(empty($type))
						 {
							$q1="select * from notes where subjectcode='$sub'"; 
						 }
					     $e1=mysqli_query($con,$q1);
						 while($r1= mysqli_fetch_array($e1))
						 {   if(!isset($_POST['type']))
							 { $type=$r1['unit'];}
							 $notes_id=$r1['notes_id'];
							 $file=$r1['file'];
							 $topic=$r1['topic'];
							 $subjectcode=$r1['subjectcode'];
							 $q2="select subject from cources where subjectcode='$subjectcode'";
							 $e2=mysqli_query($con,$q2);
							 $r2=mysqli_fetch_array($e2);
							 $subject=$r2['subject'];
							 echo"
							 <td>$subjectcode</td>
							 <td>$subject</td>
							 <td>$topic</td>
							 <td>$type</td>
							 <td><a href='admin/files/$file' target='_blank'>click here</a></td>
							 </tr>
							 "; 				 
						 }
					   
					   }
                    else{
	                   echo "<script>alert('please fill all the fields')</script>";
                       exit();
	
	                    }
	                }



                ?>
					
				
				
				</tbody>


			</table>
		</div>
		<div class="col-md-3">
			<div style="margin-top:40px;" class="well">
			</div>
		</div>
     <div id="results"></div>
	
</div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>

</html>