<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <title>Awesome Ales Inventory Tracker</title>
		<meta charset="utf-8">
			<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
			<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon"/>
    </head>
    <body>
		<form action = 'invoiceDateReportRun.php' method='POST'>
		Start Date for Invoice list report (yyyymmdd):
		<input type='text' name='start' size='5' /><br />
		End Date for Invoice list report (yyyymmdd):
		<input type='text' name='end' size='5' /><br />
		<input type='submit' value='Run Report'>
		</form>
	</body>
</html>