<?php defined('BASEPATH') OR exit('No direct script access allowed');?>      
<style>
.fa {padding-right: 10px; cursor:pointer;}
</style> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <div class="row button-group">
                <div class="col-xl-1 col-md-2 col-sm-12 "><h4 class="card-title">Lists</h4></div>
                <div class="col-xl-1 col-md-1 col-sm-12 "> 
                    <div class="checkbox checkbox-primary p-t-0">
                        <input id="list-download" type="checkbox">
                        <label for="list-download"> Download </label>
                    </div>
                </div>

                <div class="col-md-10">
                        <a href="<?=get_current_url()?>create" class="btn btn-block btn-sm btn-outline-info col-xl-2 col-md-4 col-sm-12  pull-right">ADD NEW STUDENT</a>
                    </div>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table  class="display nowrap table table-hover table-striped table-bordered <?=$pages; ?>" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="hidden" hidden></th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>School</th>
                                <th>Grade</th>
                                <th>State</th>
                                <th>Account Number</th>
                                <th>Balance</th>
                                <th></th>
                                <th>Actions</th> 
                            </tr>
                        </thead> 
                        <tfoot> 
                            <tr>
                                <th class="hidden" hidden></th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>School</th>
                                <th>Grade</th>
                                <th>State</th>
                                <th>Account Number</th>
                                <th>Balance</th>
                                <th></th>
                                <th>Actions</th> 
                            </tr>
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>