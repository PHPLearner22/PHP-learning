
<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

include 'global.php';




$sql = 'SELECT * FROM factuur WHERE Factuur_ID = "'.$_GET['factuur_ID'].'" LIMIT 1';

$totaalExBtw = 0.00;

$result = $conn->query($sql);

if($result->num_rows != 0){
    while($row = $result->fetch_assoc()) {

        $klant_ID = $row['Klantcode'];

        $sql = 'SELECT * FROM factuurregel WHERE Factuur_ID = "'.$_GET['factuur_ID'].'"';
        $result1 = $conn->query($sql);




?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../../styles/factuur.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>


        <div class="container invoice">
          <div class="invoice-header">
            <div class="row">
              <div class="col-xs-8">
                <h1>Invoice <small>With Credit</small></h1>
                <h4 class="text-muted">NO: 554775/R1 | Date: 01/01/2015</h4>
              </div>
              <div class="col-xs-4">
                <div class="media">
                  <div class="media-left">
                    <img class="media-object logo" src="https://dummyimage.com/70x70/000/fff&text=ACME" />
                  </div>
                  <ul class="media-body list-unstyled">
                    <li><strong>Acme Corporation</strong></li>
                    <li>Software Development</li>
                    <li>Field 3, Moon</li>
                    <li>info@acme.com</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="invoice-body">
            <div class="row">
              <div class="col-xs-5">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Company Details</h3>
                  </div>
                  <div class="panel-body">
                    <dl class="dl-horizontal">
                      <dt>Name</dt>
                      <dd><strong>RENT A CAR</strong></dd>
<dt>Phone</dt>
                      <dd>123.4456.4567</dd>
                      <dt>Email</dt>
                      <dd>mainl@acme.com</dd>
                      <dt>Tax NO</dt>
                      <dd class="mono">123456789</dd>
                      <dt>Tax Office</dt>
                      <dd>A' Moon</dd>
                  </div>
                </div>
              </div>
              <div class="col-xs-7">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Customer Details</h3>
                  </div>
                  <div class="panel-body">
                    <dl class="dl-horizontal">
                      <dt>Name</dt>
                      <dd><?php echo $klant_ID; ?></dd>
                      <dt>Industry</dt>
                      <dt>Email</dt>
                      <dd>contact@microsoft.com</dd>
                      <dt>Tax NO</dt>
                      <dd class="mono">123456789</dd>
                      <dt>&nbsp;</dt>
                      <dd>&nbsp;</dd>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Services / Products</h3>
              </div>
              <table class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <th>Item / Details</th>
                    <th class="text-center colfix">Auto</th>
                    <th class="text-center colfix">Kost per dag</th>
                    <th class="text-center colfix">Dagen</th>
                    <th class="text-center colfix">Aantal dagen</th>
                    <th class="text-center colfix">Totaal</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    echo $result1->num_rows;
                    while($row = $result1->fetch_assoc()) {
                    $auto_ID = $row['Auto_ID'];

                    $beginDatum = $row['Begindatum'];
                    $eindDatum = $row['Einddatum'];

                    $dagen = date("d-m-Y", $beginDatum) ."/". date("d-m-Y", $eindDatum);
                    $aantalDagen = floor(($eindDatum - $beginDatum) / 86000);

                    $sql = 'SELECT * FROM auto WHERE Auto_ID = "'.$auto_ID.'"';
                    $result = $conn->query($sql);

                    if($result->num_rows != 0){
                        while($row = $result->fetch_assoc()) {
                            $merk = $row['Merk'];
                            $type = $row['Type'];
                            $dagprijs = $row['Dagprijs'];

                            $subtotaal = $aantalDagen * $dagprijs;

                            $totaalExBtw += $subtotaal;
        //            $auto_ID = $row2['auto_ID'];
        //            $auto_ID = $row2['auto_ID'];
        //            $auto_ID = $row2['auto_ID'];


                    ?>
                  <tr>
                    <td>
                      <?php echo $auto_ID;?>
                      <br>

                    </td>
                    <td class="text-right">
                      <span class="mono"><?php echo $auto_ID;?></span>

                    </td>
                    <td class="text-right">
                        <span class="mono"><?php echo $dagprijs;?></span>

                    </td>
                    <td class="text-right">
                      <span class="mono"><?php echo $dagen;?></span>

                    </td>
                    <td class="text-right">
                      <span class="mono"><?php echo $aantalDagen;?></span>

                    </td>
                    <td class="text-right">
                      <span class="mono"><?php echo $subtotaal;?></span>
</td>
                  </tr>
                    <?php }

                        }
                    }
                    ?>
                </tbody>
              </table>
            </div>
            <div class="panel panel-default">
              <table class="table table-bordered table-condensed">
                <thead>
                  <tr>
                    <td class="text-center col-xs-1"></td>
                    <td class="text-center col-xs-1"></td>
                    <td class="text-center col-xs-1">Subtotaal</td>
                    <td class="text-center col-xs-1">Btw 21%</td>
                    <td class="text-center col-xs-1">Totaal</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="text-center rowtotal mono"></th>
                    <th class="text-center rowtotal mono"></th>
                    <th class="text-center rowtotal mono"><?php echo $totaalExBtw; ?></th>
                    <th class="text-center rowtotal mono"><?php echo $totaalExBtw * 0.21; ?></th>
                    <th class="text-center rowtotal mono"><?php echo $totaalExBtw * 1.21; ?></th>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-xs-7">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <i>Comments / Notes</i>
                    <hr style="margin:3px 0 5px" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit repudiandae numquam sit facere blanditiis, quasi distinctio ipsam? Libero odit ex expedita, facere sunt, possimus consectetur dolore, nobis iure amet vero.
                  </div>
                </div>
              </div>
              <div class="col-xs-5">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Payment Method</h3>
                  </div>
                  <div class="panel-body">
                    <p>For your convenience, you may deposite the final ammount at one of our banks</p>
                    <ul class="list-unstyled">
                      <li>Alpha Bank - <span class="mono">MO123456789456123</span></li>
                      <li>Beta Bank - <span class="mono">MO123456789456123</span></li>
                      <li>Gamma Bank - <span class="mono">MO123456789456123</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="invoice-footer">
            Thank you for choosing our services.
            <br/> We hope to see you again soon
            <br/>
            <strong>~ACME~</strong>
          </div>
        </div>
    </body>
</html>
<?php
        }

    }


?>
