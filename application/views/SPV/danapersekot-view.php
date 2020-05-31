<?php $this->load->view('SPV/header.php')?>
 <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dana Persekot</h2>    
                        <h5>Pembelian Langsung </h5>
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
                    <th>Nilai Pembelian Langsung</th>
                    <td>:</td>
                    <td>Rp.<?= number_format($penugasan->nilai_persekot,0,',','.') ?>,-</td>
                </tr>
                </table>
                <p>

                <div class="form-group row" align="left">
                <div class="col-sm-12 ml-auto">
                    <a href="<?php echo site_url("SPV/danapersekot/create/{$penugasan->id_datapenugasan}")?>"  class="btn btn-success">Tambah</a>
                </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Dana Persekot
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
                                            <th><center><b>Uraian Kegiatan</th>
                                            <th><center><b>Tanggal Transaksi</th>
                                            <th><center><b>Keterangan</th>
                                            <th><center><b>Jumlah</th>
                                            <th colspan="2"><center><b>Aksi</th>
                                        </tr>
                                     </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($hasil as $row):?>
                                        <tr>
                                            <td><center><?php echo $i?>.</td>
                                            <td><center><?php echo $row->uraian_kegiatan?></td>
                                            <td><center><?php echo $row->tanggal_persekot?></td>
                                            <td><center><?php echo $row->keterangan?></td>
                                            <td><center>Rp.<?php echo number_format($row->jumlah,0,',','.')?>,-</td>
                                            <td><center><a class="btn btn-default" title="Edit" href="<?php echo site_url("SPV/danapersekot/edit/$row->id_danapersekot")?>"><i class="fa fa-edit"></a></td>
                                            <td><center><a onclick="return confirm('Anda yakin untuk menghapus data?')" class="btn btn-default" title="Hapus" href="<?php echo site_url("SPV/danapersekot/delete/$row->id_danapersekot")?>"><i class="fa fa-trash"></i></a></td>
                                           
                                           
                                        </tr>
                                        <?php $i++?>
                                        <?php endforeach?>

                                        <!-- /. SUM -->
                                        <tr>
                                            <td colspan="4"><center>Jumlah</td>
                                            <td><center>Rp.<?php echo number_format($sum_hasil->jumlah,0,',','.')?>,-</td>

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
<?php $this->load->view('SPV/footer.php')?>





                                   