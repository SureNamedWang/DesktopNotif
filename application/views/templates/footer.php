    <script src="../assets/js/jquery.3.2.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/main.js"></script>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../assets/js/materialize.min.js"></script>

    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        function getAllPoli(){
            $.ajax({
				type: "POST",
				url: '<?php
					echo base_url('Home/getAllPoli');
					?>',
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				// async: false,
				success: function (result) {
                    // console.log(result[0].doctor_name);
                    console.log(result.length);
                    for(i=0;i<result.length;i++){
                        displayNotification(result[i].doctor_name,result[i].cust_name);
                    }
				},
				error: function (xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
			});

            setTimeout(getAllPoli,300000);
        }

        function startNotification(){
            curDate=new Date();
            curMin=curDate.getMinutes();
            
            console.log(curMin);
            if(curMin%5==0){
                console.log("Notification Start");
                getAllPoli();
            }
            else{
                console.log("Notification fail to start(mod 5)")
                setTimeout(startNotification,30000);
            }
        }

        function displayNotification(dokter,pasien) {
            if (Notification.permission === "granted") {
                navigator.serviceWorker.getRegistration().then(reg => {
                    const title = "Notifikasi Konsultasi";
                    const options = {
                        "body": "Akan ada Telekonsul untuk "+dokter+" dengan pasien a/n "+pasien,
                        "icon": "../assets/img/nhicon.ico",
                    };

                    reg.showNotification(title,options);
                });
            }
        }
    </script>
    <script>
        function getData(){
            $('#appointment-datatables').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": 
                {
                    "url": "<?php echo base_url('Home/listAppointments') ?>",

                    "dataType": "json",
                    "type": "POST",
                    data: function (d) {
                        d.filter=$('#filter').val();
                    },

                    "complete": function (json, type) {
                        //console.log(json);
                        temp=json['responseText'].substr ( json['responseText'].indexOf ( 'token' ) + 8 );
                        temp2=temp.split('"');
                        $token=temp2[0];
                        // $('#token').val(temp2[0]);

                    },
                    "error": function (xhr, ajaxOptions, thrownError) {
                        //alert(xhr.status);
                        // alert(xhr.responseText);
                        console.log(xhr.responseText);
                        // alert(thrownError);
                    }
                },
                "columns": 
                [
                    {"data":'appointment_time'},
                    {"data":'doctor_name'},
                    {"data":'cust_name'},
                    {"data":'cust_phone'}
                ]
            });
        }

        $(document).ready(function() {
            startNotification();
            getData();
            setInterval(function() {
                table=$('#appointment-datatables').DataTable();
                table.destroy();
                getData();
            }, 15000);
        });
    </script>
    </body>
</html>