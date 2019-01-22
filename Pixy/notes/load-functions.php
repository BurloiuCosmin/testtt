<?php
function loadnotes(){

    $json_data = file_get_contents(dirname(__FILE__) . '/saved/saved');
    $data = json_decode($json_data, 1);

    return $data;
}

/**
 * @param $note_id
 * @return array|mixed|object
 */

function loadnote($id ){
    $notes = loadnotes();

    if ( ! empty( $notes[ $id ] ) ) {
        return $notes[ $id ];
    }

    return false;
}



