<?php

use Rivsen\Demo\Hello;

require_once "vendor/autoload.php";

# Start output buffering
ob_start();

try {
    # try Hello World with composer
    $hello = new Hello();
    echo $hello->hello();
    echo "<br/><br/>";

    var_dump($_SERVER);

    # Try print env var
    echo $_ENV['ENV_VAR'];
    echo "<br/><br/>";

    # Try connect to database
    $pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASS']);
    $statement = $pdo->prepare("SELECT * FROM data");
    $statement->execute();
    $row = $statement->fetch();
    var_dump($row);

    # Try show images in ./images
    # Liste des extensions d'images que vous souhaitez supporter
    $image_extensions = ['jpg', 'jpeg', 'png', 'gif'];

    $images = [];

    # Parcours des extensions d'image et ajout au tableau des résultats
    foreach ($image_extensions as $extension) {
        $images = array_merge($images, glob("images/*.$extension"));
    }

    # Affichage des images
    foreach ($images as $image) {
        echo "<br/><br/>";
        echo "<img src='$image' width='200' height='200' />";
    }
} catch (Exception $e) {
    # Clean output buffer
    ob_clean();

    # Return error code with message
    echo $e->getMessage();

    # Send HTTP error response
    http_response_code(500);
}

# Flush output
ob_end_flush();
