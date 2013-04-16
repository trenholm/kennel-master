
  <div  class="row-fluid span12" id="search-bar" name="search-bar">
    <form class="form-search input-append span12">
      <input type="text" class="span11" name="search" id="search" placeholder="Search">
      <button type="button" class="btn"><i class="icon-search"></i> Search</button>
    </form>
  </div>
<div class="row-fluid" id="content" name="content">
  <div class="row-fluid" id="list-pane" name="list-pane">
    <table class="tablesorter table table-striped table-hover" id="dogTable" name="dogTable">
      <thead>
        <tr>
          <th>Registration #</th>
          <th>Registered Name</th>
          <th>Callname</th>
          <th>Gender</th>
          <th>Date of Birth</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          // Retrieve the list from the database and build the option list
          include('db/getDogs.php');
          
          foreach ($dogs as $document) {
                  echo '<tr class="list-item">';

                  echo '<td id="registration" name="registration">' . $document['registration']
                   . '</td><td id="name" name="name">' . $document['name'] 
                   . '</td><td id="callname" name="callname">' . $document['callname'] 
                   . '</td><td id="gender" name="gender">' . $document['gender'] 
                   . '</td><td id="dateOfBirth" name="dateOfBirth">' . $document['date_of_birth'] 
                   . '</td><td id="sire" name="sire" style="display:none;">' . $document['sire'] 
                   . '</td><td id="dame" name="dame" style="display:none;">' . $document['dame']  
                   . '</td><td id="breed" name="breed" style="display:none;">' . $document['breed']
                   . '</td>';

                   echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
  <?php include('dog-details.php'); ?>
</div>