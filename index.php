<?php
// -----------------------------------  Users  ---------------------------------
class Users {
    protected int $_id ;
    protected String $username;
    protected String $email ;
    protected String $password ;
    protected String $role ;
    protected DateTime $created_at ;
    protected DateTime $lastLogin;

    public function __construct($_id, $username, $email, $password, $role = 'guest')
    {
        $this->_id = $_id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->created_at = new DateTime('today');
        $this->lastLogin = new DateTime();
    }

    //read article
    public function readArticles()
    {
        
    }

    // write comment
    public function writeComment()
    {

    }

}


// -----------------------------------  Author  ---------------------------------
class Author extends Users {
    private String $bio;
    protected ?Article $articles;

    public function __construct($_id, $username, $email, $password, $bio)
    {
        parent::__construct($_id, $username, $email, $password, 'Author');
        $this->bio = $bio;

    }
    
    public function createArticle()
    {

    }
    
    public function deleteOwnArticle()
    {
        
    }
    
    public function updateOwnArticle()
    {
        
    }
}

// -------------------------    MODERATOR   --------------------------------------
class Moderateur extends Users {
    // Articles 
    public function createAssignrticle()
    {

    }

    public function deleteArticle()
    {

    }

    public function updateArticle()
    {

    }

    public function publierArticle()
    {

    }

    public function archiveArticle()
    {

    }

    // Categories
    public function createCategory()
    {

    }

    public function deleteCategory()
    {

    }

    public function updateCategory()
    {

    }

    // Comments
    public function updateComment()
    {

    }
    
    public function deleteComment()
    {

    }

}

// -------------------------    Editor   --------------------------------------
class Editor extends Moderateur {
    private String $moderation_Level;

    public function __construct($_id, $username, $email, $password, $moderation_Level)
    {
        parent::__construct($_id, $username, $email, $password, 'editor');
        $this->moderation_Level = $moderation_Level;

    }
}

// -------------------------    ADMIN   --------------------------------------
class Admin extends Moderateur {
    private Boolean $isSuperAdmin;

    public function __construct($_id, $username, $email, $password, $isSuperAdmin = true)
    {
        parent::__construct($_id, $username, $email, $password, 'admin');
        $this->isSuperAdmin = $isSuperAdmin;

    }

    public function createUser()
    {

    }

    public function deleteUser()
    {

    }

    public function assignRole()
    {

    }


}

// ---------------------------------------  CATEGORY    ------------------------------------------
class Category{
    protected $_id ;
    protected $name ;
    protected ?Category $parentCategoryId = null;
    protected $children =  [];

    public function __construct($_id, $name, $parentCategoryId = null){
        $this->_id = $id;
        $this->name = $name;
        $this->parentCategoryId = $parentCategoryId;
    }

    // Add child/subCategory
    public function addSubCategory($category): boolean
    {

    }

    // get Children
    public function getChildren()
    {

    }

    // get parent
    public function getParent()
    {

    }

    // update 
    public function update(): boolean
    {

    }

    // delete
    public function delete(): boolean
    {

    }
}

// ----------------------------     Articles    --------------------------------
class Article{
    protected $created_at;
    protected DateTime $updated_at;
    protected DateTime $author_id;
    protected ?Comment $comments;


    public function __construct($_id, $title, $content, $author_id)
    {
        $this->_id = $_id;
        $this->title = $title;
        $this->content = $content;
        $this->author_id = $author_id;
        $this->created_at = new DateTime('today');
        $this->updated_at = new DateTime();
    }
    
    // -------------- 
    public function addCategory():boolean
    {

    }

    // ---------------
    public function removeCategory():boolean
    {

    }

    // ----------------
    public function publish():boolean
    {

    }
    
    // -------------------
    public function unpablish():boolean
    {

    }
    
    // --------------------
    public function archiver():boolean
    {

    }


}


class Comment {
    private int $id;
    private string $content;
    private int $user_id;
    private int $article_id;

    public function __construct(int $id,string $content,int $user_id,int $article_id) 
    {
        $this->id = $id;
        $this->content = $content;
        $this->user_id = $user_id;
        $this->article_id = $article_id;
    }

    public function update(): bool 
    { 

    }

    public function delete(): bool 
    { 

    }
}


