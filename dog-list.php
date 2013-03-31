<div class="container span12">
  <div class="row-fluid">
    <div id="search-bar" name="search-bar" class="span12">
      <form class="form-search span12 input-append">
        <input type="text" class="span11 data_field" name="search" id="search" placeholder="Search">
        <button type="button" class="btn"><i class="icon-search"></i> Search</button>
      </form>
    </div>
  </div>
  <div class="row-fluid">
    <div id="result-list" name="result-list">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Registration</th>
            <th>Name</th>
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
                    echo '<tr><td>' . $document['registration']
                     . '</td><td>' . $document['name'] 
                     . '</td><td>' . $document['callname'] 
                     . '</td><td>' . $document['gender'] 
                     . '</td><td>' . $document['date_of_birth'] 
                     . '</td></tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
