<!-- sidebar -->
<div class="cr-sidebar-overlay"></div>
<div class="cr-sidebar" data-mode="light">
  <div class="cr-sb-logo">
    <a href="<?php echo BASEURL?>/dashboard" class="sb-full">
      <?php linkIMG('assets/img/logo.png', '', 'logo', '', '') ?>
    <a href="<?php echo BASEURL?>/dashboard" class="sb-collapse"><?php linkIMG('assets/img/logo.png', '', 'logo', '', '') ?></a>
  </div>
  <div class="cr-sb-wrapper">
    <div class="cr-sb-content">
      <ul class="cr-sb-list">
        <li class="cr-sb-item">
          <a href="<?php echo BASEURL?>/dashboard" class="cr-page-link">
            <i class="ri-dashboard-3-line"></i><span class="condense">Dashboard</span>
          </a>
        </li>
        <li class="cr-sb-item-separator"></li>
        <li class="cr-sb-title condense">Modules</li>
        <li class="cr-sb-item sb-drop-item">
          <a href="javascript:void(0)" class="cr-drop-toggle">
            <i class="ri-pages-line"></i><span class="condense">Cateory Manage<i
                class="drop-arrow ri-arrow-down-s-line"></i></span></a>
          <ul class="cr-sb-drop condense">
            <li>
              <a href="<?php echo BASEURL?>/categorycontrol" class="cr-page-link drop">
                <i class="ri-checkbox-blank-circle-line"></i></i>Category List
              </a>
            </li>
          </ul>
        </li>
        <li class="cr-sb-item sb-drop-item">
          <a href="javascript:void(0)" class="cr-drop-toggle">
            <i class="ri-pages-line"></i><span class="condense">Product Manage<i
                class="drop-arrow ri-arrow-down-s-line"></i></span></a>
          <ul class="cr-sb-drop condense">
            <li>
              <a href="<?php echo BASEURL?>/productcontrol" class="cr-page-link drop">
                <i class="ri-checkbox-blank-circle-line"></i></i>Product List
              </a>
            </li>
          </ul>
        </li>
        <li class="cr-sb-item sb-drop-item">
          <a href="javascript:void(0)" class="cr-drop-toggle">
            <i class="ri-pages-line"></i><span class="condense">Customer Manage<i
                class="drop-arrow ri-arrow-down-s-line"></i></span></a>
          <ul class="cr-sb-drop condense">
            <li>
              <a href="<?php echo BASEURL ;?>/customercontrol" class="cr-page-link drop">
                <i class="ri-checkbox-blank-circle-line"></i></i>Customer List
              </a>
            </li>
          </ul>
        </li>
        <li class="cr-sb-item sb-drop-item">
          <a href="javascript:void(0)" class="cr-drop-toggle">
            <i class="ri-pages-line"></i><span class="condense">Order Manage<i
                class="drop-arrow ri-arrow-down-s-line"></i></span></a>
          <ul class="cr-sb-drop condense">
            <li>
              <a href="<?php echo BASEURL ;?>/ordercontrol" class="cr-page-link drop">
                <i class="ri-checkbox-blank-circle-line"></i></i>Order List
              </a>
            </li>
          </ul>
        </li>
        <li class="cr-sb-item-separator"></li>
      </ul>
    </div>
  </div>
</div>