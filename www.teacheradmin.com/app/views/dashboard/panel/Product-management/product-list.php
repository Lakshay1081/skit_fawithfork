
<!-- main content -->
<div class="cr-main-content">
  <div class="container-fluid">
    <!-- Page title & breadcrumb -->
    <div class="cr-page-title cr-page-title-2">
      <div class="cr-breadcrumb">
        <h5>Product Management</h5>
        <ul>
          <li><a href="<?php echo BASEURL;?>">Dashboard</a></li>
          <li>Product List</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="cr-card card-default product-list">
          <div class="cr-card-content ">
            <div class="table-responsive">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-dark text-bold">Product List</h5>
                <a class="btn btn-success" href="<?php echo BASEURL;?>/productcontrol/createproduct">Add Product</a>
              </div>
              <hr>
              <table class="table" style="width:100%">
                <thead>
                  <tr class="text-center">
                    <th>S.No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data['product_manage']  as $value) { ?>
                    <tr class="text-center">
                      <td>
                        <?php echo $i;?>
                      </td>
                      <td>
                        <img width="50" height="50" style="object-fit: cover;" src="<?php echo FILE_PATH.'website-control/product-management/'.$value->product_token.'/'.$value->image?>">
                      </td>
                      <td>
                        <?php echo $value->product_name;?>
                      </td>
                      <td>
                        <?php echo $value->selling_price;?>
                      </td>
                      <td>
                        <?php echo $value->create_date;?>
                      </td>
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
                                <form method="post" action="<?php echo BASEURL;?>/productcontrol/productunpublished">
                                    <input type="hidden" name="product_token" value="<?php echo $value->product_token; ?>">
                                    <button class="btn btn-sm btn-success status-button" type="submit">
                                        <i class="fa fa-toggle-on text-white"></i>
                                    </button>
                                </form>
                            </div>
                            <?php } else{?>
                                <div class="edit">
                                    <form method="post" action="<?php echo BASEURL;?>/productcontrol/productpublished">
                                        <input type="hidden" name="product_token" value="<?php echo $value->product_token; ?>">
                                        <button class="btn btn-sm btn-danger status-button" type="submit">
                                            <i class="fa fa-toggle-off text-white"></i>
                                        </button>
                                    </form>
                                </div>
                            <?php } ?>
                          </div>
                          <div class="delete me-2">
                              <button class="btn btn-sm btn-danger status-button" data-bs-toggle="modal" href="#deleteRecordModal<?php echo $value->product_token; ?>">
                                  <i class="fa fa-trash"></i>
                              </button>
                              <div class="modal fade zoomIn" id="deleteRecordModal<?php echo $value->product_token; ?>" tabindex="1" aria-hidden="false">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                          </div>
                                          <div class="modal-body p-5 text-center">
                                              <div class="mt-4 text-center">
                                                  <h4 class="fs-semibold">You are sure want to delete?</h4>
                                                  <div class="hstack gap-2 justify-content-center remove">
                                                      <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>Close</button>
                                                      <form method="post" action="<?php echo BASEURL;?>/productcontrol/product_delete">
                                                          <input type="hidden" name="product_token" value="<?php echo $value->product_token; ?>">
                                                          <button class="btn btn-danger" id="delete-record" type="submit">Yes, Delete</button>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="edit me-2">
                            <a class="btn btn-sm btn-primary status-button" href="<?php echo BASEURL?>/productcontrol/view_details?product_token=<?php echo $value->product_token;?>"><i class="fa fa-eye"></i></a>
                          </div>
                          
                        </div>
                      </td>
                    </tr>
                  <?php } $i++;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>