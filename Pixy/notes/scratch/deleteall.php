<?php

$clear_the_id_list=file_put_contents(dirname(__FILE__) . '/id_list/id_list', "0");

$clear_the_saved_list=file_put_contents(dirname(__FILE__) . '/saved/saved', "");

header("Location: http://pixy.local/notes/index.php");

die();