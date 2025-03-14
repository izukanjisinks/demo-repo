<?php   
   include('../config/db_connect.php');

    $errors = array(
        'email' => '',
        'title' => '',
        'ingredients' => ''
    );

    $email = '';
    $title = '';
    $ingredients = '';

    if(isset($_POST['submit'])){
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']);
        // echo htmlspecialchars($_POST['email']);
        if(empty($_POST['email'])){
            $errors['email'] = "invalid email entry <br/>";
        }else{
            $email = $_POST['email'];
            //if email is invalid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'email must be valid!';
            }
        }

        if(empty($_POST['title'])){
            $errors['title'] = "invalid title entry <br/>";
        }else{
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = "title must be letters and speces only!";
            }
        }

        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = "invalid ingredients entry <br/>";
        }else{
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = "ingredients must be a comma separated list!";
            }       
         }

         //array filter loops through the array
         //to check if any values are set
         //no values set returns false
         //if values set returns true
         if(array_filter($errors)){
            // echo "errors in form";
         }else{
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            //create sql
            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title','$email','$ingredients')";

            //save to db
            if(mysqli_query($conn, $sql)){
                header('Location: ../index.php');
            }else{
                echo 'query error ' . mysqli_error($conn);
            }
            
         }
    }
?>

<!DOCTYPE html>
 <html lang="en">
  <?php include '../templates/header.php'?>
  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" class="white" method="POST">
        <label for="">Your Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email)?>">
        <div class="red-text"><?php echo $errors['email'] ?></div>
        
        <label for="">Pizza Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
        <div class="red-text"><?php echo $errors['title'] ?></div>

        <label for="">Ingredients(comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients)?>">
        <div class="red-text"><?php echo $errors['ingredients'] ?></div>

        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
  </section>
  <?php include '../templates/footer.php'?>
 </html>