<?php $this->load->view('SPV/header.php')?>
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
                    <th>Nilai Penugasan</th>
                    <td>:</td>
                    <td>Rp.<?= number_format($penugasan->nilai_penugasan,0,',','.') ?>,-</td>
                </tr>
                </table><p>

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
<?php $this->load->view('SPV/footer.php')?>





                                   