<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Recipe Web App</title>
        <title>Recipe Mobile App</title>
        <link rel="stylesheet" href="CSS/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="scripts.js"></script>
    </head>
    <body>
        <header>
            <h1>Recipe Database</h1>
        </header>
        <form action="chef_thankyou.php" method="post" enctype="multipart/form-data" class="web-app">
            <div class="contacts">
                <section class="form-group">
                    <ul id="recipe" class="form-fields">
                        
                    </ul>
                </section>
                <section class="form-group">
                    <h3>Please Add a Chef</h3>
                    <ul class="form-fields">
                        <li>
                            <label for="chef_name">Chef:</label>
                            <input type="text" name="chef_name" id="chef_name" placeholder="chef's name" class="text-input">
                        </li>
                    </ul>
                </section>
                <section class="form-submit">
                    <button type="submit" class="submit-btn">submit</button>
                    <!--<button class="delete-btn">delete</button> -->
                    <button type="reset" value="reset" class="reset-btn">reset</button>
                    <a href= "index.php"<button type="index.php" class="submit-btn">Return to Recipe List</button></a>
                </section>
            </div>
        </form>
        <?php
            $conn-close();
        ?>
    </body>
</html>
