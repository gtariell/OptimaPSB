<h1><?= $board->name ?> (Jira)</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>status</th>
        <th></th>
    </tr>
    <?php foreach ($issues as $issue): ?>
        <tr>
            <td><?=$issue->key?></td>
            <td><?=$issue->fields->summary?></td>
            <td><?=$issue->fields->status->name?></td>
            <td></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
//    debug($board);
?>