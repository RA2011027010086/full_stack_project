<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Jobs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="stylejobs.css"> 
</head>
<body> 
  <section class="slider">
    <div>
      <img src="job1.jpg" width="100%">
      <div class="desc">
        <h2><span>Data Science</span>Jobs</h2>
       
        <a href="https://builtin.com/jobs" class="btn">Click Here to apply</a>
      </div>
    </div>
  
    <div>
      <img src="job2.jpg" width="100%">
      <div class="desc">
        <h2><span>Jobs For</span>Marketers</h2>
        
        <a href="https://heymarketers.com/" class="btn">Click here to apply</a>
      </div>
    </div>
  
    <div>
      <img src="job3.jpg" width="100%" height="80%">
      <div class="desc">
        <h2><span>Full Stack</span> Jobs</h2>
       
        <a href="https://careers.unitedhealthgroup.com/job-search-results/?keyword=Software%20Architect&location=India&country=IN&radius=25&category=Technology" class="btn">Click here to apply</a>
      </div>
    </div>
  
    <div>
      <img src="job4.jpg" width="100%">
      <div class="desc">
        <h2><span>Teaching</span> Jobss</h2>
       
        <a href="https://www.schoolspring.com/" class="btn">Click Here to Apply</a>
      </div>
    </div>
  
    <div><br><br><br>
      <img src="job5.jpg" width="100%">
      <div class="desc">
        <h2><span>Medical</span>Jobs</h2>
       
        <a href="https://medicaljob.in/" class="btn">Click Here to Apply</a>
      </div>
    </div>
  </section> 
<div class="credit">Jp Mend <a href="https://www.learningrobo.com/">IT</a></div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script> 
<script type="text/javascript" src="script.js"></script>
</body>
</html>


          <?php

          $limit = 4;

          $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();
            $total_records = $row['id'];
            $total_pages = ceil($total_records / $limit);
          } else {
            $total_pages = 1;
          }

          ?>

          
            <div id="target-content">
              
            </div>
            <div class="text-center">
             
            </div> 



          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px; text-align:center">
    <div class="text-center">
      <strong>Copyright &copy; 2020-2021 <a href="learningfromscratch.online">Mend IT</a>.</strong> All rights
    reserved.<br/>
    <a href="file:///C:/xampp/htdocs/Lsm_project/terms/service.html" target="_blank" style="font-size:17px;"><i class="fa fa-warning"></i><b >Terms of Service</b></a>
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
<script src="js/jquery.twbsPagination.min.js"></script>
<script>

function createSlick(){  
  $(".slider").not('.slick-initialized').slick({
    centerMode: true,
      autoplay: true,
      dots: true, 
        arrows: true,
      slidesToShow: 3,
      responsive: [{ 
          breakpoint: 768,
          settings: {
              dots: false,
              arrows: false,
              infinite: true,
              slidesToShow: 1,
              slidesToScroll: 1
          } 
      }]
  }); 

} 
createSlick();
$(window).on( 'resize', createSlick );
</script>


<script>
  $("#searchBtn").on("click", function(e) {
    e.preventDefault();
    var searchResult = $("#searchBar").val();
    var filter = "searchBar";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".experienceSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "experience";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".citySearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "city";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  function Search(val, filter) {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        val = encodeURIComponent(val);
        $("#target-content").html("loading....");
        $("#target-content").load("search.php?page="+page+"&search="+val+"&filter="+filter);
      }
    });
  }
</script>


</body>
</html>