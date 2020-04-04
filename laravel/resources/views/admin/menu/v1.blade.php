<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo route('dashboard'); ?>">@lang('admin_menu.admin_menu_dashboard') <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('admin_menu.admin_menu_post')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo route('ListPost'); ?>">List</a>
                    <a class="dropdown-item" href="<?php echo route('CreatePost'); ?>">Add</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @lang('admin_menu.admin_menu_page')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo route('ListPage'); ?>">List</a>
                    <a class="dropdown-item" href="<?php echo route('CreatePage'); ?>">Add</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo route('DefaultSettingPage'); ?>">@lang('admin_menu.admin_menu_setting')</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
