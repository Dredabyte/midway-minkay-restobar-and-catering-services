<?php
if (isset($_POST['avail'])) {

  $_SESSION['from'] = $_POST['from'];
  $_SESSION['to']  = $_POST['to'];

  redirect(WEB_ROOT . "index.php?page=5");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo isset($title) ? $title . ' | Midway Minkay Restobar and Catering Services' :  'Midway Minkay Restobar and Catering Services'; ?></title>


  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>/css/my_style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>/css/responsive.css">

  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>/css/my_bootstrap.css">

  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>/fonts/css/font-awesome.min.css">


  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>/css/custom-navbar.min.css">

  <!-- DataTables CSS -->
  <!-- <link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet"> -->

  <link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo WEB_ROOT; ?>css/datepicker.css" rel="stylesheet" media="screen">

  <link href="<?php echo WEB_ROOT; ?>css/my_galery.css" rel="stylesheet" media="screen">
  <link href="<?php echo WEB_ROOT; ?>css/ekko-lightbox.css" rel="stylesheet">

  <link rel="icon" type="image/png" href="<?php echo WEB_ROOT; ?>favicon_midway-modified.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,300&display=swap" rel="stylesheet">

</head>

<?php
if (isset($_SESSION['monbela_cart'])) {
  if (count($_SESSION['monbela_cart']) > 0) {
    $cart = '<span class="carttxtactive"> ' . count($_SESSION['monbela_cart']) . ' </span>';
  }
}
if (isset($_SESSION['activity'])) {
  if (is_array($_SESSION['activity']) && count($_SESSION['activity']) > 0) {
    $activity = '<span class="carttxtactive"> ' . count($_SESSION['activity']) . ' </span>';
  }
}


// if (!isset($_GET['view'])=='detail') {
//   # code...
//   unset($_SESSION['pay']);
//   unset($_SESSION['monbela_cart']);

// }
?>


<style type="text/css">
  body {
    font-family: 'Poppins', sans-serif;
    background-color: lightcyan;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-family: 'Poppins', sans-serif;
  }

  p,
  a,
  span {
    font-family: 'Poppins', sans-serif;
  }

  #menuSm {
    background-color: #40a4a4;
    height: 50px;
  }

  #site-navigation-wrap li a {
    background-color: #40a4a4;
    font-size: 16px;

  }

  #menuSm li:hover {
    background-color: #40a4a4;
  }

  #menuSm {
    border-bottom: 1px solid yellow;
  }

  #site-navigation-wrap li:hover {
    background-color: #40a4a4;

  }

  .img-portfolio img {
    max-height: 200px;
    width: 400px;
  }

  #sidebarRight-wrap {
    background-color: #40a4a4;
    border-bottom: 6px solid yellow;
  }

  #site-navigation-wrap,
  #footer-wrap,
  #menuSm,
  #availability-wrap,
  #accom-title {
    background-color: #40a4a4;
  }

  #availability-wrap .block>p {
    color: #fff;
    font-size: 2.5em;
    line-height: 1em;
    margin-bottom: 0px;
    margin-top: -30px;
  }

  .modal-content {
    border-radius: 0;
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
    border: 0;
    width: fit-content;
  }
</style>




<body>

  <?php include $small_nav; ?>

  <div id="wrap" class="clr container">
    <div id="header-wrap" class="clr fixed-header">
      <header id="header" class="site-header clr">

        <div id="logo" class="clr">

          <h2 id="site-name">
            <a href="<?php echo WEB_ROOT; ?>index.php" title="Midway Minkay Restobar and Catering Services">Midway Minkay Restobar and Catering Services</a>
            <!-- <div id="site-slogan"><?php print "24 hrs"; ?></div> -->
          </h2>
        </div>



      </header>
    </div>


    <div id="sidr-close"><a href="#sidr-close" class="toggle-sidr-close"></a></div>
    <div id="site-navigation-wrap">
      <a href="#sidr-main" id="navigation-toggle"><span class="fa fa-bars"></span>Menu</a>
      <div id="site-navigation" class="navigation main-navigation clr" role="navigation">

        <div id="main-menu" class="menu-main-container">
          <?php
          $accomodation = new Accomodation();
          $cur = $accomodation->listOfaccomodation();
          ?>
          <ul>
            <li><a href="<?php echo WEB_ROOT; ?>index.php">Home</a></li>
            <li><a href="<?php echo WEB_ROOT; ?>index.php?p=rooms">Rooms and Rates</a> </li>
            <li><a href="#">Accomodation</a>
              <ul>
                <?php foreach ($cur as $result) { ?>
                  <li><a href="<?php echo WEB_ROOT; ?>index.php?p=accomodation&q=<?php echo $result->accomodation_name; ?>"><?php echo $result->accomodation_name; ?></a></li>
                <?php } ?>
              </ul>
            </li>
            <li><a href="<?php echo WEB_ROOT; ?>index.php?p=contact">Contact Us</a> </li>
          </ul>

        </div>
      </div>
    </div>

    <!-- slider
