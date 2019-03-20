<?php require 'partials/header.php' ?>

    <h1>My tasks</h1>

    <ul>
<!--        --><?php
//            foreach ($tasks as $task)
//            {
//                echo "<li>". $task['description']. "</li>";
//            }
//        ?>
        <?php foreach ($tasks as $task): ?>
            <li>

                <?php if($task['completed']): ?>
                    <strike> <strong> Description: </strong> <?= $task['description'] ?> </strike>
                <?php else: ?>
                    <?=  "<strong> Description: </strong> " . $task['description'] ?>
                <?endif; ?>


<!--                --><?//= $task['completed'] ?  "<strike>" . $task['description'] ."</strike>" : $task['description'] ?>
            </li>

        <?endforeach; ?>
    </ul>

<?php require 'partials/footer.php'?>