<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Overview Apps National Hospital</h4>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-round">
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url(); ?>Apps/laporan">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input type='date' class="form-control" id="dFrom" name="dFrom" value="<?php if(isset($start)){ echo $start;} ?>">
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
                                ?>
                                Per Tanggal <?php echo $mulai; ?>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive table-hover table-sales">
                                        <table class="table" id="report-datatables">
                                        <thead>
                                            <tr>
                                                <th>STATUS</th>
                                                <th>PCR</th>
                                                <th>Saliva</th>
                                                <th>Antigen</th>
                                                <th>Antigen+SKS</th>                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            foreach($tests as $test){
                                        ?>
                                            <tr>
                                                <td><?php echo $test->STATUS; ?></td>
                                                <td><?php echo intval($test->PCR); ?></td>
                                                <td><?php echo intval($test->Saliva); ?></td>
                                                <td><?php echo intval($test->Antigen); ?></td>
                                                <td><?php echo intval($test->Antigen2); ?></td>
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