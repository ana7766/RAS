<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
    header('location:logout.php');
} else {
    // For deleting    
    if ($_GET['del']) {
        $catid = $_GET['del'];
        mysqli_query($con, "delete from tblvehicle where ID ='$catid'");
        echo "<script>alert('Obrisano');</script>";
        echo "<script>window.location.href='manage-incomingvehicle.php'</script>";
    }


    ?>
    <!doctype html>

    <html class="no-js" lang="">

    <head>

        <title>Upravljaj Ulazima Vozila</title>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    </head>

    <body>
        <!-- Left Panel -->

        <?php include_once('includes/sidebar.php'); ?>

        <!-- Left Panel -->

        <!-- Right Panel -->

        <?php include_once('includes/header.php'); ?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Pocetna</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Pocetna</a></li>
                                    <li><a href="manage-incomingvehicle.php">Upravljaj vozilima</a></li>
                                    <li class="active">Upravljaj ulazima vozila</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">



                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Upravljaj Ulazima Vozila</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th>S.NO</th>


                                            <th>Parking broj</th>
                                            <th>Ime vlasnika</th>
                                            <th>Registarske oznake</th>

                                            <th>Akcija</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <?php
                                    $ret = mysqli_query($con, "select *from   tblvehicle where Status=''");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($ret)) {
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt; ?></td>


                                            <td><?php echo $row['ParkingNumber']; ?></td>
                                            <td><?php echo $row['OwnerName']; ?></td>
                                            <td><?php echo $row['RegistrationNumber']; ?></td>

                                            <td><a href="view-incomingvehicle-detail.php?viewid=<?php echo $row['ID']; ?>"
                                                    class="btn btn-primary">Pregled</a>

                                                <a href="print.php?vid=<?php echo $row['ID']; ?>" style="cursor:pointer"
                                                    target="_blank" class="btn btn-warning">Stampaj</a>
                                                <a href="manage-incomingvehicle.php?del=<?php echo $row['ID']; ?>"
                                                    class="btn btn-danger"
                                                    onClick="return confirm('Da li ste sigurni?')">Obrisi</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                    } ?>
                                </table>

                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>

        <?php include_once('includes/footer.php'); ?>

        </div><!-- /#right-panel -->

        <!-- Right Panel -->

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>


    </body>

    </html>
<?php } ?>