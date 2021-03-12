<!-- Sidebar -->
<div class="sidebar">
<div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-item <?php if(isset($halaman)&&$halaman=='home'){ echo "active";} ?>">
                    <a href="<?php echo base_url();?>Home/">
                        <i class="fas fa-hospital-alt"></i>
                        <p>Medinfras</p>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($halaman)&&$halaman=='apps'){ echo "active";} ?>">
                    <a href="<?php echo base_url();?>Apps/">
                        <i class="fas fa-mobile-alt"></i>
                        <p>Apps</p>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($halaman)&&$halaman=='downloads'){ echo "active";} ?>">
                    <a href="<?php echo base_url();?>Downloads/">
                        <i class="fas fa-cloud-download-alt"></i>
                        <p>Downloads</p>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($halaman)&&$halaman=='vaksin'){ echo "active";} ?>">
                    <a href="<?php echo base_url();?>Vaksin/">
                        <i class="fas fa-syringe"></i>
                        <p>Vaksin</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Point Of Care</h4>
                </li>
                <li class="nav-item <?php if(isset($halaman)&&$halaman=='biliton'){ echo "active";} ?>">
                    <a href="<?php echo base_url();?>Biliton/">
                        <i class="fas fa-car"></i>
                        <p>Honda Biliton</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->