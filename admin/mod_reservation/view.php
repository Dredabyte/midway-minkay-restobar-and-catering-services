<?php
if (!defined('WEB_ROOT')) {
  exit;
}

$code = $_GET['code'];



$query = "SELECT  `firstname` ,  `lastname` ,  `address` ,  `trans_date` ,  `confirmation_code` ,  `p_qty` ,  `price` ,`status`
				FROM  `payment` p,  `guest` g
				WHERE p.`guest_id` = g.`guest_id` AND `confirmation_code`='" . $code . "'";
$mydb->setQuery($query);
$res = $mydb->loadSingleResult();

if ($res->status == 'Confirmed') {
  $stats = '<li class="next"><a href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?action=checkin&code=' . $res->confirmation_code .
    '">Checkin &rarr;</a></li>';
} elseif ($res->status == 'Checkedin') {
  $stats = '<li class="next"><a href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?action=checkout&code=' . $res->confirmation_code .
    '">Checkout &rarr;</a></li>';
} elseif ($res->status == 'Checkedout') {
  $stats = " ";
} else {
  $stats = '<li class="next"><a href="' . WEB_ROOT . 'admin/mod_reservation/controller.php?action=confirm&code=' . $res->confirmation_code .
    '">Confirm &rarr;</a></li>';
}


?>
<div class="container">


  <div class="col-lg-3">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title ">Guest Information</h3>
        <hr />
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a><i class="fa fa-inbox"></i> FIRSTNAME ::
              <span class="pull-right"><?php echo $res->firstname; ?></span></a></li>
          <li class="active"><a><i class="fa fa-envelope-o"></i> LASTNAME ::
              <span class="pull-right"><?php echo $res->lastname; ?></span></a></li>
          <li class="active"><a><i class="fa fa-file-text-o"></i> ADDRESS :: <br />
              <?php echo $res->address; ?> </a></li>

        </ul>
      </div>
      <!-- /.box-body -->
    </div>

  </div>

  <div class="col-lg-9">

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Reservation
          <small>View Rooms</small>
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <?php

    $query = "SELECT * 
				FROM  `reservation` r,  `guest` g,  `room` rm, `accomodation` a
				WHERE r.`room_id` = rm.`room_id` 
				AND a.`accomodation_id` = rm.`accomodation_id` 
				AND g.`guest_id` = r.`guest_id`  AND r.`status`<>'Cancelled'
				AND  `confirmation_code` = '" . $code . "'";
    $mydb->setQuery($query);
    $res = $mydb->loadResultList();

    foreach ($res as $cur) {
      $image = WEB_ROOT . 'admin/mod_room/' . $cur->room_image;
      $day = dateDiff(date($cur->arrival), date($cur->departure));

    ?>

      <!-- Blog Post Row -->
      <div class="row">
        <div class="col-md-3">
          <img class="img-responsive img-hover" src="<?php echo $image; ?>" alt="">
        </div>
        <div class="col-md-6">
          <div class="box box-solid">
            <ul class="nav nav-pills nav-stacked">
              <li>
                <h3>
                  <?php echo $cur->room; ?> [ <small><?php echo $cur->accomodation_name; ?></small> ]
                </h3>
              </li>
              <li></li>
            </ul>

            <p><strong>ARRIVAL: </strong><?php echo date_format(date_create($cur->arrival), 'm/d/Y'); ?></p>
            <p><strong>DEPARTURE: </strong><?php echo date_format(date_create($cur->departure), 'm/d/Y'); ?></p>
            <p><strong>Night(s): </strong><?php echo ($day == 0) ? '1' : $day; ?></p>
            <p><strong>PRICE: </strong><?php echo $cur->r_price; ?></p>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <hr>

    <?php }

    ?>
  </div>
  <!-- Pager -->
  <div class="row">
    <ul class="pager">
      <li class="previous"><a href="<?php echo WEB_ROOT . 'admin/mod_reservation/index.php'; ?>">&larr; Back</a>
      </li>
      <?php echo $stats; ?>
    </ul>
  </div>
  <!-- /.row -->