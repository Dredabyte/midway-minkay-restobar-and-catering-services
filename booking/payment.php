<?php
date_default_timezone_set('Asia/Manila');
$currentTimestamp = date('Y-m-d H:i:s');

if (!isset($_SESSION['monbela_cart'])) {
  redirect(WEB_ROOT . 'index.php');
}

$count_cart = count($_SESSION['monbela_cart']);

if (isset($_POST['btnsubmitbooking'])) {
  if (isset($_POST['confirmation_code']) && !empty($_POST['confirmation_code'])) {
    $confirmation_code = $_POST['confirmation_code'];
  } else {
    $error_message = "Confirmation code is required.";
    exit;
  }

  if (!isset($_SESSION['guest_id'])) {
    $guest = new Guest();
    $guest->firstname          = $_SESSION['name'];
    $guest->lastname          = $_SESSION['last'];
    $guest->email          = $_SESSION['email'];
    $guest->city           = $_SESSION['city'];
    $guest->address        = $_SESSION['address'];
    $guest->birthdate           = date_format(date_create($_SESSION['dbirth']), 'Y-m-d');
    $guest->phone          = $_SESSION['phone'];
    $guest->nationality    = $_SESSION['nationality'];
    $guest->terms          = 1;
    $guest->username          = $_SESSION['username'];
    $guest->password           = sha1($_SESSION['pass']);
    $guest->zip_code              = $_SESSION['zip'];
    $guest->create();
    $lastguest = $guest->id;
    $_SESSION['guest_id'] =   $lastguest;
  }

  $count_cart = count($_SESSION['monbela_cart']);

  for ($i = 0; $i < $count_cart; $i++) {
    $reservation = new Reservation();
    $reservation->confirmation_code = $confirmation_code;
    $reservation->trans_date = gmdate('Y-m-d H:i:s');
    $reservation->room_id            = $_SESSION['monbela_cart'][$i]['monbelaroomid'];
    $reservation->arrival           = date_format(date_create($_SESSION['monbela_cart'][$i]['monbelacheckin']), 'Y-m-d');
    $reservation->departure         = date_format(date_create($_SESSION['monbela_cart'][$i]['monbelacheckout']), 'Y-m-d');
    $reservation->r_price            = $_SESSION['monbela_cart'][$i]['monbelaroomprice'];
    $reservation->guest_id           = $_SESSION['guest_id'];
    $reservation->purpose          = '';
    $reservation->status            = 'Pending';
    $reservation->create();
    @$tot += $_SESSION['monbela_cart'][$i]['monbelaroomprice'];
  }

  $item = count($_SESSION['monbela_cart']);

  // Your SQL query with the new confirmation code
  $sql = "INSERT INTO `payment` (`trans_date`, `confirmation_code`, `p_qty`, `guest_id`, `price`, `msg_view`, `status`)
  VALUES ('$currentTimestamp', '$confirmation_code', $item, '" . $_SESSION['guest_id'] . "', $tot, 0, 'Pending')";

  $mydb->setQuery($sql);
  $msg = $mydb->executeQuery();

  unset($_SESSION['monbela_cart']);
  unset($_SESSION['pay']);
  unset($_SESSION['from']);
  unset($_SESSION['to']);
  $_SESSION['activity'] = 1;

?>
  <script type="text/javascript">
    alert("Booking is successfully submitted.");
  </script>

<?php
  redirect(WEB_ROOT . "index.php");
}
?>

<div id="accom-title">
  <div class="pagetitle">
    <h1>Billing Details</h1>
  </div>
</div>
<div id="bread">
  <ol class="breadcrumb">
    <li><a href="<?php echo WEB_ROOT; ?>index.php">Home</a> </li>
    <li><a href="<?php echo WEB_ROOT; ?>booking/">Booking Cart</a></li>
    <li class="active">Booking Details</li>
  </ol>
</div>

