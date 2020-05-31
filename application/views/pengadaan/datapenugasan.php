<?php $this->load->view('pengadaan/header.php')?>
 <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data Penugasan</h2>   
                        <h5>Welcome, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                <div class="form-group row" align="left">
                </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Penugasan
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
                                            <th><center><b>Nama Penugasan</th>
                                            <th><center><b>Nilai Penugasan</th>
                                            <th><center><b>Nilai Pengadaan</th>
                                            <th><center><b>Nomor WBS</th>
                                            <th><center>Deadeline</th>
                                            <th colspan="2"><center><b>Dana</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($hasil as $row):?>
                                        <tr>
                                            <td><center><?php echo $i?>.</td>
                                            <td><center><?php echo $row->nama_penugasan?></td>
                                            <td><center>Rp.<?php echo number_format($row->nilai_penugasan,0,',','.')?>,-</td>
                                            <td><center>Rp.<?php echo number_format($row->nilai_pengadaan,0,',','.')?>,-</td>
                                            <td><center><?php echo $row->no_WBS?></td>
                                            <td><center><?php echo $row->deadline?></td>
                                             <td><center><a class="btn btn-warning" href="<?php echo site_url("pengadaan/danapengadaan/get_pengadaan/$row->id_datapenugasan")?>" title="rincian pengadaan">Pengadaan</a></td>

                                            <!-- /. ROW 
                                           <td><center><a class="btn btn-info" href="<?php echo site_url("pengadaan/danapersekot/get_persekot/$row->id_datapenugasan")?>" title="rincian persekot">Persekot</a></td>  -->
                                           
                                        </tr>
                                        <?php $i++?>
                                        <?php endforeach?>
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
