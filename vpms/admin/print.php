<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
  header('location:logout.php');
} else {


  ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <?php
  $cid = $_GET['vid'];
  $ret = mysqli_query($con, "select * from tblvehicle where ID='$cid'");
  $cnt = 1;
  while ($row = mysqli_fetch_array($ret)) {
    ?>

    <div id="exampl">

      <table border="1" class="table table-bordered mg-b-0">
        <tr>
          <th colspan="4" style="text-align: center; font-size:22px;"> Potvrda o parkiranju vozila</th>

        </tr>

        <tr>
          <th>Parking Broj</th>
          <td><?php echo $row['ParkingNumber']; ?></td>


          <th>Kategorija Vozila</th>
          <td><?php echo $row['VehicleCategory']; ?></td>
        </tr>
        <tr>
          <th>Proizvodjac</th>
          <td><?php echo $packprice = $row['VehicleCompanyname']; ?></td>

          <th>Registarska oznaka</th>
          <td><?php echo $row['RegistrationNumber']; ?></td>
        </tr>
        <tr>
          <th>Ime vlasnika</th>
          <td><?php echo $row['OwnerName']; ?></td>

          <th>Kontakt broj</th>
          <td><?php echo $row['OwnerContactNumber']; ?></td>
        </tr>
        <tr>
          <th>Ulaz</th>
          <td><?php echo $row['InTime']; ?></td>
          <th>Status</th>
          <td> <?php
          if ($row['Status'] == "") {
            echo "Aktivan";
          }
          if ($row['Status'] == "Out") {
            echo "Neaktivan";
          }

          ; ?></td>
        </tr>
        <?php if ($row['Remark'] != "") { ?>
          <tr>
            <th>Izlaz</th>
            <td><?php echo $row['OutTime']; ?></td>
            <th>Cijena parking karte</th>
            <td><?php echo $row['ParkingCharge']; ?></td>
          </tr>
          <tr>
            <th>Napomena</th>
            <td colspan="3"><?php echo $row['Remark']; ?></td>

          </tr>


        <?php } ?>
        <tr>
          <td colspan="4" style="text-align:center; cursor:pointer"><i class="fa fa-print fa-2x" aria-hidden="true"
              OnClick="CallPrint(this.value)"></i></td>
        </tr>

      </table>
    <?php }
} ?>
</div>
<script>
  function CallPrint(strid) {
    var prtContent = document.getElementById("exampl");
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
  }
</script>