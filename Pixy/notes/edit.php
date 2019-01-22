<?php
require_once 'load.php';
require_once 'save.php';

/*
 * Handle saving
 */
if (!empty($_POST['id']) && !empty($_POST['content'])) {
    $data = array(
        'id' => $_POST['id'],
        'title' => ( empty( $_POST['title'] ) ? '' : $_POST['title'] ),
        'content' => $_POST['content'],
        'dateModified' => time(),
    );
    save_note( $data );

    echo 'Note has been saved successfully!';
}

$title = '';
$content = '';
$id = false;

if ( ! empty( $_GET['note_id'] ) ) {
    $note = load_note( $_GET['note_id'] );

    if ( ! empty( $note ) ) {
       $id = $note['id'];
       $title = $note['title'];
       $content = $note['content'];
    }
}

if ( empty( $id ) ) {
    $id = intval( get_last_id() ) + 1;
}
?>

<?php include 'header.php'; ?>

<h1>Text Editor</h1>

<form id='editor' method='post' accept-charset='UTF-8'>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div>
        <p>TITLE:</p>
        <input type='text' name='title' maxlength="50" value="<?php echo $title; ?>">
        <br>

        <p>CONTENT:</p>
        <textarea rows="10" cols="30" type='text' name='content' maxlength="300" required ><?php echo $content; ?></textarea>
        <br>
        <input type="submit" value="SAVE">
    </div>
</form>
<br>



<a href="http://pixy.local/notes/" >Back <<<</a>

<?php include 'footer.php'; ?>

