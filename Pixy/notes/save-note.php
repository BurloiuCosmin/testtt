<?php
function savenote(){

$id=(int)(file_get_contents(dirname(__FILE__) . '/id_list/id_list'));
$id=$id+1;

$title=$_POST['title'];
$content=$_POST['content'];
$dateCreated="Date created: " .date("l") . ", " . date("d/m/Y");
$dateModified="Last update  " . date("l") . ", " . date("d/m/Y");

$data= array(
     "$id" => array('title' => $title, 'content' => $content, 'dateCreated' => $dateCreated, 'dateModified' => $dateModified)
);

    $modify_id=file_put_contents( dirname(__FILE__) . '/id_list/id_list',  $id ,  LOCK_EX);

    header( "refresh:5;url=index.php" );

    echo $data;
    $myJSON = json_encode($data);
    return $myJSON;


}
