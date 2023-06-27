<?php
class Post
{
    public $id;
    public $title;
    public $description;
    public $author;
    public $date;

    public function __construct($id, $title, $description, $author, $date)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->date = $date;
    }
    
    public function create($db){
    return $db->instance->exec("INSERT INTO `post`(`title`,`description`, `author`) VALUES (\"$this->title\",\"$this->description\", \"$this->author\")");
    }

    public static function all($db)
    {
        $result = $db->instance->query("SELECT * FROM `post`")->fetchAll();
        return Post::array($result);
    }

    public static function parse($post)
    {
        return new Post(
            $post["id"]?? null,
            $post["title"]?? null,
            $post["description"]?? null,
            $post["author"]?? null,
            $post["date"]?? null
        );
    }

    public static function array($posts)
    {
        $result = [];

        foreach ($posts as $post) {
            array_push($result, Post::parse($post));
        }
        return $result;
    }
}
?>