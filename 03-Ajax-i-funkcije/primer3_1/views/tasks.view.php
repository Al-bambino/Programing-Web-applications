<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Raf</title>
    <style>
        body {
            background-color: azure;
        }
    </style>
</head>
<body>

    <h1>My tasks</h1>

    <ul id="tasks">
                <?php
        //            foreach ($tasks as $task)
        //            {
        //                echo "<li>". $task['description']. "</li>";
        //            }
                ?>
        <?php foreach ($tasks as $task): ?>
            <li><?= $task['subject']?></li>
        <? endforeach; ?>
    </ul>
    <div>
        <form id="add-task" method="post" action="/03-Ajax-i-funkcije/primer3_1/add-task.php">
            <div>
                <label for="subject">Subject:</label>
                <input id="subject" name="subject" type="text">
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
    <script src="/03-Ajax-i-funkcije/primer3_1/js/script.js"></script>
</body>
</html>