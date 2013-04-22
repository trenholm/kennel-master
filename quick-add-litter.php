<!-- FIRST NEED: DAME*, SIRE, DATE*, BREED* -->
<!-- THEN FOREACH PUPPY: REG_NUM*, GENDER*, REG_NAME, CALLNAME -->

<div class="modal hide fade" tabindex="-1" id="addLitterPanel" name="addLitterPanel">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add New Litter</h3>
  </div>
  <div class="modal-body">
    <form class="form-horizontal" id="addDog" name="addDog" action="db/addLitter.php" method="post" enctype="multipart/form-data">
      <div class="control-group" id="inputBreedsField" name="inputBreedsField">
        <label class="control-label" for="inputBreeds">Breed</label>
        <div class="controls">
          <select class="chzn-select" type="text" id="inputBreeds" name="inputBreeds" tab-index="-1" data-placeholder="Breed">
            <?php 
            // Retrieve the list from the database and build the option list
            include('db/getBreeds.php');
            
            echo '<option value=""></option>\n';
            foreach ($breeds as $document) {
                    echo '<option value="' . $document['name'] . '">' . $document['name'] . '</option>\n';
            }
            ?>
          </select>
        </div>
      </div>
      <div class="control-group" id="inputDameField" name="inputDameField">
        <label class="control-label" for="inputDame">Dame</label>
        <div class="controls">
          <input type="text" id="inputDame" name="inputDame" placeholder="Dame">
        </div>
      </div>
      <div class="control-group" id="inputSireField" name="inputSireField">
        <label class="control-label" for="inputSire">Sire</label>
        <div class="controls">
          <input type="text" id="inputSire" name="inputSire" placeholder="Sire">
        </div>
      </div>
      <div class="control-group" id="inputBirthdateField" name="inputBirthdateField">
        <label class="control-label" for="inputBirthdate">Date of Birth</label>
        <div class="controls">
          <input type="date" id="inputBirthdate" name="inputBirthdate" placeholder="Date of Birth">
        </div>
      </div>
      <div class="control-group" id="inputPuppiesField" name="inputPuppiesField">
        <label class="control-label" for="inputPuppies">Puppies</label>
        <div class="controls">
          <input type="text" id="inputPuppies" name="inputPuppies" placeholder="Sire">
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer control-group">
    <button form="addDog" type="submit" class="btn btn-success">Add litter</button>
    <button form="addDog" type="reset" class="btn btn-danger" id="cancelBtn" name="cancelBtn" data-dismiss="modal" aria-hidden="true">Cancel</button>
  </div>
</div>