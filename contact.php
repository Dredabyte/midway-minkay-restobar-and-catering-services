<!-- Contact Section -->
<div id="contact-section">
  <div class="container">
    <div class="section-title center">
      <h3><strong>Contact</strong> us</h3>
      <hr>
      <div class="clearfix"></div>
    </div>
    <div class="col-md-4">
      <h3>Contact Info</h3>
      <div class="space"></div><br>
      <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>P3A, Tubigan, Initao, Misamis Oriental 9022</p>
      <div class="space"></div><br>
      <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>midway1115@yahoo.com</p>
      <div class="space"></div><br>
      <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>0975-081-5326 | 0927-285-5608</p>
    </div>
    <div class="col-md-8">
      <h3>Leave us a message</h3>
      <form method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" name="submit" class="btn btn-default">Send Message</button>
      </form>
    </div>
  </div>
</div>
<style>
  /* Adjust the font size to make the icons larger */
  .social h4 a i {
    font-size: 70px;
    /* Adjust the size as needed */
  }
</style>
<div id="social-section">
  <div class="container">
    <div class="social">
      <h4>
        <a href="https://www.facebook.com/MidwayMinkayRCSOfficial" target="_blank"><i class="fa fa-facebook"></i>Midway Minkay Restobar & Catering Services</a><br>
      </h4>
    </div>
  </div>
</div>

<?php

require_once("includes/initialize.php");

if (isset($_POST['submit'])) {

  global $mydb;

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "INSERT INTO `message_us` (`message_us_id`, `name`, `email`, `message`) VALUES ('', '$name', '$email', '$message')";

  $mydb->setQuery($sql);
  $mydb->executeQuery();

  message("THANK YOU FOR YOUR FEEDBACKS");

  redirect(WEB_ROOT . "index.php?p=contact");
};
?>