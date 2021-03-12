<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Overview Jumlah Download Apps National Hospital</h4>
            </div>
            <div class="row" id="total">
                <div class="col">
                    <div class="card card-stats card-success card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-light bubble-shadow-small">
                                        <i class="fab fa-android"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Android</p>
                                        <h4 class="card-title"><?php echo $totalAndroid; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats card-primary card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-light bubble-shadow-small">
                                        <i class="fab fa-apple"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total IOS</p>
                                        <h4 class="card-title"><?php echo $totalIos; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-round">
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url(); ?>Downloads/laporan">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input type='date' class="form-control" id="dFrom" name="dFrom" value="<?php if(isset($start)){ echo $start;} ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tanggal Selesai</label>
                                            <input type='date' class="form-control" id="dTo" name="dTo" value="<?php if(isset($end)){ echo $end;} ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Cari</label>
                                            <input type="submit" class="form-control btn btn-block btn-primary" value="Cari">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row" id="overview">
                <div class="col">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-light bubble-shadow-small">
                                        <i class="fab fa-android"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Android</p>
                                        <h4 class="card-title"><?php echo $android; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-light bubble-shadow-small">
                                        <i class="fab fa-apple"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">IOS</p>
                                        <h4 class="card-title"><?php echo $ios; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <canvas id="myChart" width="800" height="250">

            </canvas>
            <div class="row row-card-no-pd mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <h4 class="card-title">Laporan Pasien Test Covid 19 National Hospital</h4>
                            </div>
                            <p class="card-category">
                                <?php
                                    $mulai=new DateTime($start);
                                    $mulai=$mulai->format('d F Y');
                                    $selesai=new DateTime($end);
                                    $selesai=$selesai->format('d F Y');
                                ?>
                                Per Tanggal <?php echo $mulai; ?> - <?php echo $selesai; ?> 
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive table-hover table-sales table-striped">
                                        <table class="table" id="report-datatables">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Android</th>
                                                <th>IOS</th>            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach($tests as $test){
                                        ?>
                                            <tr>
                                                <td><?php echo $test->tanggal; ?></td>
                                                <td><?php echo intval($test->android); ?></td>
                                                <td><?php echo intval($test->ios); ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>