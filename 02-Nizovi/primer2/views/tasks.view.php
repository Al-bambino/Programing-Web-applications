<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Raf</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="views/about-us.view.php"> About us </a>
            </li>
            <li>
                <a href="views/contact.view.php"> Contact </a>
            </li>
        </ul>
    </nav>

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
</body>
</html>