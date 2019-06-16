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
                                <th>Status</th>
                                <th>Ref #</th>
                                <th>Student</th>
                                <th>Amount</th>
                                <th>Date</th> 
                                <th>Payment Invoice</th> 
                            </tr>
                        </thead>
                        <tfoot> 
                            <tr>
                                <th>Status</th>
                                <th>Ref #</th>
                                <th>Student</th>
                                <th>Amount</th>
                                <th>Date</th> 
                                <th>Invoice</th> 
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                            $label = array('warning','success','inverse','danger','info');
                            $xlabel = 0;
                            for($x=1; $x < 50;$x++){ ?>
                            <tr>
                            <td><span class="label label-<?=$label[$xlabel]?>">Approved</span></td>
                                <td>Tiger Nixon<?=$x?></td>
                                <td>CIT - U</td>
                                <td><?=$x?></td>
                                <td><?=date('m/d/Y')?></td> 
                                <td>
                                
                                    <a href="<?=get_current_url()?>invoice"  class="btn btn-sm btn-info">
                                    <i class="fa fa-file-pdf-o" data-toggle="tooltip"   title="EDIT"></i>
                                    </a>
                                </td>
                            </tr> 
                            <?php $xlabel++; if($xlabel == 5){$xlabel = 0;} } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>