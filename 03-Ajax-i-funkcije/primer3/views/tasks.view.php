<?php require 'partials/header.php' ?>

    <h1>My tasks</h1>

    <ul id="tasks">
        <!--        --><?php
        //            foreach ($tasks as $task)
        //            {
        //                echo "<li>". $task['description']. "</li>";
        //            }
        //        ?>
        <?php foreach ($tasks as $task): ?>
            <li>

                <?php if ($task['completed']): ?>
                    <strike> <strong> Description: </strong> <?= $task['description'] ?> </strike>
                <?php else: ?>
                    <?= "<strong> Description: </strong> " . $task['description'] ?>
                <? endif; ?>


                <!--                --><? //= $task['completed'] ?  "<strike>" . $task['description'] ."</strike>" : $task['description'] ?>
            </li>

        <? endforeach; ?>
    </ul>
    <div>
        <form id="add-task" method="post" action="/primer3/add-task.php">
            <div>
                <label for="description">Description:</label>
                <input id="description" name="description" type="text">
            </div>
            <div>
                <label for="completed">Completed:</label>
                <input id="completed" name="completed" value="completed" type="radio">
                <label for="uncompleted">Uncompleted:</label>
                <input type="radio" name="completed" value="uncompleted" id="uncompleted">
            </div>
            <div>
                <input type="submit" value="Add task">
            </div>
        </form>
    </div>
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script src="/primer3/js/script.js"></script>
<?php require 'partials/footer.php' ?>