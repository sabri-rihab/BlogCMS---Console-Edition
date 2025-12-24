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

    public function __construct($_id, $username, $email, $password, $role)
    {
        $this->_id = $_id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->created_at = DateTime('today');
        $this->lastLogin = new DateTime();
    }

    public function readArticles()
    {
        
    }

    public function writeComment()
    {

    }

}

// -----------------------------------  Author  ---------------------------------
class Author extends Users {
    private String $bio;

    public function __construct($_id, $username, $email, $password, $role, $bio)
    {
        parent::__construct($_id, $username, $email, $password, $role);
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
    public function createAAssignrticle()
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
}

// -------------------------    ADMIN   --------------------------------------
class Admin extends Moderateur {
    private Boolean $isSuperAdmin;

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
