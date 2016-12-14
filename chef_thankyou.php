<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>thank you</title>
        <title>Recipe Database</title>
        <link rel="stylesheet" href="CSS/styles.css">
    </head>
    <?php
        include 'mysql_connect.php';

        $chef_name = $_POST["chef_name"];
        //$cuisine_name = $_POST["cuisine_name"];  
        

        $sql = "INSERT INTO chefs (chef_name)
                VALUES ('$chef_name')";        

        if ($conn->query($sql) === TRUE) {
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    ?>
    <body>
        <header>
            <h1>Chef Added to Database</h1>
        </header>
        <form>
           <div class="contacts">
                <section class="form-group">
                    <h2>Thank you!</h2> <p> Your Chef: <span class="name-pst"><?php echo $_POST["chef_name"]; ?></span>, has been added!</p>
                    <a href= "index.php"<button type="index.php" class="submit-btn">Return to Recipe List</button></a>
                </section>
            </div>
        </form>
    </body>
</html>