<form action="index.php?view=payment" method="post" name="personal">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-8 col-sm-4">
        <div class="col-md-12">
          <label>Name:</label>
          <?php echo $_SESSION['name'] . ' ' . $_SESSION['last'];
          ?>
        </div>
        <div class="col-md-12">
          <label>Address:</label>
          <?php echo isset($_SESSION['city']) ? $_SESSION['city'] : ' ' . ' ' . (isset($_SESSION['address'])  ? $_SESSION['address'] : ' '); ?>
        </div>
        <div class="col-md-12">
          <label>Phone #:</label>
          <?php echo $_SESSION['phone']; ?>
        </div>
      </div>
      <div class="col-md-4 col-sm-2">
        <div class="col-md-12">
          <label>Transaction Date:</label>
          <?php echo date("m/d/Y"); ?>
        </div>
        <div class="col-md-12">
          <label>Reference No:</label>
          <input type="text" name="confirmation_code" value="">
        </div>
      </div>
    </div>
    <br>

    <div class="row">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <td>Room</td>
              <td>Arrival</td>
              <td>Departure</td>
              <td>Price</td>
              <td>Night(s)</td>
              <td>Subtotal</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $payable = 0;
            if (isset($_SESSION['monbela_cart'])) {
              $count_cart = count($_SESSION['monbela_cart']);

              for ($i = 0; $i < $count_cart; $i++) {

                $query = "SELECT * FROM `room` r ,`accomodation` a WHERE r.`accomodation_id`=a.`accomodation_id` AND room_id=" . $_SESSION['monbela_cart'][$i]['monbelaroomid'];
                $mydb->setQuery($query);
                $cur = $mydb->loadResultList();
                foreach ($cur as $result) {
            ?>
                  <tr>
                    <td><?php echo  $result->room . ' ' . $result->room_description; ?></td>
                    <td><?php echo  date_format(date_create($_SESSION['monbela_cart'][$i]['monbelacheckin']), "m/d/Y"); ?></td>
                    <td><?php echo  date_format(date_create($_SESSION['monbela_cart'][$i]['monbelacheckout']), "m/d/Y"); ?></td>
                    <td><?php echo  ' &#8369 ' . $result->price; ?></td>
                    <td><?php echo   $_SESSION['monbela_cart'][$i]['monbeladay']; ?></td>
                    <td><?php echo ' &#8369 ' .   $_SESSION['monbela_cart'][$i]['monbelaroomprice']; ?></td>
                  </tr>
            <?php
                  $payable += $_SESSION['monbela_cart'][$i]['monbelaroomprice'];
                }
              }
              $_SESSION['pay'] = $payable;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-8 col-sm-4">
      <div align="left" class="col-md-12">
        <p><b>NOTE: </b> Please make a <u>10% downpayment</u> of your <strong>total billing</strong> amount to the Gcash number provided. Then <u>copy</u> and <u>paste</u> the <b>Reference Number</b> of transaction in the box.</p>
      </div>
      <div align="center" class="col-md-12">
        <a href="<?php echo WEB_ROOT;  ?>images/payment_logo.png"><img class="img-rounded" src="<?php echo WEB_ROOT;  ?>images/payment_logo.png" style="height: 100px;"></a>
      </div>
      <br>
      <div class="row">
        <?php
        if (isset($_SESSION['pay']) && is_numeric($_SESSION['pay'])) {
          $totalAmount = floatval($_SESSION['pay']);

          $tenPercent = $totalAmount * 0.10;

          echo "<h4>10% of your total amount is: &#8369 " . number_format($tenPercent, 2) . "</h4>";
        }
        ?>
      </div>
      <div class="col-md-12">
        <pre>After you've sent the downpayment, please allow a few minutes for your <br>booking to be confirmed.</pre>
      </div>
    </div>
    <div class="row">
      <h3 align="right">Total: &#8369 <?php echo   $_SESSION['pay']; ?></h3>
    </div>
    <div class="pull-right">
      <button type="submit" class="btn btn-primary" align="right" name="btnsubmitbooking">Submit Booking</button>
    </div>
  </div>
</form>