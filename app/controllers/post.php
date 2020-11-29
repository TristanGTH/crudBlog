<?php

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

function postIndex(){
    $posts = getAllPosts();
    view('posts/index', compact('posts'));

}

function postShow($id){


    if (!$post = postValidate($id)) {
        return;
    }
    view('posts/show', compact('post'));

}

function postCreate(){
    view('posts/create');
}

function postStore(){
    $userValidator = v::attribute('title', v::stringType()->length(1, 255))
        ->attribute('content', v::stringType()->length(3));

    $post = (object) $_POST;

    try {
        $userValidator->assert($post);
    } catch (NestedValidationException $exception) {
        $_SESSION['errors'] = 'Le champ titre doit avoir minimum 1 caratère et le champ contenu doit avoir minimun 3 caratères';
        $_SESSION['old'] = $_POST;
        header('location:/articles/create');
        return;
    }

    $post = insertPost($_POST);
    $_SESSION['success'] = 'Article ajouté';
    header("location:/articles");
    return;

}

function postEdit($id){
    if (!$post = postValidate($id)) {
        return;
    }

    view('posts/edit', compact('post'));
}

function postUpdate(){

    // j'ai essayé validator dans succès


    if (!empty($_POST['title']) AND !empty($_POST['content'])){
        $check = editPost($_POST['id'],$_POST);
        if ($check){
            $_SESSION['success'] = 'Article mise à jour';
            header("location:/articles");
            unset($_POST);
        }
    }
    else{
        $_SESSION['errors'] = 'Les champs titre et contenu sont obligatoire';
        $_SESSION['old'] = $_POST;
        header("location:/articles/edit/{$_POST['id']}");
    }
}

function postDestroy($id){
    if (!$post = postValidate($id)) {
        return;
    }

    deletePost($id);
    $_SESSION['success'] = "L'article a bien été supprimé";
    header('Location: /articles');
    return;
}

function postGenerate(){
    view('posts/generate');
}