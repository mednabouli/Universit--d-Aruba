<?php 
    require "scripts/pi-hole/php/header.php";

?>

<!--
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-info margin-bottom pull-right">Refresh Data</button>
    </div>
</div>
-->

<div class="row">
    <div class="col-md-12">
      <div class="box" id="recent-queries">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $lang['canoe']; ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">

<table id="boat" class="display table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th><?php echo $lang['Name']; ?></th>
                <th><?php echo $lang['Price']; ?></th>
                <th><?php echo $lang['Color']; ?></th>
                <th><?php echo $lang['Last']; ?></th>
                <th><?php echo $lang['Action']; ?></th>
            </tr>
        </thead>
 
</table>
            </div>
       </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
<!-- /.row -->

<?php
    require "scripts/pi-hole/php/footer.php";
?>



<script src="scripts/vendor/moment.min.js"></script>
<script src="scripts/pi-hole/js/canoe.js"></script>
