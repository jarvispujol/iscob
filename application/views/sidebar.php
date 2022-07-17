<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="sidebar" data-color="azure" data-background-color="white" data-image="<?php echo base_url('/assets/img/sidebar-1.jpg')?>">
    <div class="logo">
        <a href="<?php echo site_url();?>" class="simple-text logo-normal">
            <img src="<?php echo base_url('assets/img/logo.png') ?>" width="150"/>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            {menu}
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url()?>/{url}">
                    <i class="{class}">{icon}</i>
                    <p>{menu_item}</p>
                </a>
            </li>
            {/menu}
        </ul>
        
    </div>
</div>

