 <?php $this->load->view('manager/header.php')?>                
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Penugasan</h2>   

                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                 <?php $nilai = $this->session->flashdata('nilai'); ?>
                 <?php if(@$nilai):?>
                    <div class="alert alert-danger"><strong>DANA PENGADAAN DAN NILAI PEMBELIAN LANGSUNG TIDAK SESUAI DENGAN NILAI PENUGASAN</strong></div>
                <?php endif?>
                <?php $nilai1 = $this->session->flashdata('nilai1'); ?>
                 <?php if(@$nilai1):?>
                    <div class="alert alert-danger"><strong>DANA PENGADAAN DAN NILAI PEMBELIAN LANGSUNG TIDAK SESUAI DENGAN NILAI PENUGASAN</strong></div>
                <?php endif?>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Penugasan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <form role="form" method="post" action="<?= site_url()?>/manager/data/add">
                                        <input type="hidden" name="id_datapenugasan" required value="<?php if (@$detail){ echo @$detail->id_datapenugasan;} else { echo set_value('id_datapenugasan');}?>">


                                        <div class="form-group">
                                            <label>Nama Penugasan</label>
                                            <input class="form-control" name="nama_penugasan" placeholder="Nama Penugasan" required value="<?php if (@$detail){ echo @$detail->nama_penugasan;} else { echo set_value('nama_penugasan');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai Penugasan</label>
                                            <input type="number" name="nilai_penugasan" class="form-control" placeholder="Nilai Penugasan" required value="<?php if (@$detail){ echo @$detail->nilai_penugasan;} else { echo set_value('nilai_penugasan');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2">Nilai Pengadaan:</label>
                                            <input type="number" name="nilai_pengadaan" class="" placeholder="Pengadaan" required value="<?php if (@$detail){ echo @$detail->nilai_pengadaan;} else { echo set_value('nilai_pengadaan');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2">Nilai Pembelian Langsung: </label>
                                            <input type="number" name="nilai_persekot" class="" placeholder="Pembelian Langsung" required value="<?php if (@$detail){ echo @$detail->nilai_persekot;} else { echo set_value('nilai_persekot');}?>" />
                                        </div><br>
                                        <div class="form-group">
                                            <label>Nomor WBS</label>
                                            <input name="no_WBS" type="text" class="form-control" placeholder="Nomor WBS" required value="<?php if (@$detail){ echo @$detail->no_WBS;} else { echo set_value('no_WBS');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Deadline</label>
                                            <input type="date" name="deadline" class="form-control" placeholder="Deadline" required value="<?php if (@$detail){ echo @$detail->deadline;} else { echo set_value('deadline');}?>" />
                                        </div>
                                        
                                        <input type="submit" class="btn btn-success form-control" name="submit" value="Simpan">

                                    </form>
                                    
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>

                
<?php $this->load->view('manager/footer.php')?>