<?php $this->load->view('manager/header.php')?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
                  <hr>
                  <div class="row" align="center">
                    <b><h2><font color="black">SISTEM INFORMASI PENGELOLAAN DANA PENUGASAN UNTUK BAGIAN PRODUKSI</font></h2></b>
                    <b><p>PT PLN (Persero) PUSAT PEMELIHARAAN KETENAGALISTRIKAN UPPW III</p></b>
                </div>
                <hr/>


                 <div class="row">
                <!--
                <div class="col-md-6 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Bar Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>            
                </div>
                -->
                <?php
        foreach($data as $data){
            $merk[] = date("F", strtotime($data->bulan_deadline));
            $stok[] = (float) $data->total;
                    }
                ?>
            Realisasi<br>
            <br>                  
           <canvas id="canvas" width="1000" height="280"></canvas>

            <!--Load chart js-->
            <script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script> 
            <script>
                
                    var lineChartData = {  
                        labels : <?php echo json_encode($merk);?>,
                        datasets : [
                            
                            {
                                fillColor: "rgba(60,141,188,0.9)",
                                strokeColor: "rgba(60,141,188,0.8)",
                                pointColor: "#3b8bba",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(152,235,239,1)",
                                data : <?php echo json_encode($stok);?>
                            }
                            

                        ]
                        
                    }

                var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);
                
            </script>
                 
<?php $this->load->view('manager/footer.php')?>

                        