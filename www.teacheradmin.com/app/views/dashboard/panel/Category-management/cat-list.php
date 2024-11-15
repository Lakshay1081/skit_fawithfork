<!-- main content -->
<div class="cr-main-content">
  <div class="container-fluid">
    <!-- Page title & breadcrumb -->
    <div class="cr-page-title cr-page-title-2">
      <div class="cr-breadcrumb">
        <h5>Category Management</h5>
        <ul>
          <li><a href="<?php echo BASEURL;?>">Dashboard</a></li>
          <li>Category List</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="cr-card card-default product-list">
          <div class="cr-card-content ">
            <div class="table-responsive">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-dark text-bold">Category List</h5>
                <a class="btn btn-success" href="<?php echo BASEURL;?>/categorycontrol/createcategory">Add Category</a>
              </div>
              <hr>
              <table class="table" style="width:100%">
                <thead>
                  <tr class="text-center">
                    <th>S.No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data['view_cat_list']  as $value) { ?>
                  <tr class="text-center">
                    <td><?php echo $i;?></td>
                    <td>
                      <img width="50" height="50" style="object-fit: cover;" src="<?php echo FILE_PATH.'website-control/category-management/'.$value->cat_token.'/'.$value->image?>">
                    </td>
                    <td><?php echo $value->cat_name;?></td>
                    <td><?php echo $value->create_date;?></td>
                    <td>
                      <?php if($value->publish_status == 0) { ?>
                        <span class="btn btn-sm btn-danger status-button">Block</span>
                      <?php } else {?>
                        <span class="btn btn-sm btn-success status-button">Active</span>
                      <?php }?>
                    </td>
                    <td> 
                      <div class="icons d-flex" style="justify-content: center; ">
                        <div class="status me-2">
                          <?php if($value->publish_status == 1) { ?>
                          <div class="edit">
                              <form method="post" action="<?php echo BASEURL;?>/categorycontrol/categoryunpublished">
                                  <input type="hidden" name="cat_token" value="<?php echo $value->cat_token; ?>">
                                  <button class="btn btn-sm btn-success status-button" type="submit">
                                      <i class="fa fa-toggle-on text-white"></i>
                                  </button>
                              </form>
                          </div>
                          <?php } else{?>
                              <div class="edit">
                                  <form method="post" action="<?php echo BASEURL;?>/categorycontrol/categorypublished">
                                      <input type="hidden" name="cat_token" value="<?php echo $value->cat_token; ?>">
                                      <button class="btn btn-sm btn-danger status-button" type="submit">
                                          <i class="fa fa-toggle-off text-white"></i>
                                      </button>
                                  </form>
                              </div>
                          <?php } ?>
                        </div>
                        <div class="edit me-2">
                          <a class="btn btn-sm btn-primary status-button" href="<?php echo BASEURL?>/categorycontrol/view_details?cat_token=<?php echo $value->cat_token;?>"><i class="fa fa-eye"></i></a>
                        </div>
                        <div class="delete">
                            <button class="btn btn-sm btn-danger status-button" data-bs-toggle="modal" href="#deleteRecordModal<?php echo $value->cat_token; ?>">
                                <i class="fa fa-trash"></i>
                            </button>
                            <div class="modal fade zoomIn" id="deleteRecordModal<?php echo $value->cat_token; ?>" tabindex="1" aria-hidden="false">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                        </div>
                                        <div class="modal-body p-5 text-center">
                                            <div class="mt-4 text-center">
                                                <h4 class="fs-semibold">You are sure want to delete?</h4>
                                                <div class="hstack gap-2 justify-content-center remove">
                                                    <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <form method="post" action="<?php echo BASEURL;?>/categorycontrol/cat_delete">
                                                        <input type="hidden" name="cat_token" value="<?php echo $value->cat_token; ?>">
                                                        <button class="btn btn-danger" id="delete-record" type="submit">Yes, Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
