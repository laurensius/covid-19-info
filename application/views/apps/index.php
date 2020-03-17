<!doctype html>
<head>
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 400px;
        width: 100%;
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Covid-19 Info</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

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
            <div class="col-lg-12">
                <!-- <div id="map" class="map"></div> -->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style="margin-top:15px">
            <div class="col">
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
            <div class="col">
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
            <div class="col">
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
            <div class="col-lg-12">
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
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
            center: ol.proj.fromLonLat([120, 0]),
            zoom: 3
        })
    });
    </script>
</body>