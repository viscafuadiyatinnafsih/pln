<?php $this->load->view('pengadaan/header.php')?>
 <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dana Pengadaan</h2>   
                        <h5>Welcome, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                 <!-- /. menampilkan nama dan nilai penugasan  -->
                <table>
                <tr>
                    <th>Nama Penugasan</th>
                    <td>:</td>
                    <td><?= $penugasan->nama_penugasan ?></td>
                </tr>
                <tr>
                    <th>Nilai Pengadaan</th>
                    <td>:</td>
                    <td>Rp.<?= number_format($penugasan->nilai_pengadaan,0,',','.') ?>,-</td>
                </tr>
                </table>
                <p>

                <div class="form-group row" align="left">
                <div class="col-sm-12 ml-auto">
                    <a href="<?php echo site_url("pengadaan/danapengadaan/create/{$penugasan->id_datapenugasan}")?>" class="btn btn-success">Tambah</a>
                </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Dana Pengadaan
                        </div>
                        <div class="panel-body">
                             <!-- /. CARI DATA  -->
                        <form align="right" action="" method="POST">
                        Search : <input type="text" name="query" placeholder="cari data"/>
                        </form><br>
                            <div class="table-responsive">
                                <?php if ($hasil):?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><center><b>No.</th>
                                            <th><center><b>Uraian</th>
                                            <th><center><b>Tanggal Transaksi</th>
                                            <th><center><b>Vendor</th>
                                            <th><center><b>Nomor Kontrak</th>
                                            <th><center><b>Nilai Kontrak</th>
                                            <th colspan="2"><center>Aksi</th>
                                        </tr>
                                     </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($hasil as $row):?>
                                        <tr>
                                            <td><center><?php echo $i?>.</td>
                                            <td><center><?php echo $row->uraian?></td>
                                            <td><center><?php echo $row->tanggal_pengadaan?></td>
                                            <td><center><?php echo $row->vendor?></td>
                                            <td><center><?php echo $row->nomor_kontrak?></td>
                                            <td><center>Rp.<?php echo number_format($row->nilai_kontrak,0,',','.')?>,-</td>
                                            
                                            <td><center><a class="btn btn-default" title="Edit" href="<?php echo site_url("pengadaan/danapengadaan/edit/$row->id_danapengadaan")?>"><i class="fa fa-edit "></i></a></td>

                                            <td><center><a onclick="return confirm('Yakin data anda ingin di hapus?')" class="btn btn-default" title="Hapus" href="<?php echo site_url("pengadaan/danapengadaan/delete/$row->id_danapengadaan")?>"><i class="fa fa-trash"></i></a></td>
                                           
                                           
                                        </tr>
                                        <?php $i++?>
                                        <?php endforeach?>

                                        <!-- /. SUM  -->
                                        <tr>
                                            <td colspan="5"><center>Jumlah</td>
                                            <td><center>Rp.<?php echo number_format($sum_hasil->nilai_kontrak,0,',','.')?>,-</td>

                                        </tr>

                                        </tbody>
                                        </table>
                                        <?php else: ?>
                                        Tidak ada data
                                        <?php endif?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
<?php $this->load->view('pengadaan/footer.php')?>





                                   