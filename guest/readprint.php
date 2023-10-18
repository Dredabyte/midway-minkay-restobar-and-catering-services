<?php
require_once("../includes/initialize.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo isset($title) ? $title . ' | Midway Minkay Restobar and Catering Services' :  'Midway Minkay Restobar and Catering Services'; ?></title>


  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/responsive.css">

  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/bootstrap.css">

  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>fonts/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo WEB_ROOT; ?>css/custom-navbar.min.css">

  <!-- DataTables CSS -->
  <!-- <link href="<?php echo WEB_ROOT; ?>css/dataTables.bootstrap.css" rel="stylesheet"> -->

  <link href="<?php echo WEB_ROOT; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo WEB_ROOT; ?>css/datepicker.css" rel="stylesheet" media="screen">

  <link href="<?php echo WEB_ROOT; ?>css/galery.css" rel="stylesheet" media="screen">
  <link href="<?php echo WEB_ROOT; ?>css/ekko-lightbox.css" rel="stylesheet">
</head>

<body onload="window.print();">
  <div class="wrapper">

    <?php

    require_once("../includes/initialize.php");
    $query = "SELECT g.`guest_id`, `firstname`, `lastname`, `address`,`confirmation_code`, `status`, `trans_date`, `arrival`, `departure`, `r_price` FROM `guest` g ,`reservation` r WHERE g.`guest_id`=r.`guest_id` and `confirmation_code` ='" . $_POST['code'] . "'";
    $mydb->setQuery($query);
    $res = $mydb->loadsingleResult();


    ?>
    <form action="<?php echo WEB_ROOT;; ?>guest/readprint.php?>" method="POST" target="_blank">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-globe"></i> Midway Minkay Restobar and Catering Services
              <small class="pull-right">Date: <?php echo date('m/d/Y'); ?></small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Midway Minkay Restobar and Catering Services </strong><br>
              P3A, Tubigan, Initao,<br>
              Misamis Oriental, 9022<br>
              Phone: 0975-081-5326 | 0927-285-5608<br>
              Email: midway1115@yahoo.com
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong><?php echo $res->firstname . ' ' . $res->lastname; ?>
              </strong><br>
              <?php echo $res->address; ?>
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <br />
            <br />
            <b>Reference Number:</b>
            <p style="background-color:blue;color:white"> <?php echo $res->confirmation_code; ?></p>
            <input type="hidden" name="code" value="<?php echo $res->confirmation_code; ?>">
            <br>
            <b>Transaction Date:</b> <?php echo date('F j, Y', strtotime($res->trans_date)); ?>
            <br>
            <br>
            <b>Account #:</b> <?php echo $res->guest_id; ?>
            <br>
            <br>
            <b>STATUS: </b>
            <p style="background-color:#029e11;color:white"> <?php echo $res->status; ?></p>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php

        $query = "SELECT * FROM `accomodation` A,`room`  RM, `reservation` RS  WHERE  A.`accomodation_id`=RM.`accomodation_id` AND RM.`room_id`=RS.`room_id`  and `confirmation_code` ='" . $_POST['code'] . "'";
        $mydb->setQuery($query);
        $res = $mydb->loadResultList();


        ?>
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Room</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Arrival</th>
                  <th>Departure</th>
                  <th>Night(s)</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($res as $result) {
                  $days =  dateDiff(date($result->arrival), date($result->departure));
                ?>

                  <tr>
                    <td><?php echo $result->accomodation_name . ' [' . $result->room . ']'; ?></td>
                    <td><?php echo $result->room_description . ' <br/> Person: ' .  $result->num_person; ?></td>
                    <td> &#8369 <?php echo $result->price; ?></td>
                    <td><?php echo date_format(date_create($result->arrival), 'm/d/Y'); ?></td>
                    <td><?php echo date_format(date_create($result->departure), 'm/d/Y'); ?></td>
                    <td><?php echo ($days == 0) ? '1' : $days; ?></td>
                    <td> &#8369 <?php echo $result->r_price; ?></td>
                  </tr>


                <?php
                  @$tot += $result->r_price;
                } ?>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
          </div>
          <!-- /.col -->
          <div class="col-xs-6">
            <p class="lead">Total Amount</p>

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Total:</th>
                  <td> &#8369 <?php echo @$tot; ?></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
          </div>
        </div>
      </section>
    </form>
    <!-- /.content -->
    <div class="clearfix"></div>

  </div>
  <!-- ./wrapper -->
</body>

</html>