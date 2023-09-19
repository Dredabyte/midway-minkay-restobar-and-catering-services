<?php

$_SESSION['id'] = $_GET['id'];
$rm = new Accomodation();
$result = $rm->single_accomodation($_SESSION['id']);

?>
<form class="form-horizontal well span6" action="controller.php?action=edit" method="POST">

  <fieldset>
    <legend>Update Accomodation</legend>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accomodation_name">Name:</label>

        <div class="col-md-8">
          <input name="accomodation_id" type="hidden" value="<?php echo $result->accomodation_id; ?>">
          <input class="form-control input-sm" id="accomodation_name" name="accomodation_name" placeholder="Account Name" type="text" value="<?php echo $result->accomodation_name; ?>">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accomodation_description">Description:</label>

        <div class="col-md-8">
          <input class="form-control input-sm" id="accomodation_description" name="accomodation_description" placeholder="Description" type="text" value="<?php echo $result->accomodation_description; ?>">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="idno"></label>

        <div class="col-md-8">
          <button class="btn btn-primary" name="save" type="submit">Save</button>
        </div>
      </div>
    </div>


  </fieldset>


</form>


</div><!--End of container-->


<?php unset($_SESSION['id']) ?>