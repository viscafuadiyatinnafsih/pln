<?php $this->load->view('SPV/header.php')?>  
 <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dana Penugasan</h2>   
                        <h5>Welcome, Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                 <div class="row no-print">
                 <div class="col-sm-12 ml-auto">
              </div>
            </div>  
 

        <div class="row">
                <div class="form-group"> 
        <form method="post">
        <div class="col-md-3">
          <label>Bulan</label>
            <select class="form-control" name="bln">
            <option value="1" <?php if ($bln == 1) {echo 'selected';} ?>>Januari</option>
            <option value="2" <?php if ($bln == 2) {echo 'selected';} ?>>Februari</option>
            <option value="3" <?php if ($bln == 3) {echo 'selected';} ?>>Maret</option>
            <option value="4" <?php if ($bln == 4) {echo 'selected';} ?>>April</option>
            <option value="5" <?php if ($bln == 5) {echo 'selected';} ?>>Mei</option>
            <option value="6" <?php if ($bln == 6) {echo 'selected';} ?>>Juni</option>
            <option value="7" <?php if ($bln == 7) {echo 'selected';} ?>>Juli</option>
            <option value="8" <?php if ($bln == 8) {echo 'selected';} ?>>Agustus</option>
            <option value="9" <?php if ($bln == 9) {echo 'selected';} ?>>September</option>
            <option value="10" <?php if ($bln == 10) {echo 'selected';} ?>>Oktober</option>
            <option value="11" <?php if ($bln == 11) {echo 'selected';} ?>>November</option>
            <option value="12" <?php if ($bln == 12) {echo 'selected';} ?>>Desember</option>
          </select>
          
        </div>

        

        <div class="col-md-3">
          <label>Tahun</label>
            <select class="form-control" name="thn">
              <?php for($i = 2015; $i <= 2035; $i++) { ?>
            <option value="<?php echo $i; ?>" <?php if ($thn==$i){echo'selected';} ?>><?php echo $i;?></option>
              <?php }; ?>
          </select>
        </div>

        <div class="col-md-6">
          <div>
            <br>

          <button type="submit" name="submit" value="Submit" class="btn btn-md btn-primary">Cari</button>
           </div>
        </div>

        </form>
    </div>
  </div>

    
    <?php
      switch ($bln) {
        case '1':
          $bulan = 'Januari';
          break;
        case '2':
          $bulan = 'Februari';
          break;
        case '3':
          $bulan = 'Maret';
          break;
        case '4':
          $bulan = 'April';
          break;
        case '5':
          $bulan = 'Mei';
          break;
        case '6':
          $bulan = 'Juni';
          break;
        case '7':
          $bulan = 'Juli';
          break;
        case '8':
          $bulan = 'Agustus';
          break;
        case '9':
          $bulan = 'September';
          break;
        case '10':
          $bulan = 'Oktober';
          break;
        case '11':
          $bulan = 'November';
          break;
        case '12':
          $bulan = 'Desember';
          break;

      }
    ?>
            <h4><b><center>Dana Bulan <?= $bulan;?> Tahun <?= $thn;?></center></b></h4>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Dana Penugasan
                    </div>
            <!-- Advanced Tables -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php if ($hasil):?>
                        <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                            <th><center><b>No.</th>
                            <th><center><b>Nomor WBS</th>    
                            <th><center><b>Nama Penugasan</th>
                            <th><center><b>Nilai Penugasan</th>
                            <th><center><b>Nilai Pengadaan</th>
                            <th><center><b>Nilai Persekot</th> 
                            <th><center><b>Realisasi</th>
                            <th><center><b>Sisa Dana</th>
                            <th><center><b>Efisiensi</th>    
                            <th><center><b>Status</th>  
                            <th colspan="2"><center><b>Rincian Dana</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?>
                            <?php foreach ($hasil as $row):?>
                            <tr>
                            <td><center><?php echo $i?>.</td>
                            <td><center><?php echo $row->no_WBS?></td>
                            <td><center><?php echo $row->nama_penugasan?></td>
                            <td><center>Rp.<?php echo number_format($row->nilai_penugasan,0,',','.')?>,-</td>
                            <td><center>Rp.<?php echo number_format($row->jumlah_dana_pengadaan,0,',','.')?>,-</td>
                            <td><center>Rp.<?php echo number_format($row->jumlah_dana_persekot,0,',','.')?>,-</td>
                            <td><center>Rp.<?php echo number_format ($row->jumlah_dana_pengadaan+$row->jumlah_dana_persekot,0,',','.')?>,-</td>
                            <td><center>Rp.<?php echo number_format($row->nilai_penugasan-($row->jumlah_dana_pengadaan+$row->jumlah_dana_persekot),0,',','.')?>,-</td>
                            <td><center><?php echo number_format(($row->nilai_penugasan-($row->jumlah_dana_pengadaan+$row->jumlah_dana_persekot))/$row->nilai_penugasan*100,0,',','.')?>%</td>
                            <td><center><?php echo $row->status?></td>
                            <td><center><a class="btn btn-default" href="<?php echo site_url("SPV/danapengadaan/get_pengadaan/$row->id_datapenugasan")?>" title="rincian pengadaan">Pengadaan</a></td>
                            <td><center><a class="btn btn-default" href="<?php echo site_url("SPV/rincian/get_persekot/$row->id_datapenugasan")?>" title="rincian persekot">Pembelian Langsung</a></td>
                            </tr>
                                <?php $i++?>
                                <?php endforeach?>
                        </tbody>
                        </table>
                            <?php else: ?>
                            Tidak ada data
                            <?php endif?>
                </div>
                </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>

                <!-- /. ROW  -->
    
<?php $this->load->view('SPV/footer.php')?>  