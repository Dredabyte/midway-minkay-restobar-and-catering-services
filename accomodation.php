<?php
$msg = "";

if (isset($_POST['booknow'])) {

  $days = 0;
  $day = dateDiff($_SESSION['arrival'], $_SESSION['departure']);

  if ($day <= 0) {
    $totalprice = $_POST['ROOMPRICE'] * 1;
    $days = 1;
  } else {
    $totalprice = $_POST['ROOMPRICE'] * $day;
    $days = $day;
  }

  addtocart($_POST['room_id'], $days, $totalprice, $_SESSION['arrival'], $_SESSION['departure']);

  redirect(WEB_ROOT . 'booking/');
}


if (!isset($_SESSION['arrival'])) {
  $_SESSION['arrival'] = date_create('Y-m-d');
}
if (!isset($_SESSION['departure'])) {
  $_SESSION['departure'] =  date_create('Y-m-d');
}


if (isset($_POST['booknowA'])) {


  $days = dateDiff($_POST['arrival'], $_POST['departure']);

  if ($days <= 0) {
    $msg = 'Available room today';
  } else {
    $msg =  'Available room From:' . $_POST['arrival'] . ' To: ' . $_POST['departure'];
  }


  $_SESSION['arrival'] = date_format(date_create($_POST['arrival']), "Y-m-d");
  $_SESSION['departure'] = date_format(date_create($_POST['departure']), "Y-m-d");



  $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`= a.`accomodation_id` AND `accomodation_name`='" . $_GET['q'] . "' AND `num_person` = " . $_POST['person'];
} elseif (isset($_GET['q'])) {

  $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`= a.`accomodation_id` AND `accomodation_name`='" . $_GET['q'] . "'";
}

$accomodation = ' | ' . $_GET['q'];
?>



<div id="accom-title">
  <div class="pagetitle">
    <h1><?php print $title; ?>
      <small><?php print  $accomodation; ?></small>

    </h1>
  </div>
</div>

<div id="bread">
  <ol class="breadcrumb">
    <li><a href="<?php echo WEB_ROOT; ?>index.php">Home</a>
    </li>
    <li class="active"><?php print $title; ?></li>
    <li style="color: #02aace; float:right"> <?php print  $msg; ?></li>
  </ol>
</div>

<div id="main" class="site-main clr">
  <div id="primary" class="content-area clr">
    <div id="content-wrap">
      <div class="col-lg-9">
        <div class="tabs-wrapper clr">
          <div class="row">

            <?php
            $arrival = $_SESSION['arrival'];
            $departure = $_SESSION['departure'];

            $mydb->setQuery($query);
            $cur = $mydb->loadResultList();
            foreach ($cur as $result) {
              // filtering the rooms
              // ======================================================================================================
              $mydb->setQuery("SELECT * FROM `reservation`     WHERE status<>'Pending' AND ((
            '$arrival' >= DATE_FORMAT(`arrival`,'%Y-%m-%d')
            AND  '$arrival' <= DATE_FORMAT(`departure`,'%Y-%m-%d')
            )
            OR (
            '$departure' >= DATE_FORMAT(`arrival`,'%Y-%m-%d')
            AND  '$departure' <= DATE_FORMAT(`departure`,'%Y-%m-%d')
            )
            OR (
            DATE_FORMAT(`arrival`,'%Y-%m-%d') >=  '$arrival'
            AND DATE_FORMAT(`arrival`,'%Y-%m-%d') <=  '$departure'
            )
            )
            AND room_id =" . $result->room_id);

              $curs = $mydb->loadResultList();
              $resNum = $result->room_num;

              $stats = $mydb->executeQuery();
              $rows = $mydb->fetch_array($stats);
              $status = isset($rows['status']) ? $rows['status'] : '';

              if ($resNum > 0) {
                // Room is available for booking
                $btn = '
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input type="submit" class="btn monbela-btn btn-primary btn-sm" id="booknow" name="booknow" onclick="return validateBook();" value="Book Now!"/>
                    </div>
                </div>
            </div>';
              } else {
                // Room is fully booked
                $btn = '<div style="margin-top:10px; color: rgba(0,0,0,1); font-size:16px;"><strong>Fully Booked</strong></div>';
              }

              // ============================================================================================================================



            ?>
              <form method="POST" action="index.php?p=accomodation">
                <input type="hidden" name="ROOMPRICE" value="<?php echo $result->price; ?>">
                <input type="hidden" name="room_id" value="<?php echo $result->room_id; ?>">
                <div class="container">
                  <div id="roomimg" class="col-md-12 img-portfolio">
                    <div class="wrapper clearfix">
                      <a href="<?php echo WEB_ROOT . 'admin/mod_room/' . $result->room_image; ?>">
                        <figure class="gallery-item">
                          <?php if (is_file('admin/mod_room/' . $result->room_image)) : ?>
                            <img class="img-responsive img-hover" src="<?php echo WEB_ROOT . 'admin/mod_room/' . $result->room_image; ?>">
                          <?php else : ?>
                            <img class="img-responsive img-hover" src="<?php echo WEB_ROOT . 'no-img.png'; ?>">
                          <?php endif; ?>

                          <figcaption class="img-title-active">
                            <h5> &#8369 <?php echo $result->price; ?></h5>
                          </figcaption>
                        </figure>
                      </a>
                      <ul style="font-size:10px">
                        <h4>
                          <p><?php echo $result->room; ?></p>
                        </h4>
                        <li><?php echo $result->accomodation_name; ?></li>
                        <li><?php echo $result->room_description; ?></li>
                        <li>Number Person : <?php echo $result->num_person; ?></li>
                        <li>Remaining Rooms :<?php echo  $resNum; ?></li>
                        <div class="row">
                          <?php echo $btn; ?>
                        </div>
                      </ul>
                    </div>
                  </div>
                </div>
              </form>
            <?php

            }

            ?>

          </div>
        </div>

      </div>

      <div class="col-lg-3">
        <div class="row">
          <?php require_once('sidebar.php'); ?>
        </div>
      </div>

    </div>
  </div>

</div>