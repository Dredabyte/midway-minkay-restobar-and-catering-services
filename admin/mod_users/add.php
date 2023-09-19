<form class="form-horizontal well span6" action="controller.php?action=add" method="POST">

  <fieldset>
    <legend>New User Account</legend>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="name">Name:</label>

        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="name" name="name" placeholder="Account Name" type="text" value="">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="username">Username:</label>

        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="username" name="username" placeholder="Username" type="text" value="">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="password">Password:</label>

        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="password" name="password" placeholder="Account Password" type="Password" value="">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="role">Role:</label>

        <div class="col-md-8">
          <select class="form-control input-sm" name="role" id="role">
            <option value="Administrator">Administrator</option>
            <option value="Guest In-charge">Guest In-charge</option>
            <!-- <option value="Encoder">Encoder</option> -->
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="phone">Contact #::</label>

        <div class="col-md-8">
          <input name="deptid" type="hidden" value="">
          <input class="form-control input-sm" id="phone" name="phone" placeholder="Contact #:" type="text" value="">
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