<?php

require_once 'models/Post.php';

class BlogController
{
    public function showAllPosts(): void
    {
        $posts = Post::getAll();
        include 'views/postsView.php';
    }
}