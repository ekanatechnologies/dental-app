<div class="pagination justify-content-center py-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination err_rmv2 main_pagi2">
            <?php
            if(!empty($total_page)){
                $next = "javascript:void(0)";
                if(empty($page_id)){
                    $prev = "javascript:void(0)";
                    if($total_page > 1){
                        $next = site_url('welcome/product_filter_list/2');
                    }
                }else{ 
                    if($page_id == 1){
                        $prev = site_url('grantee/report-history');
                        if($total_page == $page_id){
                         $nxt_page = "javascript:void(0)";
                     }else{ 
                        $nxt_page = $page_id+1;
                        $nxt_page = site_url('welcome/product_filter_list/'. $nxt_page);
                    }
                    $next = $nxt_page;
                }else{
                    if($page_id >= "2"){
                        $prv_pg = $page_id-1;
                        $prev = site_url('welcome/product_filter_list/'.$prv_pg);    
                    }else{
                        $prev = site_url('welcome/product_filter_list/');    
                    }
                    if($total_page > 1){ 
                        if($total_page == $page_id){
                         $nxt_page = "javascript:void(0)";
                     }else{ 
                        $nxt_page = $page_id+1;
                        $nxt_page = site_url('welcome/product_filter_list/'. $nxt_page);
                    }
                    $next = $nxt_page;
                }
            }
            
        }
        ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo $prev;?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>

        <?php
        for($i =1; $i <= $total_page;$i++){
            if($i == 1){
                $page_link = site_url('welcome/product_filter_list/');
            }else{
                $page_link = site_url('welcome/product_filter_list/'. $i); 
            }
            if($page_id == $i || ($total_page == 1 && empty($page_id))){
                $page_link = "javascript:;" ;
            }
            ?>        
            <li class="page-item <?php if($i == $page_id || ($i == 1 && $page_id == '')){ echo "active"; } ?>"><a class="page-link" href="<?php echo $page_link;?>"><?php echo $i;?></a></li>
            <?php
        } 
        ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo $next;?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
        <?php
    }
    ?>
</ul>
</nav>
</div>