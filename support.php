<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Support service for <?php echo $id ?></title>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
<div class="content">
<img alt="Webconverger logo" class="logo" height="70" src="https://webconverger.com/img/logo.svg" />


<h1>Apache logs</h1>

<p>Logs from when a configuration is fetched from config.webconverger.com</p>

<p>
<a href="/a/<?php echo $id;?>">Full log for <?php echo $id;?></a>
</p>

<pre>
<?php echo (`./taill.sh "$id"`); ?>
</pre>

<h1>Logs</h1>

<p>If the <code>support</code> API is enabled in your <a href="http://config.webconverger.com/clients/install-config/<?php echo $id; ?>">configuration</a>, logs should appear here.</p>

<ul>
<?php
foreach (glob("$logdir/$id/*", GLOB_ONLYDIR) as $filename) {
	echo "<li><a href=/$filename/syslog>". date('c', intval(basename($filename))) . "</a></li>\n";
}
?>
</ul>

<hr>
<footer>
<p>Questions our <a href="http://config.webconverger.com/faq"><abbr title="Frequently Asked Questions">FAQ</abbr></a> didn't answer? Please email <a href="&#x6D;&#97;&#x69;&#108;&#x74;&#111;:&#x73;&#97;&#x6C;&#101;&#x73;&#64;&#119;&#x65;&#x62;&#99;&#111;&#x6E;&#118;&#101;&#114;&#x67;&#101;&#x72;&#46;&#x63;&#111;&#x6D;">&#x73;&#97;&#x6C;&#101;&#x73;&#64;&#119;&#x65;&#x62;&#99;&#111;&#x6E;&#118;&#101;&#114;&#x67;&#101;&#x72;&#46;&#x63;&#111;&#x6D;</a>.</p>
<p>&copy; Webconverger <?php echo date('Y'); ?></p>

</footer>

</div> <!-- container -->
</div> <!-- content -->

</body>
</html>

