
<?php $menus = array('Dashboard', 'Inquiries', 'Trucks', 'Posts', 'Pages', 'Contact Form', 'Menus', 'Media', 'Settings', 'Testimonials', 'Products', 'Categories', 'Payments','Orders', 'History');?>
<?php $options = array('addelete' => 'Add/Delete Item', 'edit' => 'Edit Item', 'view' => 'View Item');?>

<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="post" id="form-update" autocomplete="off">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="card-subtitle pull-right"><input type="submit" class="btn btn-small btn-info" value="Save"></h6>
                    <h4 class="card-title">System Modules</h4>
                </div>
            </div>
            <!-- Nav tabs Dont remove-->
            <ul class="nav nav-tabs" role="tablist"></ul>
           
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="admin" data-zid="2" role="tabpanel">
                    <input type="hidden" value="2" id="input-admin" name="sys-id">
                        <div class="row p-20">
                            <div class="col-md-12">
                            <h3>All Pages</h3>
                            </div>
                        </div> 
                        <div class="row p-20">
                            <?php foreach($menus AS $v){ 
                                $nm = str_replace(' ','_',$v);
                                ?>
                            <div class="col-md-3 p-b-20"> 
                                <div class="row">
                                    <div class="col-md-12">
                                    <strong><?=$v?></strong>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="switch">
                                            <label>OFF
                                                <input type="checkbox" name="<?=strtolower($nm)?>"><span class="lever switch-col-light-green"></span>ON</label>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <?php } ?> 
                        </div>
                            <hr/>
                        <div class="row p-20">
                        <?php foreach($options AS $k => $v){ ?>
                            <div class="col-md-3 p-b-20"> 
                                <div class="row">
                                    <div class="col-md-12">
                                    <strong><?=$v?></strong>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="switch">
                                            <label>OFF
                                                <input type="checkbox" name="<?=$k?>"><span class="lever switch-col-light-green"></span>ON</label>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <?php } ?> 
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>