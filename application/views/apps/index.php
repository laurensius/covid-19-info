<!doctype html>
<head>
    <title>Pantau Perkembangan Covid-19</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" type="text/css">

    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 500px;
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Covid-19 Info</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Kasus Global <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div> -->
    </nav>

    <div class="container">
        <div class="row" style="margin-top:15px">
            <div class="col-lg-12 ">
                <div id="map" class="map"></div>
                <div style="display:none">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Negara / Regional</th>
                                <th>Terkonfirmasi</th>
                                <th>Meninggal</th>
                                <th>Sembuh</th>
                                <th>Aktif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for($x=0;$x<sizeof($data["detail_kasus"]);$x++){
                            ?>
                            <tr>
                                <td><?php echo ($x+1) ?></td>
                                <td>
                                    <div id="<?php echo "regional_negara_".$x; ?>">
                                        <?php echo $data["detail_kasus"][$x]["regional_negara"] ?>
                                    </div>
                                </td>
                                <td>
                                    <div id="<?php echo "terkonfirmasi_".$x; ?>">
                                        <div class="alert alert-danger">
                                        <?php echo $data["detail_kasus"][$x]["regional_negara"] ." - ". $data["detail_kasus"][$x]["terkonfirmasi"] ?>
                                        </div>
                                       
                                    </div>
                                </td>
                                <td>
                                    <div id="<?php echo "meninggal_".$x; ?>">
                                        <?php echo $data["detail_kasus"][$x]["meninggal"] ?>
                                    </div>
                                </td>
                                <td>
                                    <div id="<?php echo "sembuh_".$x; ?>">
                                        <?php echo $data["detail_kasus"][$x]["sembuh"] ?>
                                    </div>
                                </td>
                                <td>
                                    <div id="<?php echo "aktif_".$x; ?>">
                                        <?php echo $data["detail_kasus"][$x]["aktif"] ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div id="popup" title="Welcome to OpenLayers"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top:15px">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">
                            <b>
                            <?php 
                                echo $data["kesimpulan"]["total_kasus"];
                            ?>
                            </b>
                        </h5>
                        <p class="card-text">Kasus Terkonfirmasi</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top:15px">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">
                            <b>
                            <?php 
                                echo $data["kesimpulan"]["total_meninggal"];
                            ?>
                            </b>
                        </h5>
                        <p class="card-text">Penderita Meninggal</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top:15px">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">
                            <b>
                            <?php 
                                echo $data["kesimpulan"]["total_sembuh"];
                            ?>
                            </b>
                        </h5>
                        <p class="card-text">Penderita Sembuh</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top:15px">
            <div class="col-lg-12 table-responsive">
                <table id="cvd_data" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Negara / Regional</th>
                            <th>Terkonfirmasi</th>
                            <th>Meninggal</th>
                            <th>Sembuh</th>
                            <th>Aktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for($x=0;$x<sizeof($data["detail_kasus"]);$x++){
                        ?>
                        <tr>
                            <td><?php echo ($x+1) ?></td>
                            <td><?php echo $data["detail_kasus"][$x]["regional_negara"] ?></td>
                            <td><?php echo $data["detail_kasus"][$x]["terkonfirmasi"] ?></td>
                            <td><?php echo $data["detail_kasus"][$x]["meninggal"] ?></td>
                            <td><?php echo $data["detail_kasus"][$x]["sembuh"] ?></td>
                            <td><?php echo $data["detail_kasus"][$x]["aktif"] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">
                Developed by 
                <a taget="_blank" href="https://github.com/laurensius">Laurensius Dede Suhardiman</a> &
                <a taget="_blank" href="https://github.com/sugiantoaziz">Azis Sugianto Suparman</a> <br>

                Data Source 
                <a taget="_blank" href="https://systems.jhu.edu/">CSSE Johns Hopkins University</a> & 
                <a taget="_blank" href="https://kawalcorona.com">Ethical Hacker Indonesia</a><br>
            </span>
        </div>
    </footer>
    <br>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    
    var global_data = <?php echo json_encode($data["detail_kasus"]); ?>;

    var map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([110, 0]),
            zoom: 6
        })
    });

    for(var x=0;x<global_data.length;x++){
        var negara = new ol.Overlay({
            position: ol.proj.fromLonLat([global_data[x].lon, global_data[x].lat]),
            element: document.getElementById('terkonfirmasi_'+x)
        });
        map.addOverlay(negara);
    }

    
    </script>
    <script>
        $(document).ready(function(){
            $('#cvd_data').DataTable();
        });
    </script>
</body>