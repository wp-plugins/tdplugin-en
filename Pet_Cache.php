<?php
// Pide un fichero

function request_cache($url, $dest_file, $timeout) {
	if(!file_exists($dest_file) || filemtime($dest_file) < (time()-$timeout)) {
		$data = file_get_contents($url);
		if ($data === false) return false;
		$tmpf = tempnam('/tmp','YWS');
		$fp = fopen($tmpf,"w");
		fwrite($fp, $data);
		fclose($fp);
		rename($tmpf, $dest_file);
	} else {
		return file_get_contents($dest_file);
	}
	return($data);
	}

?>
