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
        

        $sql = "INSERT INTO recipe (recipe_name, description, chef_id, images)
                VALUES ('$recipe_name', '$description','$chef_name', '$file_path')";        

        if ($conn->query($sql) === TRUE) {
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    ?>
    <body>
    	<header>
            <h1>Recipe Added to Database</h1>
        </header>
        <form>
    	   <div class="contacts">
                <section class="form-group">
                    <h2>Thank you!</h2> <p> Your recipe: <span class="name-pst"><?php echo $_POST["recipe_name"]; ?></span>, has been added!</p>
                    <a href= "index.php"<button type="index.php" class="submit-btn">Return to Recipe List</button></a>
                </section>
            </div>
        </form>
    </body>
</html>