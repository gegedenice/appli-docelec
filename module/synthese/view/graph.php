<a class="btn btn-link" href="<?php echo $this->getLink('synthese::list')?>">Tableau</a>
<!--panel coûts par téléchargement -->
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">Coûts par téléchargement</div>
<div class="panel-body">
<div id="chartPrixYdt"></div>
</div>
</div>
<!-- end row-->
</div>

<!--panel telechargements par ressource -->
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">Téléchargements par ressource</div>
<div class="panel-body">
<div id="chartYdt"></div>
</div>
</div>
<!-- end row-->
</div>


<div class="row">
<!--panel telechargements par niveau -->
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Téléchargements par niveau</div>
<div class="panel-body">
<div id="chartYdtNiveau"></div>
</div>
</div>
</div>
<!--panel telechargements par discipline -->
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Téléchargements par discipline</div>
<div class="panel-body">
<div id="chartYdtDiscipline"></div>
</div>
</div>
</div>
<!-- end row-->
</div>

<!--panel dépenses par ressource -->
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">Dépenses par ressource</div>
<div class="panel-body">
<div id="chartPrix"></div>
</div>
</div>
<!-- end row-->
</div>

<div class="row">
<!--panel dépenses par niveau -->
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Dépenses par niveau</div>
<div class="panel-body">
<div id="chartPrixNiveau"></div>
</div>
</div>
</div>

<!--panel dépenses par discipline -->
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Dépenses par discipline</div>
<div class="panel-body">
<div id="chartPrixDiscipline"></div>
</div>
</div>
</div>
<!-- end row-->
</div>

<!--panel différentiel -->
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading">Différentiel prix estimé / prix exécuté</div>
<div class="panel-body">
<div id="chartDiff"></div>
</div>
</div>
<!-- end row-->
</div>

