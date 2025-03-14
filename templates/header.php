<?php 
    session_start();
    $name = $_SESSION['name'];

    //get cookie
    $gender = $_COOKIE['gender'] ?? 'Unknown';
?>

<head>
    <title>Ninja Pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important; 
        }
        form{
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Ninja Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li class="grey-text">Hello <?php echo htmlspecialchars($name) ?></li>
            <li class="grey-text">(<?php echo htmlspecialchars($gender)?>)</li>
                <li><a href="pages/add.php" class="btn brand z-depth-2">Add a pizza</a></li>
            </ul>
        </div>
    </nav>