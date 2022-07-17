<?php
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category"></p>
                        <h6 class="card-title">Estado Informe Miembro Nuevo Y Miembro Vuelto a Activar en {unit_name}</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="mes1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                        <i class="icon-iscob-aaronico"></i>
                        </div>
                        <p class="card-category"></p>
                        <h6 class="card-title">Estado Ordenaciones Ultimos 24 Meses en {unit_name}</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="graf2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category"></p>
                        <h6 class="card-title">Minembro nuevos com hnos/hnas ministrantes en {unit_name}</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="ministering-graf"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                        <i class="icon-iscob-aaronico"></i>
                        </div>
                        <p class="card-category"></p>
                        <h6 class="card-title">Miembros Nuevos con recomendacion para el templo en {unit_name}</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="recomdation-graf"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="icon-iscob-aaronico"></i>
                    </div>
                    <p class="card-category"></p>
                    <h6 class="card-title">Atenci&oacute;n en el Tiempo MN Ultimos 24 Meses en {unit_name}</h6>
                </div>
                <div class="card-body">
                    <canvas id="stepperiodsgraph"></canvas>
                </div>
            </div>
        </div>    
    </div>
</div>
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
            var completed = {completed};
            var nothing = {nothing};
            var some = {some};
            var melchisedec = {melchisedec};
            var aaronic = {aaronic};
            var notOrdained = {notOrdained};
            var bi = {bishop_interview};
            var ap = {aaronic_priesthood};
            var gp = {gospel_principals};
            var ls = {lessons_start};
            var le = {lessons_end};
            var cd = {calling_date};
            var asistance = {asistance};
            var gen = {genealogy};
            var mel = {melchisedeq};
            var vb = {vicary_baptism};
            var tp = {temple_prep};
            var ti = {temple_inv};
            var ts = {temple_sel};
            var minbi = {minbi};
            var minap = {minap};
            var mingp = {mingp};
            var minls = {minls};
            var minle = {minle};
            var mincd = {mincd};
            var minasis = {minasis};
            var minge = {minge};
            var minmel = {minmel};
            var minvb = {minvb};
            var mintp = {mintp};
            var minti = {minti};
            var mints = {mints};
            var maxbi = {maxbi};
            var maxap = {maxap};
            var maxgp = {maxgp};
            var maxls = {maxls};
            var maxle = {maxle};
            var maxcd = {maxcd};
            var maxasis = {maxasis};
            var maxge = {maxge};
            var maxmel = {maxmel};
            var maxvb = {maxvb};
            var maxtp = {maxtp};
            var maxti = {maxti};
            var maxts = {maxts};
            var ministered = {ministered};
            var notMinistered = {notMinistered};
            var recomendation = {recomendation};
            var notRec = {notRec};
            
            var mnmva = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            completed,
                            some,
                            nothing
                        ],
                        backgroundColor: [
                            '#2cd700',
                            '#fffc26',
                            '#f80b00'
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Completados',
                        'algunos',
                        'nada'
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    }
                }
            };

            var priesthood = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            melchisedec,
                            aaronic,
                            notOrdained
                        ],
                        backgroundColor: [
                            '#2cd700',
                            '#fffc26',
                            '#f80b00'
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Sac. Melq.',
                        'Sac.Aaronico',
                        'No Ordenado'
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    }
                }
            };
            
            var ministering = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            ministered,
                            notMinistered,
                        ],
                        backgroundColor: [
                            '#2cd700',
                            '#fffc26',
                            '#f80b00'
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Tiene',
                        'No Tiene',
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    }
                }
            };
            
            var recomendations = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            recomendation,
                            notRec,
                        ],
                        backgroundColor: [
                            '#2cd700',
                            '#fffc26',
                            '#f80b00'
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Tiene',
                        'No Tiene',
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    }
                }
            };
            
            var stepgraph = {
                type: 'line',
                data: {
                    labels:[
                        ['Entrevista','Obispo'],
                        ['Sacerdocio','Aaronico'],
                        ['Principios','Evangelio'],
                        ['Inicio','Leciones','Misionales'],
                        ['Fin','Lecciones','Misionales'],
                        ['Fecha','Recibio','Llamamiento'],
                        ['Asistencia','Reunion','Sacramental'],
                        ['Registro','Grupo','Familiar'],
                        ['Sacerdocio','Melquisedec'],
                        ['Bautismos','por los','Muertos'],
                        ['Preparacio','Para el','Templo'],
                        ['Investiduras'],
                        'Sellamiento'],
                    datasets: [{
                        label: 'ideal',
                        data: [ 7,7,1,30,60,180,180,180,364,364,364,430,430 ],
                        backgroundColor: '#2cd700',
                        borderColor: '#2cd700',
                        fill: false
                    },{
                        label: 'avg',
                        data: [ bi,ap,gp,ls,le,cd,asistance,gen,mel,vb,tp,ti,ts ],
                        backgroundColor: '#2cd7ff',
                        borderColor: '#2cd7ff',
                        fill: false
                    },{
                        label: 'minimo',
                        data: [ minbi,minap,mingp,minls,minle,mincd,minasis,minge,minmel,minvb,mintp,minti,mints ],
                        backgroundColor: '#fffc26',
                        borderColor: '#fffc26',
                        fill: false
                    },{
                        label: 'maximo',
                        data: [ maxbi,maxap,maxgp,maxls,maxle,maxcd,maxasis,maxge,maxmel,maxvb,maxtp,maxti,maxts ],
                        backgroundColor: '#f80b00',
                        borderColor: '#f80b00',
                        fill: false
                    }
                    ]
                },
                options: {
                    responsive: true,
                    elements: {
                        line: {
                            tension: 0.3, // disables bezier curves
                        }
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Paso IMNMVA'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Dias'
                            }
                        }]
                    }
                }
            };

        window.onload = function() {
                var ctx = document.getElementById('mes1').getContext('2d');
                window.myPie = new Chart(ctx, mnmva);
                var cty = document.getElementById('graf2').getContext('2d');
                window.myPie2 = new Chart(cty, priesthood);
                var ctm = document.getElementById('ministering-graf').getContext('2d');
                window.minpie = new Chart(ctm, ministering);
                var ctr = document.getElementById('recomdation-graf').getContext('2d');
                window.recpie = new Chart(ctr, recomendations);
                var ctst = document.getElementById('stepperiodsgraph').getContext('2d');
                window.stgf = new Chart(ctst,stepgraph);
        };
        </script>
        <script>
            $('#filter_unit').on('change', function(){
                $('#unit_type').val($('#filter_unit :selected').data("utype"));
            });
        </script>
    </body>
</html>