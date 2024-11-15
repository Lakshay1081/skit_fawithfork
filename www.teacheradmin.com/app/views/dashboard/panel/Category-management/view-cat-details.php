
    <div class="cr-main-content">
      <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
          <div class="cr-breadcrumb">
            <h5><a href="<?php echo BASEURL?>/categorycontrol" style="background-color: transparent !important; color: #111 !important; border: none;"><i class="fa fa-arrow-left me-2" aria-hidden="true"></i></a>Category Management</h5>
            <ul>
              <li><a href="<?php echo BASEURL?>">Dashboard</a></li>
              <li><a href="<?php echo BASEURL?>/categorycontrol">Categoy List</a></li>
              <li>View Category Details</li>
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
                      <h3>View Category Details</h3>
                      <?php 
                      foreach ($data['cat_list']  as $value) { ?>
                        <form method="post" action="<?php echo BASEURL?>/categorycontrol/update_details" enctype="multipart/form-data">
                          <input type="hidden" value="<?php echo $value->cat_token?>" name="cat_token">
                          <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                              <div class="form-group">
                                <label>Name</label>
                                <div class="col-12">
                                  <input id="text" class="form-control here slug-title" name="cat_name" type="text"
                                    value="<?php echo $value->cat_name?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                              <div class="form-group">
                                <label>Image</label>
                                <div class="col-12">
                                  <input class="form-control here set-slug" type="file" name="image"
                                    value="<%= abc.image %>">
                                </div>
                                <img src="<?php echo FILE_PATH.'website-control/category-management/'.$value->cat_token.'/'.$value->image?>" alt="" width="100px" style="margin-top: 10px;">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label>Description</label>
                            <div class="col-12">
                              <textarea id="fulldescription" name="cat_des" cols="40" rows="4"
                                class="form-control"><?php echo $value->cat_des?></textarea>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 d-flex">
                              <button type="submit" class="btn btn-success">Update</button>
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