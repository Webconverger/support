<?php

$apachelogs = "a";
$logdir = "l";
date_default_timezone_set('Europe/Berlin');
umask(002);

if (isset($_FILES['f']) && is_uploaded_file($_FILES['f']['tmp_name'])) {
	$f = $_POST["id"];
	$dir = $logdir;
	if(! file_exists("$apachelogs/" . $f)) {
		$msg = "Are you a subscriber?\n";
		$msg .= "http://config.webconverger.com/clients/install-config/$f\n";
		$msg .= "Please email support@webconverger.com referencing " . $f . "\n";
		die($msg);
		//$dir = 'fail';
	}
	$dir = $dir . '/' . $f . '/' . date("U");
	mkdir($dir, 0777, true);
	move_uploaded_file($_FILES["f"]['tmp_name'], $dir . '/log.tar.bz2');
	`cd "$dir"; tar jxvf log.tar.bz2 --strip=2`;
} elseif (isset($_REQUEST["q"])) {
	$id = basename($_REQUEST["q"]);
	if(! file_exists("$apachelogs/" . $id)) {
		$msg = "Could not find subscriber logs.\n";
		die($msg);
	}
	include "support.php";
} else {
	// Replace with some Ad?
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	die("Missing machine identity argument.\ne.g. http://support.webconverger.com/EE0CA770-AFFB-453F-B8C5-F9F73135E39A;08:00:27:4e:4a:4e");
}

?>
