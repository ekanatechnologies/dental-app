<?php include 'header.php';?>

<div class="app-main__outer">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="metismenu-icon pe-7s-diamond icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Flipbooks List
                            <div class="page-title-subheading">Flipbooks List
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body"><h5 class="card-title">Flipbooks <br><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><i class="fa fa-plus"></i> Create Flipbook</a></h5>
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Title</th>
                                        <th>Cover</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr=1; foreach($flipbooks as $row){ ?>
                                    <tr>
                                        <td><?php echo $sr;?></td>
                                        <td><?php echo $row->title;?></td>
                                        <td>
                                        <?php if (!empty($row->cover)) {  ?>        
                                            <div class="widget-content-left">
                                                <img width="40" class="rounded-circle" src="<?php echo base_url('uploads/flipbooks/'); ?><?php echo $row->cover;?>" alt="user-image">
                                            </div>
                                        <?php }else{?>
                                            <div class="widget-content-left">
                                                <img width="40" class="rounded-circle" src="<?php echo base_url('assets/images/avatars/'); ?>4.jpg" alt="user-icon">
                                            </div>
                                        <?php } ?>
                                        </td>                                         
                                        <td> 
                                            <a href="<?php echo base_url() ?>admin/detail/<?php echo $row->id ?>" target="_blank" class="mb-2 mr-2 btn btn-primary">View Flipbook</a>
                                        <?php $status = $row->status; 
                                        if ($status == '1') {?> 
                                            <a href="<?=base_url();?>admin/update_book_status?id=<?php echo $row->id;?>&svalue=1" class="mb-2 mr-2 btn btn-success">Approved</a> &nbsp;    
                                        <?php } else {?> 
                                             <a href="<?=base_url();?>admin/update_book_status?id=<?php echo $row->id;?>&svalue=0" class="mb-2 mr-2 btn btn-danger">Rejected</a>
                                        <?php } ?> 
                                        <a href="<?php echo base_url() ?>admin/delete/<?php echo $row->id ?>" class="mb-2 mr-2 btn btn-danger">Delete</a>                                    
                                    </td>
                                    </tr>
                                    <?php $sr++;} ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include 'footer.php';?>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add PDF</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <form action='<?php echo base_url() ?>admin/save_pdf' method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Title</label>
                        <input id="inputText3" name="title" type="text" class="form-control" placeholder="Title" required="">

                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">File PDF</label>
                        <input id="inputText3" name="pdf" type="file" accept=".pdf" class="form-control" placeholder="Name PDF..." required="">

                    </div>

                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Cover</label>
                        <input id="inputText3" name="cover" type="file" accept="image/*" class="form-control" placeholder="Cover" required="">

                    </div>
                    <!-- <div class="form-group">
                        <label for="inputText3" class="col-form-label">Detail Foto</label>
                        <p>*file yang diterima hanya berekstensi .jpg, .jpeg, .png</p>
                        <input type="file" accept="image/jpg, image/jpeg, image/png" name="foto">

                    </div> -->

                    

                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal Ubah -->
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data</h4>
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                
            </div>
            <form class="form-horizontal" action="<?php echo base_url('cabang/update_pengeluaran')?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Tanggal</label>
                        <div class="col-lg-10">
                            <input type="text" readonly class="form-control" id="tanggal" name="tanggal" placeholder="tanggal">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Jumlah</label>
                        <div class="col-lg-10">
                            <input type="hidden" id="id" name="id">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Id Pengeluaran">
                        </div>
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>  

<!-- END Modal Ubah -->

  <script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#jumlah').attr("value",div.data('jumlah'));
            modal.find('#tanggal').attr("value",div.data('tanggal'));
        });
    });    
</script>  