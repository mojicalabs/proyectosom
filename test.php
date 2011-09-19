<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="/web/application/script/jquery-1.6.1.min.js"></script>

<script type="text/javascript">
	$.ajax({
	   type: "POST",
	   url: "/web/index.php/settasas/index",
	   data: {data:{indicadores:{"tDC":"37.70", "tDV":"38.00", "tEC":"53.15", "tEV":"54.65"}, banco:"bancopopular"}},
	   dataType: "text",
	   success: function(msg){
		 alert( "Data Saved: " + msg );
	   },
	   error: function(msg){
		 alert( "error: " + msg );
	   },
	 });
</script>


</head>

<body>
<form id="form1" name="form1" method="post" action="process.php">
  <input type="text" name="data" id="data" />
  <input type="submit" name="button" id="button" value="Submit" />
</form>
<hr>
<form id="form2" name="form2" method="post" action="/web/index.php/settasas/index">
  <input type="text" name="data" id="data" value="{data:{indicadores:{'tDC':'37.70', 'tDV':'38.00'}, banco:'bancopopular'}}" />
  <input type="submit" name="button" id="button" value="Submit" />
</form>
</body>
</html>