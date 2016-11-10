<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>docelec</title>

	<script src="js/main.js" type="text/javascript"></script>
    <!-- automatisation du calcul du prix du prix par ressource -->
  <script src="js/function_calcul.js" type="text/javascript"></script>
    <!-- amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<style>
#chartPrixYdt {
  width   : 900px;
  height    : 300px;
  font-size : 11px;
}
#chartYdt {
  width   : 900px;
  height    : 300px;
  font-size : 11px;
}

#chartYdtNiveau {
  width   : 100%;
  height    : 300px;
}
#chartYdtDiscipline {
   width   : 500px;
  height    : 300px;
  font-size : 11px;
}
#chartPrix {
  width   : 900px;
  height    : 300px;
  font-size : 11px;
}
#chartPrixNiveau {
  width   : 100%;
  height    : 300px;
 
}
#chartPrixDiscipline {
   width   : 500px;
  height    : 300px;
  font-size : 11px;
}
#chartDiff {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
}
#chart {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
}
</style>
<!-- Bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  
	<?php echo $this->load('menu') ?>
  
	<div class="container theme-showcase" role="main">
		
		<div class="page-header">
		</div>
	
		<?php echo $this->load('main') ?>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  </body>
</html>
