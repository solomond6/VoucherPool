<div class="content-wrapper">
  <section class="content-header">
    <h1>
      New Offer
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Offers</a></li>
      <li class="active">New</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <?php echo form_open('admin/offers/add'); ?>
        <div class="small-box bg-red"><?php if(isset($_SESSION['message'])){echo '<div class="inner alert alert-danger">'.$_SESSION['message'].'</div>';}?></div></div></div>
          <div class="col-md-6">
            <div class="box box-primary form-horizontal">
              <div class="box-body">
                <h3>Offer Details</h3>
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Offer Name" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Description</label>
                  <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Discount</label>
                  <input type="text" name="discount" class="form-control" placeholder="Discount" required>
                </div>
                <div class="form-group">
                  <button type="Submit" class="btn btn-primary form-control">Submit</button>
                </div>
              </div>
            </div>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </section>
</div>