
  <div  class="row-fluid span12" id="search-bar" name="search-bar">
    <form class="form-search input-append span12">
      <input type="text" class="span11" name="search" id="search" placeholder="Search">
      <div class="btn-group">
        <button class="btn" type="submit"><i class="icon-search"></i></button>
        <button class="btn" type="reset" id="btn-reset" name="btn-reset"><i class="icon-remove"></i></button>
      </div>
    </form>
  </div>
<div class="row-fluid" id="content" name="content">
  <?php include('litter-table.php'); ?>
</div>