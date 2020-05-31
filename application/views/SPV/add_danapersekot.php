 <?php $this->load->view('SPV/header.php')?>                
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dana Persekot</h2>   

                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Tambah
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                    <br>

                                    <form role="form" method="post" action="<?= site_url("SPV/danapersekot/tambah/{$detail}")?>">
                                        
                                        <input type="hidden" name="id_datapenugasan" value="$detail->id_datapenugasan">
                                        <input type="hidden" name="id_danapersekot">


                                        <div class="form-group">
                                            <label>Uraian Kegiatan</label>
                                            <input class="form-control" required name="uraian_kegiatan" placeholder="uraian_kegiatan" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Transaksi</label>
                                            <input type="date" name="tanggal_persekot" required class="form-control" placeholder="tanggal_persekot" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" required class="form-control" placeholder="keterangan" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input name="jumlah" type="number" class="form-control" placeholder="jumlah" value="" />
                                        </div>
                                        
                                        <input type="submit" class="btn btn-success form-control" name="submit" value="Simpan">

                                    </form>
                                    
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>

                
<?php $this->load->view('SPV/footer.php')?>
