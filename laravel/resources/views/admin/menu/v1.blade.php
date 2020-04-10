<div class="big-box-admin-sub-menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo route('dashboard'); ?>"> <i class="fas fa-tachometer-alt"></i> @lang('admin_menu.admin_menu_dashboard') <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-pen-square"></i> @lang('admin_menu.admin_menu_post')
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo route('ListPost'); ?>">@lang('admin_menu.admin_menu_list_text')</a>
                        <a class="dropdown-item" href="<?php echo route('CreatePost'); ?>">@lang('admin_menu.admin_menu_add_text')</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-file-alt"></i> @lang('admin_menu.admin_menu_page')
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo route('ListPage'); ?>">@lang('admin_menu.admin_menu_list_text')</a>
                        <a class="dropdown-item" href="<?php echo route('CreatePage'); ?>">@lang('admin_menu.admin_menu_add_text')</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-folder"></i> @lang('admin_menu.admin_menu_category')
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo route('ListCategory'); ?>">@lang('admin_menu.admin_menu_list_text')</a>
                        <a class="dropdown-item" href="<?php echo route('CreateCategory'); ?>">@lang('admin_menu.admin_menu_add_text')</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('MediaPage'); ?>"><i class="far fa-image"></i> @lang('admin_menu.admin_menu_media')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('ListUser'); ?>"><i class="far fa-user"></i> @lang('admin_menu.admin_menu_user')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('MenuBuilder'); ?>"><i class="far fa-list-alt"></i> @lang('admin_menu.admin_menu_menu_builder')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo route('DefaultSettingPage'); ?>"><i class="fas fa-cogs"></i> @lang('admin_menu.admin_menu_setting')</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>