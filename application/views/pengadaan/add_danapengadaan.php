 <?php $this->load->view('pengadaan/header.php')?>                
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dana Pengadaan</h2>   

                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dana Pengadaan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                    <br>

                                    <form role="form" method="post" action="<?= site_url("pengadaan/danapengadaan/tambah/{$detail}")?>">
                                        
                                        <input type="hidden" name="id_datapenugasan" value="$detail">
                                        <input type="hidden" name="id_danapengadaan">


                                        <div class="form-group">
                                            <label>Uraian</label>
                                            <input class="form-control" required name="uraian" placeholder="uraian" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Transaksi</label>
                                            <input type="date" name="tanggal_pengadaan"  required class="form-control" placeholder="tanggal_pengadaan" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label>Vendor</label>
                                            <input type="text" name="vendor" required class="form-control" placeholder="vendor" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Kontrak</label>
                                            <input name="nomor_kontrak" type="text" class="form-control" placeholder="nomor_kontrak" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai Kontrak</label>
                                            <input type="number" name="nilai_kontrak"  required class="form-control" placeholder="nilai_kontrak" value="" />
                                        </div>
                                        
                                        <input type="submit" class="btn btn-success form-control" name="submit" value="Simpan">

                                    </form>
                                    
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>

                
<?php $this->load->view('pengadaan/footer.php')?>
