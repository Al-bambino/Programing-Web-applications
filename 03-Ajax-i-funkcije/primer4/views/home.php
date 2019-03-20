<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prvi srpski ustanak</title>
</head>
<body>
<h1>Srbi</h1>
<div id="first" >
    <ul id="srbi">
    </ul>
</div>
<div>
    <form method="post" id="form" action="/primer/controllers/homeController.php">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <span class="error"> <?php echo $_GET['nameErr'] ;?></span>
        </div>
        <!--    <br><br>-->
        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required="required">
            <span class="error"> <?php echo $emailErr;?></span>
        </div>
        <!--    <br><br>-->
        <div>
            <label for="yearOfBirth">Year of brith:</label>
            <input type="number" name="yearOfBirth" id="yearOfBirth">
            <span class="error"> <?php echo $emailErr;?></span>
        </div>
        <br><br>
        <div>
            <label for="website">Website:</label>
            <input type="text" name="website" id="website">
            <span class="error"><?php echo $websiteErr;?></span>
        </div>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea>
        <br><br>
        <label for="female">Female</label>
        <input type="radio" name="gender" value="female" id="female">
        <label for="male">Male</label>
        <input type="radio" name="gender" value="male" id="male">
        <label for="other">Other</label>
        <input type="radio" name="gender" value="other" id="other" >
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>

<div>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
    <script src="/primer2/js/script.js"></script>
</div>
</html>