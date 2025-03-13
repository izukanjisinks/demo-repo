<?php
   //  include("database.php");

   // $products = [
   //    ['name' => 'beer', 'price' => 20],
   //    ['name' => 'fanta', 'price' => 15],
   //    ['name' => 'fruticana', 'price' => 10],
   //    ['name' => 'bread', 'price' => 26],
   //    ['name' => 'scones', 'price' => 5],
   // ];

   // foreach($products as $product){
   //    if($product['price'] < 20){
   //       echo $product['name'] . "<br/>";
   //    }else{
   //       echo "{$product['name']}'s too expensive!!" . "<br/>";
   //    }
      
   // }
   
   // $price = 20;

   // if($price < 15){
   //    echo 'the condition is met!';
   // }else if ($price >= 20){
   //    echo 'the condition is not met!';
   // }

   // $name = 'izukanji';

   // function sayHello(){
   //    global $name;
   //    echo "good morning " . $name;
   // }

   // sayHello();
   include('config/db_connect.php');

   //get all pizzas
   $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY create_at';

   $result = mysqli_query($conn, $sql);

   //fetch results rows as an array

   $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

   mysqli_free_result($result);

   mysqli_close($conn);

 ?>

 <!DOCTYPE html>
 <html lang="en">
  <?php include 'templates/header.php'?>

  <h4 class="center grey-text">Pizzas!</h4>
  
  <div class="container">
   <div class="row">

      <?php foreach($pizzas as $pizza): ?>

        <div class="col s6 md3">
          <div class="card z-depth-0">
            <div class="card-content center">
              <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
              <ul>
                <?php foreach(explode(',', $pizza['ingredients']) as $ingredient): ?>
                  <li><?php echo htmlspecialchars($ingredient); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="card-action right-align">
              <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
            </div> 
          </div>
        </div>

       <?php endforeach; //check video 30 for this syntax ?>

   </div>
  </div> 


    <section class="center">
        <h2>Welcome to Ninja Pizza!!</h2> 
    </section>
  <?php include 'templates/footer.php'?>
 </html>