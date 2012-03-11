<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Webconverger QA</title>
  <style>
  body { margin: 2em; font-size: 1.2em; font-family: sans-serif; text-align: center; background-color: white; }
  input { font-size: 1.1em; }
  form { border: thin solid silver; padding: 1em; background: #CCC url(http://webconverger.com/img/linen_light.jpg); -moz-border-radius: 1em; -webkit-border-radius: 1em; border-radius: 1em; }
</style>
</head>
<body>

<img src="http://webconverger.com/img/logo.png">

<form action="qa.php" method="post" enctype="multipart/form-data">
<input name="f" type="file" />
<input value="Upload" type="submit">
</form>


<h3>Can't upload large files? Adjust post_max_size and upload_max_filesize to = 50M in php.ini</h3>
<pre>
~$ grep -E 'filesize|max_size' $(php --ini | head -n1 | awk '{print $NF}')
</pre>

<h3>Upload UUID.log file like so</h3>
<pre>curl -F "f=@015BEE48-1351-CB11-9575-F8DF31C806FA.log" http://<?php echo $_SERVER["HTTP_HOST"]; ?>/qa.php</pre>
<p>Which is put in YYYY-MM-DD/015BEE48-1351-CB11-9575-F8DF31C806FA.log</p>

<h3>TODO</h3>

<p>Only move into place UUIDs we know about (customers pay for). Currently it's unsecured.</p>
<p>Protect YYYY-MM-DD directories.</p>

</body>
</html>
