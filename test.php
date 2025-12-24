<?php
class Users {
    public  $username;
    public  $email ;
    public  $role ;


    public function __construct($username, $email, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    public function readArticles()
    {
        // echo $this->username;
        echo "username :  $this->username , email: $this->email <br>";
    }

    public function estAuteur(){
        if($this->role === 'auteur'){
            return true;
        }else {
            return false;
        }
    }
}
$user = new Users("ahmed", "ahmed@gmail.com", 'auteur');
$user->readArticles();
echo "<br>";
if($user->estAuteur()){
    echo 'oui';
}else{
    echo 'non';
}


class Article{
    protected $_id;
    protected $title;
    protected $content;
    protected $status;


    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->status = "brouillon";
    }

    public function readArticle(){
        echo "title : $this->title, content : $this->content, status : $this->status \n";
        return;
    }
    public function publier(){
        $this->status = "publié";
        return;
    }
}

$article = new Article("the world", "the world is happy");
$article->readArticle();
$article->publier();
$article->readArticle();
