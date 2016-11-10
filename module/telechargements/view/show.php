<div class="row">
<!-- panel tableau -->
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Téléchargements mensuels</div>
<div class="panel-body">
<form class="form-horizontal" action="" method="POST" >
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Ressource</label>
		<div class="col-sm-10"><?php if(isset($this->tJoinmodel_ressources[$this->oTelechargements->id_ressource])){ echo $this->tJoinmodel_ressources[$this->oTelechargements->id_ressource];}else{ echo $this->oTelechargements->id_ressource ;}?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Janvier</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->janvier ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">F&eacute;vrier</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->fevrier ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Mars</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->mars ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Avril</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->avril ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Mai</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->mai ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Juin</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->juin ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Juillet</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->juillet ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Ao&ucirc;t</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->aout ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Septembre</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->septembre ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Octobre</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->octobre ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">Novembre</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->novembre ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">D&eacute;cembre</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->decembre ?></div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Commentaire</label>
		<div class="col-sm-10"><?php echo $this->oTelechargements->comment ?></div>
	</div>
		
	
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
			 <a class="btn btn-default" href="<?php echo $this->getLink('telechargements::list')?>">Retour</a>
		</div>
	</div>
</form>
</div>
</div>
</div>

<!-- panel graphique -->
<div class="col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">Graphique</div>
<div class="panel-body">
<div id="chart"></div>		
</div>
</div>
</div>
<!-- end row -->
</div>
<script>
var chart = AmCharts.makeChart( "chart", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [ {
    "mois": "janvier",
    "ydt": <?php echo $this->oTelechargements->janvier ?>
  }, {
    "mois": "fevrier",
    "ydt": <?php echo $this->oTelechargements->fevrier ?>
  }, {
    "mois": "mars",
    "ydt": <?php echo $this->oTelechargements->mars ?>
  }, {
    $ch: "avril",
    "ydt": <?php echo $this->oTelechargements->avril ?>
  }, {
    "mois": "mai",
    "ydt": <?php echo $this->oTelechargements->mai ?>
  }, {
    "mois": "juin",
    "ydt": <?php echo $this->oTelechargements->juin ?>
  }, {
    "mois": "juillet",
    "ydt": <?php echo $this->oTelechargements->juillet ?>
  }, {
    "mois": "aout",
    "ydt": <?php echo $this->oTelechargements->aout ?>
  }, {
    "mois": "septembre",
    "ydt": <?php echo $this->oTelechargements->septembre ?>
  }, {
    "mois": "octobre",
    "ydt": <?php echo $this->oTelechargements->octobre ?>
  }, {
    "mois": "novembre",
    "ydt": <?php echo $this->oTelechargements->novembre ?>
  }, {
    "mois": "decembre",
    "ydt": <?php echo $this->oTelechargements->decembre ?>
  }],
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
    "valueField": "ydt"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "mois",
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
