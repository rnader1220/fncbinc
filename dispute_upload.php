<?php

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if(!isset($_SESSION['documents'])) {
    $_SESSION['documents'] = [];
}

/*
roadmap for this will have to come from internet.  No archived solutions available,IMHO
THis is too old-school for old school.
Doculinx and Edgevault don't have usable samples

be sure to limit file types in js.
*/


/* pseudocode mid-translation */

if($_FILES) {
    $success = true;
    $message = 'something went wrong.';

    $fileTmpName = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    
    // dont move it ??
    // move it!
    $session_id = session_id();
    $permPathName = $_SERVER['DOCUMENT_ROOT'] ."/upload/{$session_id}_{$fileName}";
    rename($fileTmpName, $permPathName);


    $document = [];
    $document['pathname'] = $permPathName;
    $document['filename'] = $fileName; 
    $_SESSION['documents'][] = $document;


    if ($success) {
        echo json_encode([]);
    } else {
        echo json_encode(['error' => $message]);
    }

}


# needs to return some json




