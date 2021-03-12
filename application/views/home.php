<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Overview Test Covid National Hospital</h4>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-round">
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url(); ?>Home/laporan">
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
                                            <input type="submit" class="form-control btn btn-block btn-primary" onclick="showLoader()" value="Cari">
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
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Antigen</p>
                                        <h4 class="card-title"><?php echo $antigen; ?></h4>
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
                                    <div class="icon-big text-center icon-danger bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">PCR</p>
                                        <h4 class="card-title"><?php echo $pcr; ?></h4>
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
                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Multiplex</p>
                                        <h4 class="card-title"><?php echo $multiplex; ?></h4>
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
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-tint"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Saliva Apps</p>
                                        <h4 class="card-title"><?php echo $saliva; ?></h4>
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
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="fas fa-plus-square"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Antibodi RBD</p>
                                        <h4 class="card-title"><?php echo $antibodi; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-card-no-pd">
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
                                                <th>Antigen</th>
                                                <th>PCR</th>
                                                <th>Multiplex</th>
                                                <th>Saliva</th>
                                                <th>Antibodi RBD</th>             
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach($tests as $test){
                                        ?>
                                            <tr>
                                                <td><?php echo $test->TransactionDate; ?></td>
                                                <td><?php echo intval($test->antigen); ?></td>
                                                <td><?php echo intval($test->pcr); ?></td>
                                                <td><?php echo intval($test->multiplex); ?></td>
                                                <td><?php echo intval($test->saliva); ?></td>
                                                <td><?php echo intval($test->antibodi); ?></td>
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
        <!-- Modal -->
        <div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="modalLoading" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content is-loading is-loading-lg">
                    
                </div>
            </div>
        </div>
    </div>
</div>