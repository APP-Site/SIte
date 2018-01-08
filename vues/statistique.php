<?php session_start()?>
<?php include('../modele/modele_connexion_bdd.php');?>

<!DOCTYPE html>
<html>
    <head>
            <meta charset="UTF-8"/>
            <link rel="stylesheet" href="style.css"/>
           <title>Techn'O'Logis-Statistique</title>

    </head>

    <body>

        <?php include("hpage.php"); ?>
		<?php include("navigation_client.php"); ?>

        <div class="corps">
        	<?php include("notification.php"); ?>

          <?php
          require_once('/jpgraph-3.5.0b1/src/jpgraph.php');
          require_once('/jpgraph-3.5.0b1/src/jpgraph_bar.php');
          $db = mysql_connect("localhost","root","") or die(mysql_error());
          mysql_select_db("domisep",$db) or die(mysql_error());
          $sql1 = mysql_query("SELECT temp FROM data") or die(mysql_error());
          $sql2 = mysql_query("SELECT temperature FROM data") or die(mysql_error());
          $sql3 = mysql_query("SELECT humidite FROM data") or die(mysql_error());
          while($row1 = mysql_fetch_array($sql1))
          {
          $row2 = mysql_num_rows($sql2);
          $row3 = mysql_num_rows($sql3);
          $data[] = $row2;
          //$data[] = $row3;
          $leg[] = $row1['temp'];
          }
          $graph = new Graph(950,750,"auto");
          $graph->SetScale("textint");
          $graph->img->SetMargin(50,30,50,50);
          $graph->SetShadow();
          $graph->xaxis->SetTickLabels($leg);
          $bplot = new BarPlot($data);
          $bplot->SetFillColor("lightgreen");
          $bplot->value->Show();
          $bplot->value->SetFont(FF_ARIAL,FS_BOLD);
          $bplot->value->SetAngle(45);
          $bplot->value->SetColor("black","navy");
          $graph->Add($bplot);
          $graph->Stroke();?>

          <?php include("ppage.php"); ?>
        </body>
     </html>
