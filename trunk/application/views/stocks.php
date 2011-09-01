<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highstock Example</title>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>application/script/jquery-1.6.1.min.js"></script>
		<script type="text/javascript">
		
		tasas = eval('<?php echo $tasas; ?>');
		
		jQuery(function() {
			// Create the chart	
			window.chart = new Highcharts.StockChart({
			    chart: {
						renderTo: 'container',
						marginTop: 35,
						borderWidth: 1
					},
					rangeSelector: {
						buttons: [{
							type: 'day',
							count: 1,
							text: '1d'
						}, {
							type: 'day',
							count: 7,
							text: '7d'
						}, {
							type: 'day',
							count: 15,
							text: '15d'
						}, {
							type: 'month',
							count: 1,
							text: '1m'
						}, {
							type: 'month',
							count: 3,
							text: '3m'
						}, {
							type: 'month',
							count: 6,
							text: '6m'
						}, {
							type: 'year',
							count: 1,
							text: '1a'
						}, {
							type: 'year',
							count: 2,
							text: '2a'
						}, {
							type: 'all',
							count: 1,
							text: 'All'
						}],
						selected: 1,
						inputEnabled: false
					},	
					navigator: {
						height: 30
					},
					title: {
						text: '<?php echo $titulo; ?>',
						floating: false,
						align: 'center',
						style: {
							color: '#3E576F',
							fontSize: '12px'
						}
					},
					xAxis: {
						maxZoom: 14 * 24 * 3600000 // fourteen days
					},
					yAxis: [{
						title: {
							text: 'Valor'
						},
						height: 100,
						lineWidth: 2
					}],
			    	series: [{
						name: 'Tasa',
						data: tasas,
						marker: {
							enabled: true,
							radius: 3
						},
						shadow: true
					}]
			});
		});
		</script>
		
	</head>
	<body>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/script/highstock/js/highstock.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/script/highstock/js/modules/exporting.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>application/script/highstock/js/usdeur.js"></script>
		<div id="container" style="width: 99%; margin-left: 10px; float: left; height: 250px"></div>
	</body>
</html>
