<?php
$file = "zip/photo.zip";
touch($file);

$zip = new ZipArchive;
$this_zip = $zip->open($file);
if ($this_zip) {
    $folder = opendir('./2021');
    if ($folder) {
        while (false != ($image = readdir($folder))) {
            if ($image != "." && $image != "..") {
                echo $image;
                echo "<br>";
                $path = "./2021/" . $image;
                $zip->addFile($path, $image);
            }
        }
    }
    closedir($folder);
}

if (file_exists($file)) {
    $demo_name = time().".zip";
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename="' . $demo_name . '"');
    readfile($file);
    unlink($file);
}
?>