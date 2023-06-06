<?php
if (empty($items)) {
    ?>
    <div>table message is empth</div>
<?php
} else {
    ?>
    <table style="width: 100%; border: solid 1px #999999">
        <tr>
            <td>ID</td>
            <td>Message</td>
            <td>Time Create</td>
        </tr>
        <?php
        foreach ($items as $item) {
        ?>
            <tr>
                <td><?php echo $item->entity->id; ?></td>
                <td><?php echo nl2br($item->entity->message); ?></td>
                <td><?php echo $item->entity->created_at; ?></td>
            </tr>
            <?php
        }
            ?>
    </table>
<?php
}