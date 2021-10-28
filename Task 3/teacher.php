
<!doctype html>
<html lang="en">
<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: login.php');
		exit;
	}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Result Management System</title>
  <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />
  <!-- Template CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
  <!-- /web fonts -->
</head>

<header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <div class="heading_main text_align_left">
                <a class="navbar-brand editContent" href="index.html"><h2><b>Result Management System</b></h2></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.html">Home</a></li>
                        <li><a class="nav-link" href="about.html">About</a></li>
                        <li><a class="nav-link" href="teacher.php">Teacher Login </a></li>
						<li><a class="nav-link" href="student.html">Student Portal</a></li>
                    </ul>
                </div>
                <div class="search-box">
                    <input type="text" class="search-txt" placeholder="Search">
                    <a class="search-btn">
                        <img src="images/search_icon.png" alt="#" />
                    </a>
                </div>
            </div>
        </nav>
    </header>

<li class="nav-item">	<section class="container wrapper">
			<div class="page-header">
				<h5 class="display-5">Welcome home <?php echo $_SESSION['username']; ?></h2>
			</div>
			</section></li>
      
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </header>
      
                <br><section class="w3l-contact py-5" id="contact">
        <div class="container py-lg-3">
          <h3 class="global-title">Please Fill Up The Marks of the Students</h3>
          <div class="row">
            <div class="col-md-8 contact-form">
              <form action="" method="post">
                <b><h3>Name:  </h3>  </b> <input type="text" class="form-control" name="name" placeholder="Name" />
                <br>
                
                    


                <b><h3>Enrollment Number: </h3>  </b><input type="number" class="form-control" name="rno" placeholder="Enrollment number">
                <br> 
                <b><h3>Email ID :</h3>  </b> <input type="email" class="form-control" name="email" placeholder="E-mail" />
                <br>

                <b><h3>Subject 1: </h3>  </b><input type="number" class="form-control" name="p1" placeholder="Subject1 Marks">
                <br> 

                <b><h3>Subject 2: </h3>  </b><input type="number" class="form-control" name="p2" placeholder="Subject2 Marks">
                <br> 

                <b><h3>Subject 3: </h3>  </b><input type="number" class="form-control" name="p3" placeholder="Subject3 Marks">
                <br>

                <b><h3>Subject 4: </h3>  </b><input type="number" class="form-control" name="p4" placeholder="Subject4 Marks">
                <br> 

                <b><h3>Subject 5: </h3>  </b><input type="number" class="form-control" name="p5" placeholder="Subject 5 Marks">
                <br> 

                
                <button class="btn btn-primary theme-button" type="submit">Send</button>
              
                <?php
                require_once('config/config.php');
                if(isset($_POST['rno'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5']))
                {
                    $rno=$_POST['rno'];
                    $name = $_POST['name'];
                    if(!isset($_POST['email']))
                        $email=null;
                    else
                        $email=$_POST['email'];
                    $p1=(int)$_POST['p1'];
                    $p2=(int)$_POST['p2'];
                    $p3=(int)$_POST['p3'];
                    $p4=(int)$_POST['p4'];
                    $p5=(int)$_POST['p5'];
            
                    $marks=$p1+$p2+$p3+$p4+$p5;
                    $percentage=$marks/5;
            
                    // validation
                    if (empty($email) or empty($rno) or $p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 ) {
                        if(empty($email))
                            echo '<p class="error">Please Enter the email id</p>';
                        if(empty($rno))
                            echo '<p class="error">Please enter roll number</p>';
                        if(preg_match("/[a-z]/i",$rno))
                            echo '<p class="error">Please enter valid roll number</p>';
                        if(preg_match("/[a-z]/i",$marks))
                            echo '<p class="error">Please enter valid marks</p>';
                        if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0)
                            echo '<p class="error">Please enter valid marks</p>';
                        exit();
                    }
            
                   
                    $sql="INSERT INTO `stud` (`name`, `rno`, `email`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES ('$name', '$rno', '$email', '$p1', '$p2', '$p3', '$p4', '$p5', '$marks', '$percentage')";
                    $sql=mysqli_query($conn,$sql);
            
                    if (!$sql) {
                        echo '<script language="javascript">';
                        echo 'alert("Invalid Details")';
                        echo '</script>';
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Successful")';
                        echo '</script>';
                    }
                }
            ?>
            
              
              
              
              </form>
              <div class="container"  style="padding-top:10px">
              <a href="logout.php" class="btn btn-block btn-outline-danger">Sign Out</a>
              </div>
            </div>
            
          </div>
        </div>
      </section>
    
      
    
      </footer>
   
    
    </body>
    
    </html>
