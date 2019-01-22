<?php
include 'header.php';
require_once 'load.php';

function viewnotes($data){ ?>
    <h2>All Notes</h2>
    <?php if ( empty( $data ) ) { ?>
        <h3>No notes to see here!!</h3>
    <?php } else { ?>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Created</th>
        <th>Last Modified</th>
        <th>Controls</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($data as $key => $line) { ?>
            <tr>
                <td><?php echo $line['id']; ?></td>
                <td><?php echo $line['title']; ?></td>
                <td><?php echo date('Y/m/d H:i:s', $line['dateCreated']); ?></td>
                <td><?php echo date('Y/m/d H:i:s', $line['dateModified']); ?></td>
                <td>
                    <a href="http://pixy.local/notes/view.php?note_id=<?php echo $line['id']; ?>">View</a>&nbsp;|&nbsp;
                    <a href="http://pixy.local/notes/edit.php?note_id=<?php echo $line['id']; ?>">Edit</a>&nbsp;|&nbsp;
                    <a href="http://pixy.local/notes/delete.php?note_id=<?php echo $line['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php }
    } ?>
    </tbody>
</table>

<?php



    //for($i=1;$i<=count($data[$id]);$i)
    //echo $data;

    /*
$lines = file_get_contents(dirname(__FILE__) . '/saved/saved');

echo str_replace("\n","&lt;br&gt;",$lines);*/

}


viewnotes(loadnotes());

include 'footer.php';