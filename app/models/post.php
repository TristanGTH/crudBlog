<?php
use Carbon\Carbon;

function getAllPosts()
{
    $db = dbConnect();
    $statement = $db->query('SELECT id, title, DATE_FORMAT(created_at, "%d/%m/%Y") as created_at_fr FROM posts');
    return $statement->fetchAll(PDO::FETCH_OBJ);
}

function getPostById($id)
{
    $db = dbConnect();
    $statement = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->execute(['id' => $id]);
    $post = $statement->fetchObject();
    $post->created_at = ucfirst(Carbon::parse($post->created_at, 'Europe/Paris')->locale('fr_FR')->diffForHumans());
    return $post;
}

function insertPost($arg){
    $db = dbConnect();

    $statement = $db->prepare('INSERT INTO posts (title, body) VALUES (?,?)');
    return $statement->execute([
        $arg['title'],
        $arg['content']
    ]);
}

function editPost($id, $arg){

    $db = dbConnect();

    $statement = $db->prepare('UPDATE posts SET title = ?, body = ? WHERE id = ?');
     return $statement->execute([
        $arg['title'],
        $arg['content'],
        $id
    ]);

}

function deletePost($id){
    $db = dbConnect();

    $statement = $db->prepare('DELETE FROM posts WHERE id=?');
    return $statement->execute([
        $id
    ]);
}
