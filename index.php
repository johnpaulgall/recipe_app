<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
     	<title>Recipe Database</title>
        <title>Recipe web app</title>
        <link rel="stylesheet" href="style-card.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    </head>
    <body>
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
        <header class="masthead clear">
            <div class="centered">
                <div class="site-branding">
                    <h1 class="site-title">RECIPE DATABASE</h1>
                </div><!-- .site-title -->
            </div><!-- .centered -->
        </header><!-- .masthead -->
        <main class="main-area">
            <div class="centered">
                <input style = "font-size: 20pt" onclick = "window.location = 'add_chef.php';" type="button" name="submit" value="Add Chef" class="search-btn"/>
                <section class="cards">
                <input style = "font-size: 20pt" onclick = "window.location = 'add_recipe.php';" type="button" name="submit" value="Add Recipe" class="search-btn"/>
                <section class="cards">
                <?php
                    include 'mysql_connect.php';  

                    $sql = "SELECT *
                            FROM recipe 
                                JOIN chefs
                                ON recipe.chef_id = chefs.id";   

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $recipe_id = $row["recipe_id"];
                            $recipe = $row["recipe_name"];
                            $description = $row["description"];
                            $chef = $row["chef_name"];
                            $file_path = $row["images"];
                            $delete_recipe = "recipe_delete.php?recipe_id=" . $recipe_id . "";
                            $edit_recipe = "recipe_edit.php?recipe_id=" . $recipe_id . "";
                ?>
                    <article class="card">
                        <div class="card-content">
                            <a href="#">
                                <picture class="thumbnail">
                                <img src= "<?php echo $file_path; ?>">
                                </picture>
                                <h3>Recipe: <?php echo $recipe; ?></h3>
                                <p>Description: <?php echo $description; ?></p>
                                <p>Chef: <?php echo $chef; ?></p>
                            </a>
                            <a href="<?php echo $delete_recipe; ?>"><input style = "font-size: 16pt" type="button" name="submit" value="Delete" class="search-btn"/></a>
                            <a href="<?php echo $edit_recipe; ?>"><input style = "font-size: 16pt" type="button" name="submit" value="Edit" class="search-btn"/></a>
                        </div><!-- .card-content -->
                    </article>
                <?php
                        }
                    }
                    $conn->close();
                ?>
                </section><!-- .cards -->
            </div><!-- .centered -->
        </main>
        <footer class="footer-area">
            <div class="centered"></div><!-- .centered -->
        </footer>
    </body>
</html>