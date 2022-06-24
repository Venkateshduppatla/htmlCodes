
<!DOCTYPE html>
<html>
<head>
	<title>Audio Player</title>
</head>
<body>
	<audio src="" controls="" autoplay id="audioPlayer"></audio>
	<ul id="playList">
	<?php
	// (A) OPEN FOLDER + READ ENTRIES
	$target = "./";
	if ($fh = opendir($target)){
	  while (($entry = readdir($fh)) !== false) {
	    // (B) IGNORE "." AND ".."
	    if ($entry!="." && $entry!="..") {
	      // (C) FILE OR FOLDER?
	      $thisE = $target . DIRECTORY_SEPARATOR . $entry;
	      echo is_dir($thisE) ? "Directory" : "File";
	      echo " - $thisE<br>";
	    }
	  }
	  closedir($fh);
	}
?>

</ul>
	<script src="https://code.jquery.com/jquery-2.2.0.js"></script>
	<script type="text/javascript">
		
		audioPlayer();
		function list()
		{
			var fs = require('fs');
			var files = fs.readdirsyn('D:/training/html');
			$('#songs');
		}
		function allowDrop(ev) {
		    ev.preventDefault();
		}
		function drag(ev) {
		    ev.dataTransfer.setData("playList li a", ev.target.id);
		}
		function drop(ev) {
		    ev.preventDefault();
		    var data = ev.dataTransfer.getData("playList li a");
		    ev.target.appendChild(document.getElementById(data));
		}
		function audioPlayer()
		{
			$("#audioPlayer")[0].src = $("#playList li a")[0];
			$("#audioPlayer")[0].play();
			$("#playList li a").click(function(e)
			{
				e.preventDefault();
				$("#audioPlayer")[0].src = this;
			});
		}
	</script>
	<ul id="songsList"></ul>
</body>
</html>



