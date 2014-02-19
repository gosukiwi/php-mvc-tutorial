<?php
namespace App\Models;

class Post extends \ActiveRecord\Model
{
    // Validate the size of...
    static $validates_size_of = array(
        // the title, within 5 and 25 characters
        array('title', 'within' => array(5, 25)),
        // the content, at least 15 characters
        array('content', 'minimum' => 15),
    );

    static $validates_presence_of = array(
        array('created'),
        array('updated'),
    );
}
