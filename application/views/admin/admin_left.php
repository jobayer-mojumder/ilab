<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="header text-center"> CONTROL PANEL</li>
        <li class="treeview <?php echo substr($this->uri->segment(1) , 0, 10) == 'user_admin' ? 'active' : '' ?>"><a href="#"><i class="fa fa-lock"></i> <span>Authentication/Security</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                <li class="<?php echo substr($this->uri->segment(2) , 0, 4) == 'user' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('user_admin/user'); ?>"> <i class="fa fa-angle-right text-blue" style="width:5px"></i> User List</a>
                </li>
                <li class="<?php echo substr($this->uri->segment(2) , 0, 5) == 'group' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('user_admin/group'); ?>"> <i class="fa fa-angle-right text-blue" style="width:5px"></i> Group List</a>
                </li>
                <li class="<?php echo substr($this->uri->segment(2) , 0, 7) == 'history' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('user_admin/history'); ?>"> <i class="fa fa-angle-right text-blue" style="width:5px"></i> Login History</a>
                </li>
            </ul>
        </li>

        <li class="<?php echo substr($this->uri->segment(1) , 0, 14) == 'products_admin' ? 'active' : '' ?>"><a href="<?=site_url('products_admin/product')?>"><i class="fa fa-lock"></i> <span>Products</span></a></li>


    </ul>
</section>