<!-- graphique couts par téléchargement -->
<script>
var chart = AmCharts.makeChart( "chartPrixYdt", {
  "type": "serial",
  "theme": "dark",
  "dataProvider": [ <?php if($this->tSynthese):?>
    <?php foreach($this->tSynthese as $oSynthese):?>

<?php echo "{'ressource':'" ?><?php if(isset($this->tJoinmodel_ressources[$oSynthese->id_ressource])){ echo $this->tJoinmodel_ressources["$oSynthese->id_ressource"];}else{ echo '$oSynthese->id_ressource' ;}?>
<?php echo "'," ?><?php echo "'ration cout/tel':" ?><?php echo $oSynthese->ratio_prix_telechargement ?><?php echo "}," ?>
<?php endforeach;?>
<?php endif;?>],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "ration cout/tel"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "ressource",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20,
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

} );
</script>
<!-- graphique téléchargements par ressource -->
<script>
var chart = AmCharts.makeChart( "chartYdt", {
  "type": "serial",
  "theme": "dark",
  "dataProvider": [ <?php if($this->tSynthese):?>
		<?php foreach($this->tSynthese as $oSynthese):?>

<?php echo "{'ressource':'" ?><?php if(isset($this->tJoinmodel_ressources[$oSynthese->id_ressource])){ echo $this->tJoinmodel_ressources["$oSynthese->id_ressource"];}else{ echo '$oSynthese->id_ressource' ;}?>
<?php echo "'," ?><?php echo "'telechargements':" ?><?php echo $oSynthese->telechargements ?><?php echo "}," ?>
<?php endforeach;?>
<?php endif;?>],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "telechargements"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "ressource",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20,
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

} );
</script>
<!-- graphique téléchargements par niveau -->
<script>
var chart = AmCharts.makeChart( "chartYdtNiveau", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [
  <?php if($this->aSynthese):?>
		<?php foreach($this->aSynthese as $bSynthese):?>
<?php echo "{'niveau':'" ?><?php echo $bSynthese->varNiveau?>
<?php echo "'," ?><?php echo "'telechargements':" ?><?php echo $bSynthese->varYdt ?><?php echo "}," ?>
<?php endforeach;?>
<?php endif;?>]
,
  "valueField": "telechargements",
  "titleField": "niveau",
  "outlineAlpha": 0.4,
  "depth3D": 15,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 30,
  "export": {
    "enabled": true
  }
} );
</script>
<!-- graphique téléchargements par discipline -->
<script>
var chart = AmCharts.makeChart("chartYdtDiscipline", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [<?php if($this->bSynthese):?>
		<?php foreach($this->bSynthese as $cSynthese):?>
<?php echo "{'discipline':'" ?><?php echo $cSynthese->varDiscipline?>
<?php echo "'," ?><?php echo "'telechargements':" ?><?php echo $cSynthese->varYdt ?><?php echo "}," ?>
<?php endforeach;?>
<?php endif;?>],
    "valueAxes": [{
    }],
    "graphs": [{
        "balloonText": "[[category]]:[[value]]",
        "fillAlphas": 1,
        "lineAlpha": 0.2,
        "type": "column",
        "valueField": "telechargements"
    }],
    "depth3D": 20,
    "angle": 30,
    "rotate": true,
    "categoryField": "discipline",
    "categoryAxis": {
        "gridPosition": "start",
        "fillAlpha": 0.05,
        "position": "left"
    },
    "export": {
    	"enabled": true
     }
});
</script>
<!-- graphique dépenses par ressource -->
<script>
var chart = AmCharts.makeChart( "chartPrix", {
  "type": "serial",
  "theme": "dark",
  "dataProvider": [ <?php if($this->tSynthese):?>
		<?php foreach($this->tSynthese as $oSynthese):?>

<?php echo "{'ressource':'" ?><?php if(isset($this->tJoinmodel_ressources[$oSynthese->id_ressource])){ echo $this->tJoinmodel_ressources["$oSynthese->id_ressource"];}else{ echo '$oSynthese->id_ressource' ;}?>
<?php echo "'," ?><?php echo "'cout':" ?><?php echo $oSynthese->prix ?><?php echo "}," ?>
<?php endforeach;?>
<?php endif;?>],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "cout"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "ressource",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20,
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

} );
</script>
<!-- graphique dépenses par niveau -->
<script>
var chart = AmCharts.makeChart( "chartPrixNiveau", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [
  <?php if($this->cSynthese):?>
		<?php foreach($this->cSynthese as $dSynthese):?>
<?php echo "{'niveau':'" ?><?php echo $dSynthese->varNiveau?>
<?php echo "'," ?><?php echo "'cout':" ?><?php echo $dSynthese->varPrix ?><?php echo "}," ?>
<?php endforeach;?>
<?php endif;?>]
,
  "valueField": "cout",
  "titleField": "niveau",
  "outlineAlpha": 0.4,
  "depth3D": 15,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 30,
  "export": {
    "enabled": true
  }
} );
</script>
<!-- graphique dépenses par discipline -->
<script>
var chart = AmCharts.makeChart("chartPrixDiscipline", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [<?php if($this->dSynthese):?>
		<?php foreach($this->dSynthese as $eSynthese):?>
<?php echo "{'discipline':'" ?><?php echo $eSynthese->varDiscipline?>
<?php echo "'," ?><?php echo "'cout':" ?><?php echo $eSynthese->varPrix ?><?php echo "}," ?>
<?php endforeach;?>
<?php endif;?>],
    "valueAxes": [{
    }],
    "graphs": [{
        "balloonText": "[[category]]:[[value]]",
        "fillAlphas": 1,
        "lineAlpha": 0.2,
        "type": "column",
        "valueField": "cout"
    }],
    "depth3D": 20,
    "angle": 30,
    "rotate": true,
    "categoryField": "discipline",
    "categoryAxis": {
        "gridPosition": "start",
        "fillAlpha": 0.05,
        "position": "left"
    },
    "export": {
    	"enabled": true
     }
});
</script>

<!-- graphique différentiel -->
<script>
var chart = AmCharts.makeChart("chartDiff", {
	"type": "serial",
     "theme": "dark",
	"categoryField": "ressource",
	"rotate": true,
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left"
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "Estimation:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "Estimation",
			"type": "column",
			"valueField": "estimation"
		},
		{
			"balloonText": "Prix:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Prix",
			"type": "column",
			"valueField": "prix"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "top",
			"axisAlpha": 0
		}
	],
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		<?php if($this->eSynthese):?>
		<?php foreach($this->eSynthese as $fSynthese):?>
<?php echo "{'ressource':'" ?><?php echo $fSynthese->varRessource?>
<?php echo "'," ?><?php echo "'estimation':" ?><?php echo $fSynthese->varPrevPrix ?>
<?php echo "," ?><?php echo "'prix':" ?><?php echo $fSynthese->varPrix ?><?php echo "}," ?>
<?php endforeach;?>
<?php endif;?>
	],
    "export": {
    	"enabled": true
     }

});
</script>