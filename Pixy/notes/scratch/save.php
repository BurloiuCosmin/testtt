<?php
$filename = $_POST['title'];
$data= $_POST['content'];
$title_replacer= explode(" ", $_POST['content'] , 4);
$id=(int)(file_get_contents(dirname(__FILE__) . '/id_list/id_list'));


if(empty($filename) && isset($_POST['content']) && !empty($data) )
{
    $id = $id+1;

    $ret = file_put_contents( dirname(__FILE__) . '/saved/saved', "\r\n" . "\r\n". $id . "\r\n" . "\r\n" . $title_replacer[0].' '. $title_replacer[1].' '. $title_replacer[2]. '...' . "\r\n" . "\r\n" . $data. "\r\n". "\r\n" . "Date created: " .date("l") . ", " . date("d/m/Y") . "\r\n"
        . "Last update  " . date("l") . ", " . date("d/m/Y"), FILE_APPEND | LOCK_EX);

    $clear_the_list=file_put_contents(dirname(__FILE__) . '/id_list/id_list', "");

    $return_in_list=file_put_contents( dirname(__FILE__) . '/id_list/id_list',  $id , FILE_APPEND | LOCK_EX);

    header("Location: http://pixy.local/notes/index.php");
    die();
}

if(isset($_POST['title']) && !empty($filename) && isset($_POST['content']) && !empty($data) )
{
    $id = $id+1;

    $clear_the_list=file_put_contents(dirname(__FILE__) . '/id_list/id_list', "");

    $return_in_list=file_put_contents( dirname(__FILE__) . '/id_list/id_list',  $id , FILE_APPEND | LOCK_EX);

    $ret = file_put_contents( dirname(__FILE__) . '/saved/saved', "\r\n" . "\r\n". $id ."\r\n" . "\r\n" .$filename . "\r\n" . "\r\n" . $data. "\r\n" . "\r\n" ."Date created: " .date("l") . ", " . date("d/m/Y") . "\r\n"
 . "Last update:  " . date("l") . ", " . date("d/m/Y"), FILE_APPEND | LOCK_EX);

    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        header("Location: http://pixy.local/notes/index.php");
        die();

    }
}

else {
    header( "refresh:3;url=index.html" );
    echo 'There was an error, please try again';
}