<div class="container span12">
  <div class="row-fluid">
    <form name="updateprofile" class="form-horizontal" action="db/updateProfile.php" method="post">
      <div class="control-group">
        <div class="controls">
          <h3 class="span12 pull-left">Edit Your Information</h3>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="firstname"><strong>First name</strong></label>
        <div class="controls">
          <input type="text" name="firstname" placeholder="First name" value="Ryan">                
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="lastname"><strong>Last name</strong></label>
        <div class="controls">
          <input type="text" name="lastname" placeholder="Last name" value="Trenholm">                
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="sex"><strong>Sex</strong></label>
        <div class="controls">
          <input type="text" name="sex" placeholder="Sex"  value="Male">                
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="birthday"><strong>Birthday</strong></label>
        <div class="controls">
          <input type="date" name="birthday" value="1988-04-01">                
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="username"><strong>Username</strong></label>
        <div class="controls">
          <input type="text" name="username" placeholder="Username" value="ryanthefierceknight">                
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password"><strong>Password</strong></label>
        <div class="controls">
          <input type="password" name="password" placeholder="Password" value="123456">                
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="confirmpassword"><strong>Confirm password</strong></label>
        <div class="controls">
          <input type="password" name="confirmpassword" placeholder="Confirm New Password">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-success">Update account</button>
          <button type="reset" class="btn">Reset</button>
        </div>
      </div>
    </form>
  </div>
</div>