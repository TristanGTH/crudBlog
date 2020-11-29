<?php

/*$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if ($url == "/articles") {
        postIndex();
    }
    elseif ($url == "/articles/show" and isset($_GET['id'])) {
        postShow();
    }
    elseif ($url == '/articles/create'){
        postCreate();
    }
    elseif ($url == '/articles/edit' and isset($_GET['id'])){
        postEdit();
    }
    elseif ($url == '/articles/delete' AND isset($_GET['id'])){
        postDestroy();
    }

    else {
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        return;
    }
}
elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($url == "/articles") {
        postStore();
    }
    if ($url == '/articles/edit'){
        postUpdate();
    }
}



else {
    http_response_code(405);
    echo "<html><body>Method not allowed</body></html>";
    return;
}*/

require '../route/web.php';

if (!empty($_POST['_method'])) {
    $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
}

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo "<html><body>Method not allowed</body></html>";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $args = $routeInfo[2];
        call_user_func_array($handler, $args);
        break;
}
