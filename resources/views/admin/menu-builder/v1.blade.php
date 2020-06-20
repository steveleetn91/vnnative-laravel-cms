@extends('admin.layouts.v1')
@section('content')
<!-- section title --> 
@section('title_page')
@lang('general.title_menu_builder_page')
@endsection 
<!-- sub title --> 
@section('sub_title_page')
@lang('general.sub_title_menu_builder_page')
@endsection 
<div class="container">
    <div class="box-menu-builder">
        <!-- Start menu box -->
            <div class="row">
            
                <div class="col-md-6">
                <?php 
      if(session('save_menu_builder_status') === true) {
          session()->forget('save_menu_builder_status');
          ?>
          <div class="alert alert-success">
              @lang('menu_builder.save_menu_builder_status_successfully')
          </div>
          <?php
      } else if(session('save_menu_builder_status') === false) {
        session()->forget('save_menu_builder_status');
        ?>
        <div class="alert alert-danger">
            @lang('menu_builder.save_menu_builder_status_failed')
        </div>
        <?php
      }
    ?>
                    <div class="card mb-3">
                        <div class="card-header"><h5 class="float-left">@lang('menu_builder.menu_builder_text')</h5>
                            
                        </div>
                        <div class="card-body">
                            <ul id="myEditor" class="sortableLists list-group">
                            </ul>
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <form method="post" action="<?php echo route('SaveMenuBuilder'); ?>" id="form_builder">
                                <div class="float-right">
                                    <button id="btnOutput" type="button" class="btn btn-success"><i class="fas fa-check-square"></i> @lang('menu_builder.menu_builder_save')</button>
                                </div>
                                </div>
                                <div class="card-body" style="display:none">
                                    <div class="form-group">
                                        <textarea id="out" class="form-control" name="menu_builder" 
                                        cols="50" rows="10"><?php echo $data; ?></textarea>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-primary text-white">@lang('menu_builder.menu_builder_edit_item')</div>
                        <div class="card-body">
                            <form id="frmEdit" class="form-horizontal">
                                <div class="form-group">
                                    <label for="text">Text</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                                        <div class="input-group-append">
                                            <button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="icon" class="item-menu">
                                </div>
                                <div class="form-group">
                                    <label for="href">URL</label>
                                    <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
                                </div>
                                <div class="form-group">
                                    <label for="target">Target</label>
                                    <select name="target" id="target" class="form-control item-menu">
                                        <option value="_self">Self</option>
                                        <option value="_blank">Blank</option>
                                        <option value="_top">Top</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Tooltip</label>
                                    <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="btnUpdate" 
                            class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> @lang('menu_builder.menu_builder_update')</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> @lang('menu_builder.menu_builder_add')</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Menu box --> 
    </div>
    <div class="css-data">
        <link rel="stylesheet" type="text/css" href="/menu-builder/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
    </div>
    <div class="js-data">
        
        
        <script type="text/javascript" src="/menu-builder/jquery-menu-editor.min.js"></script>
        <script type="text/javascript" src="/menu-builder/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js"></script>
        <script type="text/javascript" src="/menu-builder/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
        <script>
            $(document).ready(function () {
                /* =============== DEMO =============== */
                // menu items
                var arrayjson = <?php echo $data; ?>;
                // icon picker options
                var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
                // sortable list options
                var sortableListOptions = {
                    placeholderCss: {'background-color': "#cccccc"}
                };

                var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
                editor.setForm($('#frmEdit'));
                editor.setUpdateButton($('#btnUpdate'));
                editor.setData(arrayjson);

                $('#btnOutput').on('click', function () {
                    var str = editor.getString();
                    $("#out").text(str);
                    setTimeout(() => {
                        /**
                         * Submit form 
                         */
                        $("#form_builder").submit();
                    },500);
                });

                $("#btnUpdate").click(function(){
                    editor.update();
                });

                $('#btnAdd').click(function(){
                    editor.add();
                });
                /* ====================================== */
            });
        </script>
    </div>
</div>
@endsection