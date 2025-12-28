<?php
// class Users {
//     public  $username;
//     public  $email ;
//     public  $role ;


//     public function __construct($username, $email, $role)
//     {
//         $this->username = $username;
//         $this->email = $email;
//         $this->role = $role;
//     }

//     public function readArticles()
//     {
//         // echo $this->username;
//         echo "username :  $this->username , email: $this->email <br>";
//     }

//     public function estAuteur(){
//         if($this->role === 'auteur'){
//             return true;
//         }else {
//             return false;
//         }
//     }
// }
// $user = new Users("ahmed", "ahmed@gmail.com", 'auteur');
// $user->readArticles();
// echo "<br>";
// if($user->estAuteur()){
//     echo 'oui';
// }else{
//     echo 'non';
// }


// class Article{
//     protected $_id;
//     protected $title;
//     protected $content;
//     protected $status;


//     public function __construct($title, $content)
//     {
//         $this->title = $title;
//         $this->content = $content;
//         $this->status = "brouillon";
//     }

//     public function readArticle(){
//         echo "title : $this->title, content : $this->content, status : $this->status \n";
//         return;
//     }
//     public function publier(){
//         $this->status = "publié";
//         return;
//     }
// }

// $article = new Article("the world", "the world is happy");
// $article->readArticle();
// $article->publier();
// $article->readArticle();



class Collection {
private $users = [
    
];
private $articles = [];
private $categories = [];
private $current_user = null; // Ajoutez cet attribut
// ... (constructeur et autres méthodes existantes) ...
// MÉTHODE À IMPLÉMENTER :
public function login($username, $password) {
// 1. Parcourir le tableau $this->users
// 2. Pour chaque utilisateur, vérifier si:
// - Le username correspond
// - Le password correspond (utiliser password_verify)
// 3. Si trouvé, définir $this->current_user = $user
// 4. Retourner true si connexion réussie, false sinon
}
public function logout() {
// Définir $this->current_user = null
}
public function getCurrentUser() {
// Retourner l'utilisateur connecté (ou null)
}
public function isLoggedIn() {
// Retourner true si un utilisateur est connecté, false sinon
}
// AUTRE MÉTHODE UTILE :
public function displayAllArticles() {
// Afficher tous les articles du tableau $articles
// Format: "1. [Titre] par [Auteur]"
// Note: Pour l'instant, les articles n'ont pas d'auteur
// On affichera juste le titre
}
}
?>

