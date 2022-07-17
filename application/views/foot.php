<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>  
        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="#">JP-DEV</a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, made by
                    <a href="#" target="_blank">JP-DEV</a>
                </div>
            <!-- your footer here -->
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
        <script src="<?php echo base_url('assets/js/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/popper.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-material-design.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/perfect-scrollbar.jquery.min.js')?>"></script>
        <!--  Google Maps Plugin    -->
        <!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
        <!-- Chartist JS -->
        <script src="<?php echo base_url('assets/js/chartist.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/Chart.bundle.js')?>"></script>
        <!--  Notifications Plugin    -->
        <script src="<?php echo base_url('assets/js/bootstrap-notify.js')?>"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="<?php echo base_url('assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript')?>"></script>
        <script src="<?php echo base_url('assets/js/my_notifications.js')?>" type="text/javascript"></script>
        <script>
            {js}
        </script>
        <script>
            $('#filter_unit').on('change', function(){
                $('#unit_type').val($('#filter_unit :selected').data("utype"));
            });
        </script>
    </body>
</html>


