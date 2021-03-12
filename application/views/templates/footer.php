    </div>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="../assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="../assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Azzara JS -->
<script src="../assets/js/ready.min.js"></script>

<script>
    function showLoader(){
        $('#modalLoading').modal('show');
    }
    <?php 
    if($halaman=="downloads"){
    ?>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        labels: ['test'],
        data: {
            datasets: [
                {
                    label: 'IOS dataset',
                    data: [
                        <?php 
                        foreach($tests as $test){
                            echo "'".$test->ios."',";
                        }
                        ?>
                    ],
                    borderColor: "#3e95cd",
                    backgroundColor: "#3e95cd",
                    fill:false,
                },
                {
                    label: 'Android dataset',
                    data: [
                        <?php 
                        foreach($tests as $test){
                            echo "'".$test->android."',";
                        }
                        ?>
                    ],
                    borderColor: "#a4c639",
                    backgroundColor: "#a4c639",
                    fill:false,
                }
            ],
            labels: [
                <?php 
                foreach($tests as $test){
                    echo "'".$test->tanggal."',";
                }
                ?>
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        },
    });
    <?php
    }?>

    document.onreadystatechange = function () {
        var state = document.readyState
        if (state == 'interactive') {
            $('#modalLoading').modal('show');
        } else if (state == 'complete') {
            setTimeout(function(){
                $('#modalLoading').modal('hide');
            },1000);
        }
    }

    $('#report-datatables').DataTable({
            "pageLength": 50,
            // "lengthMenu": [ [50, 100, 200, -1], [50, 100, 200, "All"] ],
    });
    
</script>

</body>
</html>