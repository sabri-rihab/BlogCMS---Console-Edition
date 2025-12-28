<?php
require_once 'Classes.php';


class Collection {
protected array $users;
// private $categories = [];
private $current_user = null; 


public function __construct($users)
{
    $this->users = $users;
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

public function getCurrentUserRole(){
    if(!$this->current_user){return null;}
    if($this->current_user instanceof Admin){return 'admin';}
    if($this->current_user instanceof Author){return 'admin';}
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

//---------------------------     Get Current User Role     ---------------------------


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
    
    // $username = getUserNameById($_id);
    foreach($this->users as $user){
        if($user instanceof Author){
            $user->readArticle(); 
        }
    }
}



}

// $collection = new Collection();
// $result = $collection->login('ahmed', 'ahmed2025');
// // echo $result ;

// $result1 = $collection->isLoggedIn();
// // echo $result1 ;
