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
    <?php
        include 'mysql_connect.php';

        $recipe_name = addslashes( $_POST["recipe_name"]);
        $description = addslashes($_POST["description"]);
        //$cat_name = $_POST["cat_name"];
        $chef_name = addslashes($_POST["chef_name"]);
        //$cuisine_name = $_POST["cuisine_name"];
    ?>
    <body>
        <header>
            <h1>Recipe Database</h1>
        </header>
        <form action="recipe_thankyou.php" method="post" enctype="multipart/form-data" class="web-app">
            <div class="contacts">
                <section class="form-group">
                    <ul id="recipe" class="form-fields">
                        <picture id="recipe_pic">
                                <img src="images/add_photo.png" alt="add a photo" height="500" width="500">
                        </picture>
                    </ul>
                </section>
                <section class="form-group">
                    <h3>Please Add a Recipe</h3>
                    <ul class="form-fields">
                        <li>
                            <label for="recipe_name">Recipe:</label>
                            <input focus type="text" name="recipe_name" id="yourname" placeholder="recipe name" class="text-input" required autofocus>
                        </li>
                        <li>
                            <label for="description">Description:</label>
                            <input type="text" name="description" id="streetAddress" placeholder="recipe description" class="text-input">
                        </li>
                        <li>
                            <label for="chef_name">Chef:</label>
                            <input type="text" name="chef_name" id="chef_name" placeholder="chef's name" class="text-input">
                        </li>
                        <li>
                            <label for="chef_name">Chef Select:</label>
                            <select name="chef_id">
                                <option value = ""></option>
                                <?php
                                    $sql = "SELECT * 
                                        FROM chefs";
    
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['id'];
                                        $chef_name = $row['chef_name'];
                                ?>
                            <option value ="<?php echo $id; ?>"><?php echo $chef_name;?></option>
                            <?php
                                    }
                                }
                            ?>
                            </select>
                        </li>
                        <li>
                                <input type="file" name="image" /></input>     
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
