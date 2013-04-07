<div class="modal hide fade" tabindex="-1" id="addDogPanel" name="addDogPanel">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add New Dog</h3>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" id="addDog" name="addDog" action="db/addDog.php" method="post" enctype="multipart/form-data">
      <div class="control-group" id="inputRegistrationField" name="inputRegistrationField">
        <label class="control-label" for="inputRegistration">Registration</label>
        <div class="controls">
          <input type="text" id="inputRegistration" name="inputRegistration" placeholder="Registration">
        </div>
      </div>
      <div class="control-group" id="inputNameField" name="inputNameField">
        <label class="control-label" for="inputName">Name</label>
        <div class="controls">
          <input type="text" id="inputName" name="inputName" placeholder="Name">
        </div>
      </div>
      <div class="control-group" id="inputCallnameField" name="inputCallnameField">
        <label class="control-label" for="inputCallname">Callname</label>
        <div class="controls">
          <input type="text" id="inputCallname" name="inputCallname" placeholder="Callname">
        </div>
      </div>
      <div class="control-group" id="inputGenderField" name="inputGenderField">
        <label class="control-label" for="inputGender">Gender</label>
        <div class="controls">
          <input type="text" id="inputGender" name="inputGender" placeholder="Gender">
        </div>
      </div>
      <div class="control-group" id="inputSireField" name="inputSireField">
        <label class="control-label" for="inputSire">Sire</label>
        <div class="controls">
          <input type="text" id="inputSire" name="inputSire" placeholder="Sire">
        </div>
      </div>
      <div class="control-group" id="inputDameField" name="inputDameField">
        <label class="control-label" for="inputDame">Dame</label>
        <div class="controls">
          <input type="text" id="inputDame" name="inputDame" placeholder="Dame">
        </div>
      </div>
      <div class="control-group" id="inputDateOfBirthField" name="inputDateOfBirthField">
        <label class="control-label" for="inputDateOfBirth">Date of Birth</label>
        <div class="controls">
          <input type="date" id="inputDateOfBirth" name="inputDateOfBirth" placeholder="Date of Birth">
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer control-group">
    <button form="addDog" type="submit" class="btn btn-success">Add dog</button>
    <button form="addDog" type="reset" class="btn btn-danger" id="cancelBtn" name="cancelBtn" data-dismiss="modal" aria-hidden="true">Cancel</button>
  </div>
</div>