<?php
require_once 'Classes.php';


class Collection {
protected array $users;
protected array $articles;
// private $categories = [];
private $current_user = null; 


public function __construct($users, $articles)
{
    $this->users = $users;
    $this->articles = $articles;
}

//----------------------------------     login   ------------------------------------
public function login($username, $password) {
    foreach($this->users as $user){
        if($user->getUserName() === $username && $user->getPassword() === $password){
            $this->current_user = $user;
            return true;
        }
    }
    return false;
}

//----------------------------------     logout   ------------------------------------
public function logout() {
    $current_user = null;
    return;
}

//----------------------------------     Current User   ------------------------------------
public function getCurrentUser() {
    return $this->current_user;
}
public function getCurrentUserID() {
    return $this->current_user->getUserID();
}

public function getCurrentUserRole(){
    if(!$this->current_user){return null;}
    if($this->current_user instanceof Admin){return 'admin';}
    if($this->current_user instanceof Author){return 'author';}
    if($this->current_user instanceof Editor){return 'editor';}
    return 'guest';
}

//----------------------------------     check if logged in   ------------------------------------
public function isLoggedIn() {
    if($this->current_user){
        return true;
    }else{
        return false;
    }
}


//---------------------------     find username by id     ---------------------------
    // public function getUserNameById($_id){
    //     foreach($this->users as $user){
    //         if($user->_id == $_id){
    //             return $user->username;
    //         }
    //         }
    // }

//----------------------------------     show published Articles   ------------------------------------
public function showArticles(){
        foreach($this->users as $user){
            if($user instanceof Author){
                $user->readArticle(); 
            }
        }
}

public function showArticleByID($_id): bool
{
    foreach ($this->users as $user) {
        if ($user instanceof Author) {
            foreach ($user->getArticles() as $article) {
                if ($article->getArticleID() == $_id) {
                    $user->readArticleById($_id);
                    return true;
                }
            }
        }
    }
    return false;
}


public function showCurrentUserArticles(){
        if($this->current_user instanceof Author){
            $this->current_user->readArticleByUser($this->current_user->getUserID()); 
    }
}

public function checkIfArticleExistThenPublish($_id){
    foreach($this->articles as $article){
        if($article->getArticleID() == $_id){
            return $article->publish();
        }

    }
    return false;
}


public function deleteCurrentUserArticle($_id)
{
    if (!($this->current_user instanceof Author)) {
        return false;
    }
    return $this->current_user->deleteOwnArticle($_id);
}
   
}


