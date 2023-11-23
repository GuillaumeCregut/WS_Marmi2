<?php
require __DIR__ . '/controllers/recipe-controller.php';
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if('/'===$urlPath){
    browsRecipes();
} elseif('/show'===$urlPath && isset($_GET['id'])) {
    showRecipe($_GET['id']);
} elseif ('/add'===$urlPath){
    addRecipe();
}
else {
    header('HTTP/1.1 404 Not Found');
}

switch ($urlPath){
    case '/': browsRecipes();
        break;
    case '/show' :
        if(isset($_GET['id'])) {
            showRecipe($_GET['id']);
        } else {
            header('HTTP/1.1 404 Not Found');
        }
        break;
    case 'add':
        addRecipe();
        break;
    default :
        header('HTTP/1.1 404 Not Found');
}