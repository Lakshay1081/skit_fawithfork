
    <!-- main content -->
    <div class="cr-main-content">
      <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
          <div class="cr-breadcrumb">
            <h5>Customer Management</h5>
            <ul>
              <li><a href="/dashboard">Dashboard</a></li>
              <li>Today Customer List</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="cr-card card-default product-list">
              <div class="cr-card-content ">
                <div class="table-responsive">
                  <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-dark text-bold">Today customer List</h5>
                  </div>
                  <hr>
                  <table class="table" style="width:100%">
                    <thead>
                      <tr class="text-center">
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Create Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php 
                        $i = 1;
                        foreach ($data['view_customer_data']  as $value) { ?>
                          <tr class="text-center">
                            <td>
                              <?php echo $i;?>
                            </td>
                            <td>
                              <?php echo $value->f_name ;?> <?php echo $value->l_name ;?>
                            </td>
                            <td>
                              <?php echo $value->email ;?>
                            </td>
                            <td>
                              <?php echo $value->con_number ;?>
                            </td>
                            <td>
                              <?php echo $value->create_date ;?>
                            </td>
                            <td>
                              <div class="edit me-2">
                                <a class="btn btn-sm btn-primary status-button" href="<?php echo BASEURL?>/customercontrol/view_details?customer_token=<?php echo $value->customer_token;?>"><i class="fa fa-eye"></i></a>
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