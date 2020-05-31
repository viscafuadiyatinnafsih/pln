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

                                    <form role="form" method="post" action="<?= site_url()?>/SPV/danapersekot/add">
                                        <input type="hidden" name="id_danapersekot" value="<?php if (@$detail){ echo @$detail->id_danapersekot;} else { echo set_value('id_danapersekot');}?>">


                                        <div class="form-group">
                                            <label>Uraian Kegiatan</label>
                                            <input class="form-control" name="uraian_kegiatan" placeholder="uraian_kegiatan" value="<?php if (@$detail){ echo @$detail->uraian_kegiatan;} else { echo set_value('uraian_kegiatan');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Transaksi</label>
                                            <input type="date" name="tanggal_persekot"  required class="form-control" placeholder="tanggal_persekot" value="<?php if (@$detail){ echo @$detail->tanggal_persekot;} else { echo set_value('tanggal_persekot');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input name="keterangan" type="text" class="form-control" placeholder="keterangan" value="<?php if (@$detail){ echo @$detail->keterangan;} else { echo set_value('keterangan');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="text" name="jumlah" class="form-control" placeholder="jumlah" value="<?php if (@$detail){ echo @$detail->jumlah;} else { echo set_value('jumlah');}?>" />
                                        </div>
                                        
                                        
                                        <input type="submit" class="btn btn-success form-control" name="submit" value="Simpan">

                                    </form>
                                    
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>

                
<?php $this->load->view('SPV/footer.php')?>
