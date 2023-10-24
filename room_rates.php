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



    $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id`   AND `num_person` = " . $_POST['person'];
  } elseif (isset($_GET['q'])) {

    $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id` AND `room`='" . $_GET['q'] . "'";
  } else {
    $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id`";
  }
  $accomodation = ' | ' . @$_GET['q'];
?>



  <div id="accom-title">
    <div class="pagetitle">
      <h1>
        <?php print $title; ?>
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

            <form method="POST" action="index.php?p=rooms">
              <div id="sidebarRight-wrap">
                <div class="row">
                  <div class="col-md-10 block">
                    <h3> Book a Room</h3>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10">

                    <div class="form-group input-group">
                      <label>Arrival</label>
                      <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd" name="arrival" id="date_pickerfrom" value="<?php echo isset($_POST['arrival']) ? $_POST['arrival'] : date('m/d/Y'); ?>" readonly="true" class="date_pickerfrom input-sm form-control">
                      <span class="input-group-btn">
                        <i class="date_pickerto fa  fa-calendar"></i>
                      </span>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group input-group">
                      <label>Departure</label>
                      <input type="text" data-date="" data-date-format="yyyy-mm-dd" data-link-field="any" data-link-format="yyyy-mm-dd" name="departure" id="date_pickerto" value="<?php echo isset($_POST['departure']) ? $_POST['departure'] : date('m/d/Y'); ?>" readonly="true" class="date_pickerto form-control  input-sm">
                      <span class="input-group-btn">
                        <i class="date_pickerto fa  fa-calendar"></i>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-10">
                    <div class="form-group input-group">
                      <label>Person</label>
                      <select class=" form-control input-sm " name="person" id="person">
                        <?php $sql = "SELECT distinct(`num_person`) as 'NumberPerson' FROM `room`";
                        $mydb->setQuery($sql);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          echo '<option value=' . $result->NumberPerson . '>' . $result->NumberPerson . '</option>';
                        }

                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                    <button class="btn monbela-btn  btn-primary btn-sm " name="booknowA" type="submit" id="booknowA">Check Availability </button>
                  </div>
                </div>
              </div>
            </form>

          </div>
          <br />
          <style type="text/css">
            .a a {
              color: white;
            }

            .a li {
              list-style: none;
            }
          </style>
          <div class="row">
            <div id="sidebarRight-wrap">
              <div class="descRoom">
                <div class="row">
                  <div class="col-md-10 block">
                    <h3>Type of Rooms</h3>
                  </div>
                </div>
                <ul class="a">
                  <?php
                  $query = "SELECT distinct(room) FROM `room` ";
                  $mydb->setQuery($query);
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) { ?>
                    <li><a href="<?php echo WEB_ROOT; ?>index.php?p=rooms&q=<?php echo $result->room; ?>">
                        <p><?php echo $result->room; ?></p>
                      </a></li>
                  <?php  } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>