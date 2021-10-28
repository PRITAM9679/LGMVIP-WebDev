


<!doctype html>
<html lang="en">

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
    <link rel="stylesheet" href="css/custom.css" />
  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
  <!-- /web fonts -->
</head>

<body>
  <!-- header -->
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
           
        </div>
    </nav>
</header>
  <section class="w3l-contact py-5" id="contact">
    <div class="container">
        <div class="container col-lg-12 col-md-6 py-lg-3">
          <h3 class="global-title">View Results</h3>
          <div class="row">
            <div class="col-md-8 contact-form">
              <form action="marks.php" method="post">
                <b><h3>Enrollment No.:  </h3>  </b> <input type="text" class="form-control" name="enrno" placeholder="Enrolment No" />
                <br>
                </form>
                </div>
                </div>
                </div>
</div>
                </section>

                <center>
<?php
require_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //$s = $_POST['LOCATIONS'];
    
    $loc = filter_var($_POST['enrno'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    $query = "SELECT * FROM stud where rno = '". $loc ."'";
    
    
    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["name"];
            $field2name = $row["rno"];
            $field3name = $row["marks"];
            $field4name = $row["percentage"];
            $field5name = $row["p1"];
            $field6name = $row["p2"];
            $field7name = $row["p3"];
            $field8name = $row["p4"];
            $field9name = $row["p5"];
            
    
          
            echo "<table border='5'>";
            echo "
                <tr>
                <th>Name </th>
                <th>Enrolment No</th>
                <th>Marks</th>
                <th>Subject 1</th>
                <th>Subject 2</th>
                <th>Subject 3</th>
                <th>Subject 4</th>
                <th>Subject 5</th>
    
                <th>Percentage</th>
                

                </tr>";

            echo "<tr>";
    
            echo "<td>" . $field1name . "</td>";
          
            echo "<td>" .$field2name. "</td>";
            
            echo "<td>" .$field5name. "</td>";
            echo "<td>" .$field6name. "</td>";
            echo "<td>" .$field7name. "</td>";
            echo "<td>" .$field8name. "</td>";
            echo "<td>" .$field9name. "</td>";
            echo "<td>" .$field3name. "</td>";
            echo "<td>" .$field4name. "</td>";
            
    
            echo "</tr>";
            echo "</table>";
            
        }    
        $result->free();
    }
}
?>
</center>






                
                </body>
                </html>