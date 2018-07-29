<div class="content-wrapper">
  <section class="content-header">
    <h2>
      All Offers
    </h2>
    <div class="pull-right">
      <?php echo anchor('admin/offers/add', '<i class="fa fa-plus"></i>Add New Offer', array('class' => 'btn btn-primary')); ?>
    </div>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Offers</a></li>
      <li class="active">View</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="small-box bg-red"><?php if(isset($_SESSION['message'])){echo '<div class="inner alert alert-success">'.$_SESSION['message'].'</div>';}?></div>
        <div class="box">
          <div class="box-body">
            
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Discount</th>
                  <th>Date Created</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($offers as $offer){
                      //$record['class'];
                      echo '<tr><td> '.$offer->id. '</td>';
                      echo '<td> '.$offer->name. '</td>';
                      echo '<td> '.$offer->description. '</td>';
                      echo '<td> '.$offer->discount. '%</td>';
                      echo '<td> '.$offer->date_created. '</td>';
                      echo '<td> '.$offer->status. '</td></tr>';
                  }
                  ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
  </section>
</div>