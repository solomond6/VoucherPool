<div class="content-wrapper">
  <section class="content-header">
    <h2>
      My Offers
    </h2>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Offers</a></li>
      <li class="active">My Offers</li>
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
                  <th>Offer Name</th>
                  <th>Discount</th>
                  <th>Voucher Code</th>
                  <th>Status</th>
                  <th>Expiry Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($myoffers as $myoffer){
                      //$record['class'];
                      if($myoffer->status == 1){ 
                        $status = '<i class="glyphicon glyphicon-ok"></i>';
                      }else{
                        $status = '<i class="glyphicon glyphicon-remove"></i>';
                      }
                      echo '<tr><td> '.$myoffer->name. '</td>';
                      echo '<td> '.$myoffer->discount. '%</td>';
                      echo '<td> '.$myoffer->code. '</td>';
                      echo '<td> '.$status.'</td>';
                      echo '<td> '.$myoffer->expiry_date. '</td></tr>';
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