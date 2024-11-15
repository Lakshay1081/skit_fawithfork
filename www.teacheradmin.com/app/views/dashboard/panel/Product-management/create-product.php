
    <!-- main content -->
    <div class="cr-main-content">
      <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
          <div class="cr-breadcrumb">
            <h5>Product Management</h5>
            <ul>
              <li><a href="<?php echo BASEURL;?>">Dashboard</a></li>
              <li><a href="<?php echo BASEURL;?>/productcontrol">Product List</a></li>
              <li>Add Product</li>
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
                      <h3>Add New Product</h3>
                      <form method="post" action="<?php echo BASEURL;?>/productcontrol/addproduct" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                              <label>Category Name</label>
                              <div class="col-12">

                                <select class="form-control" name="product_category">
                                  <option value="">Selecrt Category</option>
                                    <?php foreach ($data['category_manage']  as $value) { ?>
                                      <option value="<?php echo $value->cat_token;?>">
                                        <?php echo $value->cat_name;?>
                                      </option>
                                      <?php } ?>
                                </select>

                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                              <label>Product Name</label>
                              <div class="col-12">
                                <input class="form-control here set-slug" type="text" name="product_name">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                              <label>Cost Price</label>
                              <div class="col-12">
                                <input class="form-control here set-slug" type="text" name="cost_price">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                              <label>Product Discount</label>
                              <div class="col-12">
                                <select class="form-control" name="discount_price">
                                  <option value="">Select Discount</option>
                                  <option value="na">0%</option>
                                  <option value="5">5%</option>
                                  <option value="10">10%</option>
                                  <option value="15">15%</option>
                                  <option value="15">20%</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                              <label>Product Unit</label>
                              <div class="col-12">
                                <select class="form-control" name="product_unit">
                                  <option value="">Select Unit</option>
                                  <option value="KG">KG</option>
                                  <option value="4pic">4pic</option>
                                </select>
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                              <label>Image</label>
                              <div class="col-12">
                                <input class="form-control here set-slug" type="file" name="image">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label>Description</label>
                          <div class="col-12">
                            <textarea id="fulldescription" name="description" cols="40" rows="4"
                              class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 d-flex">
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>

                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>