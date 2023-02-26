<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mend IT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="styleindex.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="styleindex.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="styleindex.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="styleindex.css">
  <link rel="stylesheet" href="styleindex.css">
  <!-- Custom -->
  <link rel="stylesheet" href="styleindex.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body id="border">
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="jobs.php">Jobs</a>
          </li>
          <li>
            <a href="testing.html">Testing</a>
          </li>
          <li>
            <a href="#candidates">Candidates</a>
          </li>
          <li>
            <a href="#company">Company</a>
          </li>
          <li>
            <a href="#about">About Us</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login.php">Login</a>
          </li>
          <li>
            <a href="signup.php">Sign Up</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>

    <!-- Logo -->
     <p id="p1">All Jobs At One Place
      <!-- mini logo for sidebar mini 50x50 pixels -->
     <img id="img1" src="logo2.png"></p>
    

    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header bg-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center index-head">
            
            <p id="p2">One search, global reach</p>
            <p><a id="search" href="jobs.php" >Search Jobs</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h1 class="text-center">Latest Jobs</h1> 
            <p>
          <div class="container1">
            <img id="img2" src="image1.jpg">
            <div class="content">There are many arising latest jobs</div>
          </div>

            <?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
          $sql = "SELECT * FROM job_post Order By Rand() Limit 4";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
             ?>
            <div class="attachment-block clearfix">
              
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">₹<?php echo $row['minimumsalary']; ?>-₹<?php echo $row['maximumsalary']; ?>/Month</span></h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
                </div>
              </div>
            </div>
          <?php
              }
            }
            }
          }
          ?>

          </div>
        </div>
      </div>
      </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
    


            <br><br><h1>Candidates</h1>
            <div class="container2">
            <img id="img3" src="image2.webp">
            <div class="content1">candidates are chosen based upon their satisfactory skills</div>
          </div>            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
            

              
               <br><br><br><br><h1 class="text-center">Browse Jobs</h1>
                <div class="container3">
            <img id="img4" src="image3.jpg">
            <div class="content2">Browse for jobs that suits your interests</div>
          </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <div class="caption">
              <br><br><br><br> <h1 >Apply & Contact</h1>
                <div class="container4">
            <img id="img5" src="image4.png">
            <div class="content3">Apply for the jobs that you have browesed</div>
          </div>
          <p id="apply">Since many employers post their open jobs online to gather more qualified candidates, it's important to know how to apply for jobs on the internet. Knowing how and where to search for jobs online can help you find a role that suits your qualifications. Each online application process is different, but there are some fundamentals you can learn to make it easier to apply.</p>
            <br><p width= "100px" style="font-size:30px">Follow these steps to simplify your online job search and application process:<br></p>

<p width="100px" style="font-size:20px">Update your resume.<br>
Update your profile on professional networking platforms.<br>
Use keywords.<br>
Use  websites.<br>
Be selective.<br>
Draft a separate cover letter for each application.<br>
Complete an online job application.<br>
Make sure your responses are error-free, accurate and fully completed.<br>
Track and follow up on your job applications.<br>
Keep applying.<br></p>
                
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="company" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
          <br><br><br><br><h1>Companies</h1>
          <div class="container5">
            <img id="img6" src="image5.jpeg">
            <div class="content4">There are vast number of companies to give candidates more options</div>
          </div>
            <p style="font-size:30px">Hiring? Register your company for free, browse our talented pool, post and track job applications</p>            
          </div>
        </div>
        

    <section id="statistics" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
        <p id="stats"> <br><br><br><br>Our Statistics</p>
        <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
    <img id="st" src="logo5.jpg">
    </div> 
    <div class="flip-card-back">
      <h1>Statistics</h1>
      <p>JP MEND IT</p>
      <p>Soon the number of candidtates and registered companies will increase</p>
    </div>
  </div>
</div>
          </div>
        </div>
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             <?php
                      $sql = "SELECT * FROM job_post";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
          

              
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                  <?php
                      $sql = "SELECT * FROM company WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              

              
            </div>
            <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <?php
                      $sql = "SELECT * FROM users WHERE resume!=''";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              

             
            </div>
            <div class="icon">
              <i class="ion ion-ios-list"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
               <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              

             
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      </div>
    </section>
       
</div>
    <section id="about" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
          <br><br><br><br><h1 style="font-size=30px">About US</h1>               
          </div>
        </div>
        <div class="about-section">
  
        <p>Job Portal for people from all walks of life!<p>The online job portal application allows job seekers and recruiters to connect.The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for jobs, apply for jobs, view different job openings. The application provides the ability for companies to create their accounts, search candidates, create job postings, and view candidates applications.
            </p>
            <p>
              This website is used to provide a platform for potential unskilled labour workers who are far from the companies and individuals, connects them and reach out! Skilled and unskilled all sorts of people can apply!
              This site can be used as a paving path for both companies and job-seekers for a better life .
              
            </p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img  alt="Ishita Sharma" style="width:100%">
      <div class="container">
        <h2>Ishita Sharma</h2>
        <p class="title">Student</p>
        <p>Skills: HTML and CSS</p>
        <p>is8299@srmist.edu.in</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img   alt="Aayush Anand" style="width:100%">
      <div class="container">
        <h2>Aayush Anand</h2>
        <p class="title">Student</p>
        <p>Skills: PHP and Machine Learning</p>
        <p>aa0339@srmist.edu.in</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  
</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2020-2021 <a href="learningfromscratch.online">Job Portal</a>.</strong> All rights
    reserved.<br/>
    <a href="file:///C:/xampp/htdocs/Lsm_project/terms/service.html" target="_blank" style="font-size:17px;"><i class="fa fa-warning"></i><b >Terms of Service</b></a>
    <br/>
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>