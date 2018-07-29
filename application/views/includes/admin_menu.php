<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Voucher Pool</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><?php echo anchor('admin/offers/index', '<i class="fa fa-plus-circle"></i>Offers'); ?></li>
        <li><?php echo anchor('admin/offers/recipients', '<i class="fa fa-plus-circle"></i>Recipients'); ?></li>
        <li><?php echo anchor('admin/vouchers/generated_vouchers', '<i class="fa fa-plus-circle"></i>Generated Vouchers'); ?></li>
        <li><?php echo anchor('admin/vouchers/used_vouchers', '<i class="fa fa-plus-circle"></i>Used Vouchers'); ?></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello: <?php echo $username; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><?php echo anchor('logout', '<i class="fa fa-plus-circle"></i>Logout'); ?></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>