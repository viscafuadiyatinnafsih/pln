<?php $this->load->view('manager/header.php')?>
 <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data User</h2>   
                        <h5>Welcome, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

                <div class="form-group row" align="left">
                <div class="col-sm-12 ml-auto">
                    <a href="<?php echo site_url()?>/manager/user/add" class="btn btn-success">Tambah</a>
                </div>
        </div>   


            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data User
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
                                            <th><center><b>Nama</th>
                                            <th><center><b>Username</th>
                                            <th><center><b>Password</th>
                                            <th><center><b>Email</th>
                                            <th><center><b>Level</th>
                                            <th colspan="2"><center><b>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($hasil as $row):?>
                                        <tr>
                                            <td><center><?php echo $i?>.</td>
                                            <td><center><?php echo $row->nama?></td>
                                            <td><center><?php echo $row->username?></td>
                                            <td><center><?php echo $row->pass?></td>
                                            <td><center><?php echo $row->email?></td>
                                            <td><center><?php echo $row->level?></td>
                                             <td><center><a class="btn btn-default"  title="edit" href="<?php echo site_url("manager/user/add/$row->id_user")?>"><i class="fa fa-edit "></i></a></td>

                                            <td><center><a onclick="return confirm('Yakin data anda ingin di hapus?')" class="btn btn-default" title="hapus" href="<?php echo site_url("manager/user/delete/$row->id_user")?>"><i class="fa fa-trash"></i></a></td>
                                            
                                           
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
<?php $this->load->view('manager/footer.php')?>
