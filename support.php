<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Support logs for <?php echo $id ?></title>
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
<div class="content">
<img src="http://webconverger.com/img/logo.png" alt=Webconverger class=headlogo width=450 height=50 />

<h1>Apache logs</h1>

<p>Logs from when a configuration is fetched from config.webconverger.com</p>

<p>
<a href="/a/<?php echo $id;?>">Full log for <?php echo $id;?></a>
</p>

<pre>
<?php echo `tail "a/$id"`; ?>
</pre>

<h1>Logs</h1>

<p>If the <code>cron=*/5%20*%20*%20*%20*%20root%20support</code> debug cronjob is enabled in your <a href="http://config.webconverger.com/clients/install-config/<?php echo $id; ?>">configuration</a> or the <code>support</code> command is run in <a href="http://webconverger.org/debug/">debug mode</a> as root, logs should appear here.</p>

<?php
if (is_dir("$logdir/$id") && $handle = opendir("$logdir/$id")) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "<li><a href=/$logdir/$id/$entry/syslog>". date('c', intval($entry)) . "</a></li>\n";
        }
    }
    closedir($handle);
}
?>



<hr>
<footer>
<p>Questions our <a href="http://config.webconverger.com/faq"><abbr title="Frequently Asked Questions">FAQ</abbr></a> didn't answer? Please email <a href="&#x6D;&#97;&#x69;&#108;&#x74;&#111;:&#x73;&#97;&#x6C;&#101;&#x73;&#64;&#119;&#x65;&#x62;&#99;&#111;&#x6E;&#118;&#101;&#114;&#x67;&#101;&#x72;&#46;&#x63;&#111;&#x6D;">&#x73;&#97;&#x6C;&#101;&#x73;&#64;&#119;&#x65;&#x62;&#99;&#111;&#x6E;&#118;&#101;&#114;&#x67;&#101;&#x72;&#46;&#x63;&#111;&#x6D;</a>.</p>
<p>&copy; Webconverger <?php echo date('Y'); ?></p>

</footer>

</div> <!-- container -->
</div> <!-- content -->

</body>
</html>

