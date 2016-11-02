<?php

$numLayers = 3;
$regEx = '/^barrow_sea_ice_[0-9]{4}\-[0-9]{2}\-[0-9]{2}_[0-9]{2}:[0-9]{2}\.tif$/';

$id = (int) $_GET['id'];
if($id >= 1 && $id <= $numLayers) {
  $layerDir = getcwd() . '/' . $id;
  $files = scandir($layerDir);

  foreach($files as &$file) {
    if(preg_match($regEx, $file)) {
      $webPath = dirname($_SERVER['PHP_SELF']) . '/' . $id . '/' . $file;
      $url = '//' . $_SERVER['HTTP_HOST'] . $webPath;
      header('Location: ' . $url);
    }
  }
}

?>
