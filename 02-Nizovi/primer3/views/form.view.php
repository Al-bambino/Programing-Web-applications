<form method="post" action="/primer3/form.php">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <span class="error">* <?php echo $_GET['nameErr'] ;?></span>
    </div>
<!--    <br><br>-->
    <div>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required="required">
        <span class="error">* <?php echo $emailErr;?></span>
    </div>
<!--    <br><br>-->
    <div>
        <label for="yearOfBirth">Year of brith:</label>
        <input type="number" name="yearOfBirth" id="yearOfBirth">
        <span class="error">* <?php echo $emailErr;?></span>
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