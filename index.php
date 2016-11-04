<?php

$numLayers = 3;
$regEx = '/^Barrow Sea Ice \([0-9]{4}\-[0-9]{2}\-[0-9]{2} [0-9]{2}:[0-9]{2}\)\.tif$/';

$id = (int) $_GET['id'];
if($id >= 1 && $id <= $numLayers) {
  $layerDir = getcwd() . '/' . $id;
  $files = scandir($layerDir);

  foreach($files as &$file) {
    if(preg_match($regEx, $file)) {
      $fileEncoded = str_replace(' ', '%20', $file);
      $webPath = dirname($_SERVER['PHP_SELF']) . '/' . $id . '/' . $fileEncoded;
      $url = '//' . $_SERVER['HTTP_HOST'] . $webPath;
      header('HTTP/1.1 307 Temporary Redirect');
      header('Location: ' . $url);
    }
  }
}

?>
