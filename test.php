asdsadas<?php
$text = $responce['message']['text']."\n";
$filename = __DIR__ . '/file.txt';
$fh = fopen($filename, 'a+');
fwrite($fh, $text);
fclose($fh);
?>
