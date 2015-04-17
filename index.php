<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<?PHP
			$myDirectory = opendir(".");
			while($entryName = readdir($myDirectory)) {
				$dirArray[] = $entryName;
			}
			closedir($myDirectory);
			$indexCount	= count($dirArray);
			sort($dirArray);
		?>
	</head>
	<body>
		<div class="navbar navbar-default">
			<center>
				<h1>Simple PHP Dirs</h1>
			</center>
		</div>
        <div class="container">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<?PHP					  
						print("<table class='table table-striped table-hover table-condensed'>\n");
						print("<thead>\n");
						print("<TR><TH>Name</TH><th>Type</th><th>Size</th></TR>\n");
						print("<thead>\n");
						print("<tbody>\n");
						for($index=0; $index < $indexCount; $index++) {
							if (substr("$dirArray[$index]", 0, 1) != "."){
								print("<TR><TD><a href=\"$dirArray[$index]\">$dirArray[$index]</a></td>");
								print("<td>");
								switch (filetype($dirArray[$index])) {
										case "file":
											print("<span class='glyphicon glyphicon-file' aria-hidden='true'></span>");
											break;
										case "dir":
											print("<span class='glyphicon glyphicon-folder-open' aria-hidden='true'></span>");
											break;
								}
								print("</td>");
								print("<td>");
								print(number_format((float)filesize($dirArray[$index]) /1024, 2, '.', ''));
								print(" MB");
								print("</td>");
								print("</TR>\n");
							}
						}
						print("</tbody>\n");
						print("</TABLE>\n");
					?>
				</div>
			</div>
		</div>
	</body>
</html>