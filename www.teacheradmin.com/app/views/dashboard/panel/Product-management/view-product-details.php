
    <div class="cr-main-content">
      <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
          <div class="cr-breadcrumb">
            <h5>Product Management</h5>
            <ul>
              <li><a href="<?php echo BASEURL;?>">Dashboard</a></li>
              <li><a href="<?php echo BASEURL;?>/productcontrol">Product List</a></li>
              <li>View Product Details</li>
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
                      <h3>View Product Details</h3>
                      <?php 
                      foreach ($data['product_view']  as $value) { 
                        $data['category_data'] = $this->GetCategoryDetails($value->product_category);
                        ?>
                          <form method="post" action="<?php echo BASEURL;?>/productcontrol/update_details" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $value->product_token?>" name="product_token">
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                  <label>Category Name</label>
                                  <div class="col-12">
                                    <input type="text" value="<?php echo $data['category_data'][0]->cat_name?>" class="form-control" disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                  <label>Product Name</label>
                                  <div class="col-12">
                                    <input class="form-control here set-slug" type="text" name="product_name"
                                      value="<?php echo $value->product_name?>">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                  <label>Cost Price</label>
                                  <div class="col-12">
                                    <input class="form-control here set-slug" type="text" name="cost_price"
                                      value="<?php echo $value->cost_price?>">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                  <label>Product Discount</label>
                                  <div class="col-12">
                                    <select class="form-control" name="discount_per">
                                      <option value="<?php echo $value->discount_per?>">
                                        <?php echo $value->discount_per?>%
                                      </option>
                                      <option value="">Select Discount</option>
                                      <option value="0">0%t</option>
                                      <option value="5">5%</option>
                                      <option value="10">10%</option>
                                      <option value="15">15%</option>
                                      <option value="20">20%</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                  <label>Product Unit</label>
                                  <div class="col-12">

                                    <select class="form-control" name="product_unit">
                                      <option value="<?php echo $value->product_unit?>">
                                        <?php echo $value->product_unit?>
                                      </option>
                                      <option value="">Select Unit</option>
                                      <option value="5">KG</option>
                                      <option value="4pix">4pic</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                  <label>Image</label>
                                  <div class="col-12">
                                    <input class="form-control here set-slug" type="file" name="image"
                                      value="<?php echo $value->image?>">
                                    <img class="mt-2" width="100" style="object-fit: cover;" src="<?php echo FILE_PATH.'website-control/product-management/'.$value->product_token.'/'.$value->image?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label>Description</label>
                              <div class="col-12">
                                <textarea id="fulldescription" name="description" cols="40" rows="4"
                                  class="form-control"><?php echo $value->description?></textarea>
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