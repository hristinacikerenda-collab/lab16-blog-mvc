<?php

require_once 'vendor/autoload.php';
require_once 'models/Post.php';

class BlogController
{
    public function showAllPosts(): void
    {
        $search = isset($_GET['search']) ? (string)$_GET['search'] : '';
        $posts = $search !== '' ? Post::searchByTitle($search) : Post::getAll();
        $parsedown = new Parsedown();

        include 'views/postsView.php';
    }
}