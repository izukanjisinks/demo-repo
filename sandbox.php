<?php 

    if(isset($_POST['submit'])){

        setcookie('gender', $_POST['gender'], time() + 86400);

        session_start();

        $_SESSION['name'] = $_POST['name'] ?? 'No Name';

        header('Location: index.php');
    }

    //classes
    class User {
        private $email;
        private $name;

        public function __construct($name, $email){
            $this->email = $email;
            $this->name = $name;
        }

        public function login(){
            echo $this->name . ' logged in.';
        }

        public function getName(){
            return $this->name;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setName($name){
            if(is_string($name) && strlen($name) > 1){
                $this->name = $name;
                return "name has been updated to $name";
            }else{
                return "not a valid name";
            }
        }
    }

    $user = new User('izukanji', 'izukanjisinks@gmail.com');
    echo $user->setName(5);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" name="name">
        <select name="gender">
            <option value="male">male</option>
            <option value="female">female</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
    
</body>
</html>