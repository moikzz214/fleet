<form class="form-horizontal">
<div class="row">
    <div class="col-md-12">
        <div class="card card-body p-t-10 p-b-10 p-r-10 p-l-10">
            <div class="form-group m-b-0 m-t-0">
                <div class="col-sm-4">
                    <button type="submit" class="btn text-right btn-sm btn-info waves-effect waves-light">Save</button>
                    <span class="m-l-20 formMsg"> </span>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-body">
            <h3 class="box-title m-b-0"><?=$pageHeader?></h3>
            <p class="text-muted m-b-30 font-13"> This is for Web Administrator </p>
            
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site url</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="" value="<?=base_url()?>" placeholder="<?=base_url()?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site Title</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="" placeholder="Moikzz System">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site Description</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="" placeholder="Web application">
                    </div>
                </div> 

                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Admin Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" value="jacob@gagroup.net" placeholder="johndoe@email.com">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Anyone can register?</label>
                    <div class="col-sm-8">
                        <select class="form-control">
                            <option>No</option>
                            <option>Yes</option> 
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Default Language</label>
                    <div class="col-sm-8">
                        <select class="form-control">
                            <option>English</option>   
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="btn-group col-lg-12 " data-toggle="buttons">
                        <span class="btn btn-info">
                            <input type="checkbox" id="md_sub_profile" class="filled-in chk-col-light-blue">
                            <label class="" for="md_sub_profile">Sub Profile</label>
                        </span>
                        <label class="btn btn-info">
                            <input type="checkbox" id="md_persons" class="filled-in chk-col-light-blue">
                            <label class="" for="md_persons">Persons</label>
                        </label>
                        <label class="btn btn-info">
                            <input type="checkbox" id="md_comments" class="filled-in chk-col-light-blue">
                            <label class="" for="md_comments">Comments</label>
                        </label> 
                    </div>
                </div>
                <div class="form-group row">
                    <div class="btn-group col-lg-12" data-toggle="buttons">
                        <label class="btn btn-info">
                            <input type="checkbox" id="md_category" class="filled-in chk-col-light-blue">
                            <label class="" for="md_category">Categories</label>
                        </label>
                        
                        <label class="btn btn-info">
                            <input type="checkbox" id="md_history" class="filled-in chk-col-light-blue">
                            <label class="" for="md_history">History</label>
                        </label>
                        <label class="btn btn-info">
                            <input type="checkbox" id="md_products" class="filled-in chk-col-light-blue">
                            <label class="" for="md_products">Products</label>
                        </label> 
                    </div>
                </div>
                <div class="form-group row">
                    <div class="btn-group col-lg-12" data-toggle="buttons"> 
                        <label class="btn btn-info">
                            <input type="checkbox" id="md_contact_form" class="filled-in chk-col-light-blue">
                            <label class="" for="md_contact_form">Contact Form</label>
                        </label>
                        <label class="btn btn-info">
                            <input type="checkbox" id="md_testimonial" class="filled-in chk-col-light-blue">
                            <label class="" for="md_testimonial">Testimonials</label>
                        </label>
                    </div>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-body">
        <h3 class="box-title m-b-0"><?=$pageHeader?></h3>
        <p></p>
            
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site Logo</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="" placeholder="<?=base_url()?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Site Icon</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="" placeholder="<?=base_url()?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Global Meta Title</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Global Meta Description</label>
                    <div class="col-sm-8">
                    <textarea rows="5"  class="form-control" ></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Global Meta Keywords</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4  control-label col-form-label">Analytics</label>
                    <div class="col-sm-8">
                        <textarea rows="10" class="form-control" placeholder="<script>Put your script here</script>"></textarea>
                    </div>
                </div>
            
        </div>
    </div> 
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-body p-t-10 p-b-10 p-r-10 p-l-10">
            <div class="form-group m-b-0 m-t-0">
                <div class="col-sm-4">
                    <button type="submit" class="btn text-right btn-sm btn-info waves-effect waves-light">Save</button>
                    <span class="m-l-20 formMsg"> </span>
                </div>
            </div>
        </div>
    </div>
</div>
</form>