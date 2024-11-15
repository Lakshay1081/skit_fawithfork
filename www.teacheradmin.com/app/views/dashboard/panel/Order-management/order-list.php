
    <!-- main content -->
    <div class="cr-main-content">
      <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
          <div class="cr-breadcrumb">
            <h5>Order Management</h5>
            <ul>
              <li><a href="<?php echo BASEURL?>">Dashboard</a></li>
              <li>Customer List</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="cr-card card-default product-list">
              <div class="cr-card-content ">
                <div class="table-responsive">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-dark text-bold">Order List</h5>
                  </div>
                  <hr>
                  <table class="table" style="width:100%">
                    <thead>
                      <tr class="text-center">
                        <th>S.No.</th>
                        <th>Product Name</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Quntity</th>
                        <th>Price</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                        $i = 1;
                        foreach ($data['order_data']  as $value) { 
                          $data['product_details'] = $this->GetProductDetails($value->product_token);
                          $data['customer_details'] = $this->GetCustomerDetails($value->customer_token);
                          ?>
                          <tr class="text-center">
                            <td>
                              <?php echo $i;?>
                            </td>
                            <td>
                              <?php echo $data['product_details'][0]->product_name ;?>
                            </td>
                            <td>
                              <?php echo $data['customer_details'][0]->f_name ;?> <?php echo $data['customer_details'][0]->l_name ;?>
                            </td>
                            <td>
                              <?php echo $data['customer_details'][0]->con_number ;?>
                            </td>
                            <td>
                              <?php echo $value->quantity ;?>
                            </td>
                            <td>
                              <?php echo $value->total_price ;?>
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