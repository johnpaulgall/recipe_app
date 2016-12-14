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
        $recipe_id = $_GET["recipe_id"];
        $recipe_name = $_POST["recipe_name"];
        $description = $_POST["description"];
        //$cat_name = $_POST["cat_name"];
        $chef_name = $_POST["chef_id"];
        //$cuisine_name = $_POST["cuisine_name"];
        
        if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];                        
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];   
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        $file_path="images/".$file_name;
        $expensions= array("jpeg","jpg","png");         
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
        }               
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,$file_path);
            echo "Success";
        }else{
            print_r($errors);
            }
        }            

        $sql = "UPDATE recipe
                SET recipe_name = '$recipe_name', description = '$description', chef_id = '$chef_name', images = '$file_path'
                WHERE recipe_id = '$recipe_id'";        

        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    ?>
    <body>
    	<header>
            <h1>Recipe Database</h1>
        </header>
        <form>
    	   <div class="contacts">
                <section class="form-group">
                    <h2><p>Thank you for updating your recipe!</p><span class="name-pst"><?php echo $_POST["recipe_name"]; ?></span></h2>
                    <ul class="form-fields2">
                        <li><label for="description">Description:</label><?php echo $_POST["description"]; ?></li>
    		            <li><label for="chef_name">Chef: </label><?php echo $_POST["chef_id"]; ?></li>
    		        </ul>
                    <a href= "index.php"<button type="index.php" class="submit-btn">Return to Recipe List</button></a>
                </section>
            </div>
        </form>
    </body>
</html>