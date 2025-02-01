<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsuid'] == 0)) {
    header('location:logout.php');
} else { ?>


    <!doctype html>

    <html class="no-js" lang="">

    <head>

        <title>Korisnicki panel</title>


        <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
        <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
        <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="../admin/assets/css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.pie.min.js"></script>

        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

        <style>
            #weatherWidget .currentDesc {
                color: #ffffff !important;
            }

            .traffic-chart {
                min-height: 335px;
            }

            #flotPie1 {
                height: 150px;
            }

            #flotPie1 td {
                padding: 3px;
            }

            #flotPie1 table {
                top: 20px !important;
                right: -10px !important;
            }

            .chart-container {
                display: table;
                min-width: 270px;
                text-align: left;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            #flotLine5 {
                height: 105px;
            }

            #flotBarChart {
                height: 150px;
            }

            #cellPaiChart {
                height: 160px;
            }
        </style>
    </head>

    <body>

        <?php include_once('includes/sidebar.php'); ?>

        <?php include_once('includes/header.php'); ?>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <?php
                                    $uid = $_SESSION['vpmsuid'];
                                    $ret = mysqli_query($con, "select * from tblregusers where ID='$uid'");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                        <div class="red-font stat-icon dib flat-color-1">
                                            Dobrodošli <?php echo $row['FirstName']; ?>         <?php echo $row['LastName']; ?> !
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Widgets -->
            <div>
<?php
$weatherDescriptions = [
    'Clear' => 'Jasno',
    'clear sky' => 'Vedro',
    'Cloudy' => 'Oblačno',
    'Rain' => 'Kiša',
    'Snow' => 'Sneg',
    'Thunderstorm' => 'Oluja',
    'Drizzle' => 'Kišica',
    'Fog' => 'Magla',
    'Windy' => 'Vetrovito',
];

$cityTranslations = [
    'Belgrade' => 'Beograd',
];

// Povlačenje poslednjih vremenskih podataka
$sql = "SELECT * FROM weather ORDER BY time DESC LIMIT 1";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
// Prikazivanje podataka sa prevedenim gradom
$cityName = isset($cityTranslations[$row['city']]) ? $cityTranslations[$row['city']] : $row['city']; // Prevod grada, ako postoji


    echo "<h2>Vremenska prognoza za {$cityName}</h2>";
    echo "<p></p>"; 
    echo "<p>Temperatura: {$row['temperature']}°C</p>"; // Prikaz temperature u °C
    echo "<p>Opis: " . (isset($weatherDescriptions[$row['description']]) ? $weatherDescriptions[$row['description']] : $row['description']) . "</p>";
    echo "<p>Vlažnost: {$row['humidity']}%</p>";
    echo "<p>Ažurirano: {$row['time']}</p>";
} else {
    echo "Nema podataka o vremenu.";
}
?>
<?php
$xml = simplexml_load_file('parking_prices.xml');

echo "<table style='width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; border-radius: 8px; overflow: hidden;'>";
echo "<tr style='background-color: #007bff; color: white; text-align: left;'>";
echo "<th style='padding: 12px; border-bottom: 2px solid #ddd;'>Tip karte</th>";
echo "<th style='padding: 12px; border-bottom: 2px solid #ddd;'>Cijena (BAM)</th>";
echo "</tr>";

foreach ($xml->ticket as $ticket) {
    echo "<tr style='background-color: #f8f9fa;'>";
    echo "<td style='padding: 10px; border-bottom: 1px solid #ddd;'>" . $ticket->type . "</td>";
    echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; font-weight: bold;'>" . $ticket->price . "</td>";
    echo "</tr>";
}

echo "</table>";
?>


</div>

        </div>
        <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>

        <!-- /#right-panel -->

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="../admin/assets/js/main.js"></script>

        <!--  Chart js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

        <!--Chartist Chart-->
        <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
        <script src="../admin/assets/js/init/weather-init.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
        <script src="../admin/assets/js/init/fullcalendar-init.js"></script>
        <script>
    $(document).ready(function () {
        function fetchWeather() {
            $.ajax({
                url: "http://localhost/parking/vpms/fetch_weather.php",
                type: "GET",
                success: function (data) {
                    $("#weather-container").html(data); // Ubacuje podatke u div sa ID-em "weather-container"
                },
                error: function () {
                    $("#weather-container").html("<p>Neuspelo učitavanje vremenskih podataka.</p>");
                }
            });
        }

        fetchWeather(); // Poziva funkciju pri učitavanju stranice
    });
</script>


        
    </body>

    </html>
<?php } ?>