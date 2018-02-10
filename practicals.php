<!--DOCTYPE-->
<html>
<?php
$con = mysqli_connect("localhost","root","","bcaip");
 ?>
<head>
	<title>BCA IP - Practicals</title>
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
					<li><a href="notes.php">Notes</a>
					<li><a href="video_tutorials.html">Video Tutorials</a>
				</ul>

				</div>

			</div>

	</nav>

	<!--END OF MAIN NAVIGATION-->


<div class="container filter-container">

	<form method="POST" action="practicals.php" enctype="multipart/form-data">

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

            			

			
				<input class="btn btn-info filter-button" type="submit" name="search" value="Search">
				
    </form>
	</div>
        <div class="container">
<div class="row">
<div class="col-md-9">

<div class="panel-group custom-panel-group" id="accordion">

    
			
                <?php

                  if(isset($_POST['search']))
                    {
						if(isset($_POST['sub'])&&isset($_POST['course'])&&isset($_POST['sem']))
						{
	                    $sub=$_POST['sub'];
	                    $course_p=$_POST['course'];
	                    $sem_p=$_POST['sem'];
						}

                    if(!empty($sub)&&!empty($course_p)&&!empty($sem_p))
                       {
						 	$q1="select * from practicals where subjectcode='$sub'"; 
						 $n=1;
					     $e1=mysqli_query($con,$q1);
						 while($r1= mysqli_fetch_array($e1))
						 {   
							 $practical_id=$r1['practical_id'];
							 $file=$r1['file'];
							 $topic=$r1['topic'];
							 $subjectcode=$r1['subjectcode'];
							 $code=$r1['code'];
							 $q2="select subject from cources where subjectcode='$subjectcode'";
							 $e2=mysqli_query($con,$q2);
							 $r2=mysqli_fetch_array($e2);
							 $subject=$r2['subject'];
					 				 
						 
						echo"
						  <div class='panel panel-default'>
                            <div class='panel-heading custom-panel-heading'>
                              <a href='#content-$n' data-toggle='collapse' data-parent='#accordion'>
                                <div class='panel-title'>
								  <p>Q$n:$topic .<p>
                                </div>
                              </a>							  
                            </div>

                        <div  id='content-$n' class='panel-collapse collapse'>
                         <div class='panel-body'>";
                          if(!empty($code))
						  { echo"
						  <xmp>$code						   
                          </xmp> "; }
						  else
						  {
							echo"  <iframe src='new.txt' class='panel-body' width='100%'></iframe> ";
						  } echo"
        </div>
      </div>
    </div>
						 
					   "; 
					   $n+=1;}}
                    else{
	                   echo "<script>alert('please fill all the fields')</script>";
                       exit();
	
	                    }
	                }



                ?>
						




            
     

   





</div>
</div>



<div class="col-md-3">
	<div class="well">
	</div>
</div>

</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>