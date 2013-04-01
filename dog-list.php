<div class="row-fluid" id="content" name="content">
  <div  class="row-fluid " id="search-bar" name="search-bar">
    <form class="form-search input-append span12">
      <input type="text" class="span11" name="search" id="search" placeholder="Search">
      <button type="button" class="btn"><i class="icon-search"></i> Search</button>
    </form>
  </div>
  <div class="row-fluid" id="dog-list" name="dog-list">
    <table class="tablesorter table table-striped table-hover" id="dogTable" name="dogTable">
      <thead>
        <tr>
          <th>Registration <i class="icon-sort" name="sort"></i></th>
          <th>Name <i class="icon-sort" name="sort"></i></th>
          <th>Callname <i class="icon-sort" name="sort"></th>
          <th>Gender <i class="icon-sort" name="sort"></th>
          <th>Date of Birth <i class="icon-sort" name="sort"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          // Retrieve the list from the database and build the option list
          include('db/getDogs.php');
          
          foreach ($dogs as $document) {
                  echo '<tr><td>' . $document['registration']
                   . '</td><td><a href="welcome.php">' . $document['name'] 
                   . '</a></td><td>' . $document['callname'] 
                   . '</td><td>' . $document['gender'] 
                   . '</td><td>' . $document['date_of_birth'] 
                   . '</td></tr>';
          }
        ?>
        <tr>
          <td>2</td><td>hello</td><td>sample</td><td>male</td><td>2012-02-02</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row-fluid" id="dog-detail" name="dog-detail" style="display:none;">

  </div>
</div>