<form class="form-horizontal well span6" action="controller.php?action=add" method="POST">

  <fieldset>
    <legend>New Accomodation</legend>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accomodation_name">Name:</label>

        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="accomodation_name" name="accomodation_name" placeholder="Accomodation" type="text" value="">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="accomodation_description">Description:</label>

        <div class="col-md-8">
          <input class="form-control input-sm" id="accomodation_description" name="accomodation_description" placeholder="Description" type="text" value="">
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