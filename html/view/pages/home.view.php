<h1>Uzduociu sarasas</h1>
<a href="/add-task">New task</a><br>
<?php foreach($tasks->allTasks() as $key=>$value): ?>
    <li>
        <?=$value['subject'];?>
        <?=$value['dueDate'];?>
        <?=$value['status'];?>
        <?=$value['priority'];?>
        <a href="/delete/<?=$value['id'];?>">delete</a>
        <a href="/complete/<?=$value['id'];?>">complete</a>
    </li>
<?php endforeach; ?>