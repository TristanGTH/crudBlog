<?php

function postIndex(){
    $posts = getAllPosts();
    view('posts/index.php', compact('posts'));
}

function postShow(){

    if (empty($_GET['id'])) {
        http_response_code(400);
        echo "<html><body>Bad request</body></html>";
        return;
    }
    $post = getPostById($_GET['id']);
    if (!$post) {
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return;
    }
    view('posts/show.php', compact('post'));

}

function postCreate(){
    view('posts/create.php', []);
}

function postStore(){
    if (!empty($_POST['title']) AND !empty($_POST['content'])){
        $check = insertPost($_POST);
        if ($check){
            $_SESSION['success'] = 'Article ajouté';
            header("location:/articles");
            unset($_POST);
        }
    }
    else{
        $_SESSION['errors'] = 'Les champs titre et contenu sont obligatoire';
        $_SESSION['old'] = $_POST;
        header('location:/articles/create');
    }
}

function postEdit(){
    if (empty($_GET['id'])) {
        http_response_code(400);
        echo "<html><body>Bad request</body></html>";
        return;
    }
    $post = getPostById($_GET['id']);
    if ($post) {
        view('posts/edit.php', compact('post'));
    }
    else{
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return;
    }
}

function postUpdate(){
    if (!empty($_POST['title']) AND !empty($_POST['content'])){
        $check = editPost($_GET['id'],$_POST);
        if ($check){
            $_SESSION['success'] = 'Article mise à jour';
            header("location:/articles");
            unset($_POST);
        }
    }
    else{
        $_SESSION['errors'] = 'Les champs titre et contenu sont obligatoire';
        $_SESSION['old'] = $_POST;
        header("location:/articles/edit?id={$_GET['id']}");
    }
}

function postDestroy(){
    if (empty($_GET['id'])) {
        http_response_code(400);
        echo "<html><body>Bad request</body></html>";
        return;
    }
    $check = deletePost($_GET['id']);
    if ($check){
        $_SESSION['success'] = 'Article supprimé';
        header("location:/articles");
        unset($_POST);
    }
    else{
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return;
    }
}