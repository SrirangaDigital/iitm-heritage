


<?php

if(file_exists('application/views/' . $actualPath . '.php')) {
    require_once 'application/views/' . $actualPath . '.php';
}
elseif(file_exists('application/views/' . $actualPath . '/index.php')) {
    require_once 'application/views/' . $actualPath . '/index.php';
}
else{
    require_once 'application/views/error/index.php';
}

?>
