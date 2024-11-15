
<div class="cr-main-content">
  <div class="container-fluid">
    <!-- Page title & breadcrumb -->
    <div class="cr-page-title cr-page-title-2">
      <div class="cr-breadcrumb">
        <h5><a href="<?php echo BASEURL?>/customercontrol" style="background-color: transparent !important; color: #111 !important; border: none;"><i class="fa fa-arrow-left me-2" aria-hidden="true"></i></a>Customer Management</h5>
        <ul>
          <li><a href="<?php echo BASEURL?>">Dashboard</a></li>
          <li><a href="<?php echo BASEURL?>/customercontrol">Customer List</a></li>
          <li>View Customer Details</li>
        </ul>
      </div>
    </div>
    <div class="row cr-category">
      <div class="col-xl-12 col-lg-12">
        <div class="team-sticky-bar">
          <div class="col-md-12">
            <div class="cr-cat-list cr-card card-default mb-24px">
              <div class="cr-card-content">
                <div class="cr-cat-form">
                  <h3>View Customer Details</h3>
                  <?php foreach ($data['customer_view']  as $value) { ?>
                    <form method="post" action="#" enctype="multipart/form-data">
                      <input type="hidden" value="" name="cat_token">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                          <div class="form-group">
                            <label>Name</label>
                            <div class="col-12">
                              <input id="text" class="form-control here slug-title" name="name" type="text"
                                value="<?php echo $value->f_name ;?> <?php echo $value->l_name ;?>" readonly="true">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                          <div class="form-group">
                            <label>Email</label>
                            <div class="col-12">
                              <input class="form-control here set-slug" type="email" name="email"
                                value="<?php echo $value->email ;?>" readonly="true">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                          <div class="form-group">
                            <label>Contact Number</label>
                            <div class="col-12">
                              <input class="form-control here set-slug" type="text" name="con_number"
                                value="<?php echo $value->con_number ;?>" readonly="true">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label>Description</label>
                        <div class="col-12">
                          <textarea id="fulldescription" name="address" cols="40" rows="4" class="form-control"
                            disabled><?php echo $value->address ;?></textarea>
                        </div>
                      </div>
                    </form>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>