<?php
function loadnote($note_id)
{
    $a = json_decode($data,1);
    echo $a;
}
//ARRAY IN JSON
    /*ARRAY IN JSON
    $id= 0;
    $title=$_POST['title'];
    $content=$_POST['textfield'];
    $dateCreated='';
    $dateModified='';

    $data= array(
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'dateCreated' => $dateCreated,
        'dateModified' => $dateModified
    );

    $data_encoded = json_encode($data);

    echo $data_encoded;
}
*/
loadnote($note_id);