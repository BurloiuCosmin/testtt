<?php
require_once 'load.php';

function get_last_id()
{
    return (int)(file_get_contents(dirname(__FILE__) . '/id_list/id_list'));
}

function save_note( $data ) {
    if ( $data['id'] > get_last_id() ) {
        // Schimbam id-ul stocat local
        file_put_contents(dirname(__FILE__) . '/id_list/id_list', $data['id']);
    }

    // Incarcam notes.
    $notes = loadnotes();

    $found = false;
    foreach( $notes as $key => $note ) {
        if ( $note['id'] == $data['id'] ) {
            // Megahack
            if ( empty( $notes[ $key ]['dateCreated'] ) ) {
                $notes[ $key ]['dateCreated'] = $data['dateModified'];
            }
            $notes[ $key ] = array_merge( $notes[ $key ], $data );
            $found = true;
            break;
        }
    }

    if ( ! $found ) {
        $data['dateCreated'] = time();
        $notes[] = $data;
    }

    //Adaugam datele noi la array-ul nostru


    //Dam overwrite fisierului ce contine doar array-urile cu notes vechi pentru a adauga arrayul ce contine si pe cel nou
    file_put_contents(dirname(__FILE__) . '/saved/saved', json_encode($notes) );
}