=====================================================================
 -->
    <div id="homepage-slider-wrap" class="clr flexslider-container">
      <div id="homepage-slider" class="flexslider">
        <ul class="slides clr">
          <li>
            <img src="<?php echo WEB_ROOT; ?>images/background.jpg">
          </li>

        </ul>
      </div>
    </div>
    <!-- end slider
==============================================================================
 -->



    <?php
    require_once $content;
    ?>

    <!-- footer  
 =========================================== 
 -->
    <div id="footer-wrap" class="site-footer clr">
      <div id="footer" class="clr">
      <p>&copy; 2023 Miday Minkay Restobar & Catering Services. All Rights Reserved.</p>
        <div id="footer-block-wrap" class="clr">
          <div class="span_1_of_3 col col-1 footer-block ">
          </div>
          <div class="span_1_of_3 col col-2 footer-block ">
          </div>
          <div class="span_1_of_3 col col-3 footer-block ">
          </div>
        </div>
        <div class="span_1_of_1 col col-1">
        </div>
      </div>
    </div>
    <!-- 
==================================================  
 end
  -->



  </div>
  <!-- container -->
  <!-- Modal photo -->
  <div class="modal fade" id="myModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" type="button">X</button>

          <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
        </div>

        <form action="<?php echo WEB_ROOT; ?>guest/update.php" enctype="multipart/form-data" method="post">
          <div class="modal-body">
            <div class="form-group">
              <div class="rows">
                <div class="col-md-12">
                  <div class="rows">
                    <div class="col-md-8">
                      <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> <input id="image" name="image" type="file">
                    </div>

                    <div class="col-md-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" name="savephoto" type="submit">Upload Photo</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->




  <!-- jQuery -->
  <script src="<?php echo WEB_ROOT; ?>jquery/jquery.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo WEB_ROOT; ?>js/bootstrap.min.js"></script>

  <!-- DataTables JavaScript -->
  <script src="<?php echo WEB_ROOT; ?>js/jquery.dataTables.min.js"></script>
  <script src="<?php echo WEB_ROOT; ?>js/dataTables.bootstrap.min.js"></script>


  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-datepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo WEB_ROOT; ?>js/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
  <!-- Custom Theme JavaScript -->


  <script src="<?php echo WEB_ROOT; ?>js/ekko-lightbox.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/plugins.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/html5.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/retina.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo WEB_ROOT; ?>js/global.js"></script>

  <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
      .popover()
  </script>

  <script type="text/javascript">
    $('.date_pickerfrom').datetimepicker({
      format: 'mm/dd/yyyy',
      startDate: '01/01/2000',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0

    });


    $('.date_pickerto').datetimepicker({
      format: 'mm/dd/yyyy',
      startDate: '01/01/2000',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0

    });



    $(document).ready(function() {

      $('.gallery-item').hover(function() {
        $(this).find('.img-title').fadeIn(400);
      }, function() {
        $(this).find('.img-title').fadeOut(100);
      });

    });



    $('.dbirth').datetimepicker({
      format: 'mm/dd/yyyy',
      startDate: '01/01/1960',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0

    });



    //Validates Personal Info
    function personalInfo() {
      var a = document.forms["personal"]["name"].value;
      var b = document.forms["personal"]["last"].value;
      var c = document.forms["personal"]["city"].value;
      var d = document.forms["personal"]["address"].value;
      var e = document.forms["personal"]["dbirth"].value;
      var f = document.forms["personal"]["zip"].value;
      var g = document.forms["personal"]["phone"].value;
      var h = document.forms["personal"]["username"].value;
      var i = document.forms["personal"]["password"].value;


      // var atpos=f.indexOf("@");
      // var dotpos=f.lastIndexOf(".");
      // if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
      //   {
      //   alert("Not a valid e-mail address");
      //   return false;
      //   }
      // if( f != g ) {
      // alert("email does not match");
      //   return false;
      // }
      if (document.personal.condition.checked == false) {
        alert('pls. agree the term and condition of this hotel');
        return false;
      }
      if ((a == "Firstname" || a == "") || (b == "lastname" || b == "") || (c == "City" || c == "") || (d == "address" || d == "") || (e == "dateofbirth" || e == "") || (f == "Zip" || f == "") || (g == "Phone" || g == "") || (h == "username" || h == "") || (j == "password" || j == "")) {
        alert("all field are required!");
        return false;
      }




      // else
      // {
      // return true;
      // }

    }
  </script>
  <!--/.container-->
  <script language="javascript" type="text/javascript">
    function OpenPopupCenter(pageURL, title, w, h) {
      var left = (screen.width - w) / 2;
      var top = (screen.height - h) / 4; // for 25% - devide by 4  |  for 33% - devide by 3
      var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    }
  </script>
</body>

</html>