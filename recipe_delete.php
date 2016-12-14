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

	$recipe_id = $_GET['recipe_id'];
	
	$sql = "DELETE FROM recipe
			WHERE recipe_id=$recipe_id";
	
	$result = $conn->query($sql);
	
	if ($conn->query($sql) === TRUE) {
	    
	} else {
	    echo "Error deleting record: " . $conn->error;
	}
	
	$conn->close();
?>
<body>
    	<header>
            <h1>Recipe Deleted from Database</h1>
        </header>
        <form>
    	   <div class="contacts">
                <section class="form-group">
                    <h2>Thank you!</h2> <p>Your recipe <span class="name-pst"><?php echo $_POST["recipe_name"]; ?></span> has been deleted!</p>
                    <!--<ul class="form-fields">
                         <li><label for="description">Description:</label><?php echo $_POST["description"]; ?></li>
    		            <li><label for="chef_name">Chef: </label><?php echo $_POST["chef_id"]; ?></li>
    		        </ul> -->
                    <a href= "index.php"<button type="index.php" class="submit-btn">Return to Recipe List</button></a>
                </section>
            </div>
        </form>
    </body>
</html>