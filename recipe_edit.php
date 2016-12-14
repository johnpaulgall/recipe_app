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

        $recipe_id = $_GET["recipe_id"];

        $sql = "SELECT * 
            FROM recipe";
    
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row['recipe_id']==$recipe_id){
            $recipe_name = $row['recipe_name'];
            $description = $row['description'];
            $chef_id = $row['chef_id'];
            $file_path = $row["images"];
            }
        }
    }
    $edited_recipe = "edited_recipe.php?recipe_id=" . $recipe_id . "";
    ?>
    <body>
        <header>
            <h1>Recipe Database</h1>
        </header>
        <form action="<?php echo $edited_recipe.php;?>" method="post" enctype="multipart/form-data" class="web-app">
            <div class="contacts">
                <section class="form-group">
                    <ul id="recipe" class="form-fields">
                        <picture id="recipe_pic">
                                <img src="<?php echo $file_path; ?>">
                        </picture>
                    </ul>
                </section>
                <section class="form-group">
                    <h3>Update Recipe</h3>
                    <ul class="form-fields">
                        <li>
                            <label for="recipe_name">Update Recipe:</label>
                            <input focus type="text" name="recipe_name" id="yourname" class="text-input" value="<?php echo $recipe_name;?>" required autofocus>
                        </li>
                        <li>
                            <label for="description">Update Description:</label>
                            <input type="text" name="description" id="streetAddress" class="text-input" value="<?php echo $description;?>">
                        </li>
                        <!--<li>
                            <label for="chef_name">Chef:</label>
                            <input type="text" name="chef_name" id="chefname" placeholder="chef's name" class="text-input">
                        </li> -->
                        <label for="chef_name">Chef:</label>
                        <select name="chef_id">
                            <?php
                                $sql = "SELECT * 
                                        FROM chefs";
    
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $id = $row['id'];
                                        $chef_name = $row['chef_name'];
                                        if($row['id'] == $chef_id) {
                            ?>
                            <option value ="<?php echo $chef_id; ?>" selected><?php echo $chef_name;?></option>
                            <?php
                                    }
                                    else {
                            ?>
                            <option value ="<?php echo $id; ?>"><?php echo $chef_name;?></option>
                            <?
                                    }
                                }
                            }
                            ?>
                        </select>
                        <li>
                                <input type="file" name="image" /></input>     
                        </li>
                    </ul>
                </section>
                <section class="form-submit">
                    <button type="submit" class="submit-btn">submit</button>
                    <button class="delete-btn">delete</button>
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
