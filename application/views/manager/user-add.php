<?php $this->load->view('manager/header.php')?>                
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Data User</h2>   

                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                   
                                    <br>

                                    <form role="form" method="post" action="<?= site_url()?>/manager/user/add">
                                        <input type="hidden" name="id_user" required value="<?php if (@$detail){ echo @$detail->id_user;} else { echo set_value('id_user');}?>">

                                        <input type="hidden" name="level" value="2">


                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" required name="nama" placeholder="Nama Lengkap" value="<?php if (@$detail){ echo @$detail->nama;} else { echo set_value('nama');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" required class="form-control" placeholder="Username" value="<?php if (@$detail){ echo @$detail->username;} else { echo set_value('username');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="pass" type="password" required class="form-control" placeholder="Password" value="<?php if (@$detail){ echo @$detail->pass;} else { echo set_value('pass');}?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" name="email" required class="form-control" placeholder="E-mail" value="<?php if (@$detail){ echo @$detail->email;} else { echo set_value('email');}?>" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Level</label>
                                             <div class="col-md-12">
                                             <select class="form-control form-control-line" required name="level">
                                                <option value="">-Pilih-</option>
                                                <option value="1">Manager Bagian Produksi</option>
                                                <option value="2">Bagian Pengadaan</option>
                                                <option value="3">Supervisor</option>
                                            </select>
                                            </div>
                                        </div>
                                        <p>
                                        <p>

                                        <input type="submit" class="btn btn-success form-control" name="submit" value="Simpan">

                                    </form>
                                    
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>

                
<?php $this->load->view('manager/footer.php')?>