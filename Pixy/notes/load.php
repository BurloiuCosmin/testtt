<?php
function loadnotes(){
    $data = array();
    if ( file_exists( dirname(__FILE__) . '/saved/saved' ) ) {
        $json_data = file_get_contents(dirname(__FILE__) . '/saved/saved');
        $data = json_decode($json_data, true);
    }

    return $data;
}

function load_note( $id ) {
    $notes = loadnotes();

    foreach( $notes as $key => $note ) {
        if ( $note['id'] == $id ) {
            return $note;
        }
    }

    return false;
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





