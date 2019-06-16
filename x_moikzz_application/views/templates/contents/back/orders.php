<?php defined('BASEPATH') OR exit('No direct script access allowed');?>      
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
                </div> 
                <div class="table-responsive">
                    <table  class="display nowrap table table-hover table-striped table-bordered <?=$pages; ?>" cellspacing="0" width="100%">
                        <thead>
                            <tr> 
                             
                                <th>Name</th>
                                <th>School</th>
                                <th>Meal/Product</th>
                                <th>Price</th> 
                                <th>Date</th> 
                            </tr>
                        </thead>
                        <tfoot> 
                            <tr>
                                <th>Name</th>
                                <th>School</th>
                                <th>Meal/Product</th>
                                <th>Price</th> 
                                <th>Date</th> 
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