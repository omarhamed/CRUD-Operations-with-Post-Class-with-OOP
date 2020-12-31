<?php

require_once('Post.php');

$p = new Post();

// Read Records
// var_dump($p->getPosts());
// var_dump($p->getPostById(1));

// add post
// $data = ['title' => 'this is new title','content' => 'this is new content'];
// $p->addPost($data);

// update post
// $data = ['title' => 'this is new title','content' => 'this is new content' , 'id' => 2];
// $p->updatePost($data);

// delete post

$p->deletePost(3);
var_dump($p->getPosts());