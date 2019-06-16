<?php 
$profile_name = 'profile_name';
$profile_email = 'profile_email';
$profile_phone  = 'profile_phone';
$profile_website  = 'profile_website';
$profile_country  = 'profile_country'; 
$profile_state  = 'profile_state';
$profile_address  = 'profile_address';
$profile_fax  = 'profile_fax';
$profile_city  = 'profile_city';
$profile_postal_code  = 'profile_postal_code';

$padd = array('id' => 'inputAddress', 'placeholder' => 'Current Address', 'class' => 'form-control');
$pcode = array('id' => 'inputpostal', 'placeholder' => 'Postal Code', 'class' => 'form-control');
?>
<div class="row">
    <div class="col-md-12">
    <div class="card card-outline-info">
        <div class="card-header">
        <h4 class="m-b-0 text-white"><?=$pageHeader?></h4>                  
        </div>
        <div class="card card-body"> 
            <form class="needs-validation" novalidate="" id="form-profile">
                <div class="form-row">
                <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputFirst" class="col-sm-3 text-right control-label col-form-label">Name*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputFirst"  placeholder="Name" name="<?=$profile_name?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profemail" class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" id="profemail" class="form-control" name="<?=$profile_email?>" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPhone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPhone" placeholder="Phone Number" name="<?=$profile_phone?>">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputWeb" class="col-sm-3 text-right control-label col-form-label">Website</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputWeb" placeholder="Website" name="<?=$profile_website?>">
                            </div>  
                        </div>  
                       
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                            <label for="inputCountry" class="col-sm-3 text-right control-label col-form-label">Country</label>
                            <div class="col-sm-9">
                                <select class="custom-select" id="inputCountry" name="<?=$profile_country?>" required>
                                    <option>United Arab Emirates</option> 
                                </select>
                                <div class="invalid-feedback">You need to select a Country</div>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputState" class="col-sm-3 text-right control-label col-form-label">State</label>
                          
                            <div class="col-sm-9">
                                    <select class="custom-select" id="inputState" name="<?=$profile_state?>" required>
                                        <option value=""> - Select State - </option>
                                        <option value="Abu Dhabi">Abu Dhabi</option> 
                                        <option value="Ajman">Ajman</option>
                                        <option value="Dubai">Dubai</option>
                                        <option value="Fujaira">Fujaira</option>
                                        <option value="Ras al Khaimah">Ras al Khaimah</option>
                                        <option value="Sharjah">Sharjah</option>
                                        <option value="Umm al-Qaiwain">Umm al-Qaiwain</option>
                                    </select>
                                    <div class="invalid-feedback">You need to select a State</div>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="inputAddress" class="col-sm-3 text-right control-label col-form-label">Address</label>
                            <div class="col-sm-9"> 
                                <?php echo form_input($profile_address,'',$padd);  ?> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputpostal" class="col-sm-3 text-right control-label col-form-label">Postal Code</label>
                            <div class="col-sm-9">
                                <?php echo form_input($profile_postal_code,'00000',$pcode); ?> 
                            </div> 
                        </div>
                    </div> 
                </div>
                <div class="row row-pass">
                    <div class="col-md-12">
                        <hr/>
                        <div class="form-group row">
                            <label class="col-sm-1 control-label col-form-label">Username</label>
                            <label id="profUser" class="col-sm-3 control-label col-form-label">-</label> 
                        </div>
                        <div class="form-group row">
                        
                            <label for="inputPass" class="col-sm-1 control-label col-form-label">Password</label>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="inputPass" value="" placeholder="****************************" disabled>    
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-theme text-white" id="basic-addon2">
                                        <i class="fa view-pass"></i>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="checkbox checkbox-primary p-t-0">
                                    <input id="reset-pass" type="checkbox">
                                    <label for="reset-pass"> Reset Password </label>
                                </div>
                            </div>
                            
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Update Profile</button> 
                            </div> 
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>