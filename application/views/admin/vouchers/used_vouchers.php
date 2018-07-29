<div class="content-wrapper">
  <section class="content-header">
    <h2>
      All Used Vouchers
    </h2>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Vouchers</a></li>
      <li class="active">Used Vouchers</li>
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
                  <th>Code</th>
                  <th>User</th>
                  <th>Date Generated</th>
                  <th>Expiry Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($vouchers as $voucher){
                      //$record['class'];
                      echo '<tr><td> '.$voucher->id. '</td>';
                      echo '<td> '.$voucher->code. '</td>';
                      echo '<td> '.$voucher->name. '</td>';
                      echo '<td> '.$voucher->date_created. '</td>';
                      echo '<td> '.$voucher->expiry_date. '</td></tr>';
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