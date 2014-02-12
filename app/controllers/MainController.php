<?php
require(__DIR__ . '/Controller.php');

class MainController extends Controller
{
    public function index() {
        // What time is it? Save it as integer
        $now = time();

        // Create a new post with given data, because activerecord autoloaded 
        // all our models we can just call this class
        $post = new Post(array(
            'title' => 'A blog post',
            'content' => 'Lorem ipsum dolor sit amet',
            'created' => $now,
            'updated' => $now,
        ));

        if($post->is_valid()) {
            // save it to the database!
            $post->save();
        } else {
            // assuming we got the data from the user, we can access all
            // errors using errors->full_messages()
            // for now just dump the data
            var_dump($post->errors->full_messages());
            return;
        }

        // let's now retrieve all posts
        $posts = Post::find('all');
        $this->view('Main/index.html.php', array(
            'posts' => $posts,
        ));
    }
}
