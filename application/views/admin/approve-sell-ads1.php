<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="app-main__outer">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-diamond icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Approve Sell ads
                            <div class="page-title-subheading">This is a list of ads waiting for approval by admin.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Pending ads list</h5>
                            <table id="item-list" class="mb-0 table table-bordered approve-ads">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Ads title</th>
                                        <th>Ads Description</th>
                                        <th>Price</th>
                                        <th>View Ad</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                                 
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#item-list').DataTable({
                    "ajax": {
                        url : "<?=base_url('Sell/get_items');?>",
                        type : 'GET'
                    },
                });
            });
        </script>