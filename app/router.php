<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


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
}
