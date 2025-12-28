    <?php
    require_once 'collection.php';

    $article1 = new Article(1, 'Movies', 'there is a lot of good movies', 'published', 2);
    $article2 = new Article(2, 'Anime', 'hianime is the best website to watch animes', 'published', 2);
    $article3 = new Article(3, 'novels', 'The novels are the best way to improve your vocabulery', 'published', 2);

    $userArticles = [$article1,$article2, $article3];
    // -----------------------------------  Users  ---------------------------------
    class Users {
        protected int $_id ;
        protected String $username;
        protected String $email ;
        protected String $password ;
        protected DateTime $created_at ;
        protected DateTime $lastLogin;

        public function __construct($_id, $username, $email, $password)
        {
            $this->_id = $_id;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->created_at = new DateTime('today');
            $this->lastLogin = new DateTime();
        }

        public function getUserName(){
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }
        //read article
        public function readUsers()
        {
            return "username :$this->username\t email :$this->email\n";
        }

        //-------------------------     Manage Articles     ---------------------------
        public function canManageArticle(Article $article){return false;}
        public function canManageArticles(){return false;}


    }

    // ========================================  Author  ======================================== 
    class Author extends Users {
        private String $bio;
        protected array $articles = [];

        public function __construct($_id, $username, $email, $password, $boi= 'this si a bio',$articles = [])
        {
            parent::__construct($_id, $username, $email, $password);
            $this->bio = 'this is a bio';
            $this->articles = $articles;
        }

        public function readUsers()
        {
            return parent::readUsers() . "bio :$this->username\t articles :$this->articles\n";
        }

        public function createArticle(Article $article)
        {
            $this->articles[] = $article;
        }
        
        public function deleteOwnArticle($_id)
        {  
            foreach($articles as $index => $value){
                if($article->getArticleID() == $_id){
                    unset($this->articles[$index]);
                    return true;
                }else{
                    return false;
                }
            }
        }
        //========================================       Read Articles    ======================================== 
        public function readArticle(){
            foreach($this->articles as $article){
                echo "helooo! is this working??????????";

                if($article->getArticleStatus() === 'published'){
                    echo "title : $article->getArticleTitle()  | content : $article->getArticleContent(), author : $this->username";
                }
            }
        }

        
        public function updateOwnArticle()
        {
            
        }



        //--------------------  Manage Articles -------------------------
        public function canManageArticle(Article $article){return true;}
        public function canManageArticles(){return false;}

    }

    // -------------------------    MODERATOR   --------------------------------------
    class Moderateur extends Users {
        // Articles 
        public function canManageArticle(Article $article){return true;}
        public function canManageArticles(){return true;}
        // Categories

        // Comments
    }

    // // -------------------------    Editor   --------------------------------------
    class Editor extends Moderateur {
        private String $moderation_Level;

        public function __construct($_id, $username, $email, $password, $moderation_Level)
        {
            parent::__construct($_id, $username, $email, $password);
            $this->moderation_Level = $moderation_Level;
        }

        public function readUsers()
        {
            return parent::readUsers() . "moderation_Level :$this->moderation_Level\n";
        }

    }

    // -------------------------    ADMIN   --------------------------------------
    class Admin extends Moderateur {
        private Bool $isSuperAdmin;

        public function __construct($_id, $username, $email, $password, $isSuperAdmin = true)
        {
            parent::__construct($_id, $username, $email, $password);
            $this->isSuperAdmin = $isSuperAdmin;

        }
        public function readUsers()
        {
            return parent::readUsers() . "isSuperAdmin :$this->isSuperAdmin\n";
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

    // // ---------------------------------------  CATEGORY    ------------------------------------------
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
        public function addSubCategory($category): bool
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
        public function update(): bool
        {

        }

        // delete
        public function delete(): bool
        {

        }
    }

    // // ----------------------------     Articles    --------------------------------
    class Article{
        protected $_id;
        protected $title;
        protected $content;
        protected $status;
        protected $created_at;
        protected $updated_at;
        protected int $author_id;
        protected array $comments = [];


        public function __construct($_id, $title, $content, $status, $author_id, $comments = [])
        {
            $this->_id = $_id;
            $this->title = $title;
            $this->content = $content;
            $this->status = $status;
            $this->author_id = $author_id;
            $this->created_at = new DateTime('today');
            $this->updated_at = new DateTime();
            $this->comments = $comments;
        }
        
        public function getArticleID(){ return $this->_id; }
        public function getArticleTitle(){ return $this->title; }
        public function getArticleContent(){ return $this->content; }
        // --------------        


        public function addComment(Comments $comment){
            $this->comments = $comment;
        }
        // -------------- 
        public function addCategory(Category $category):bool
        {
            
        }

        // ---------------
        public function removeCategory():bool
        {

        }

        // ----------------
        public function publish():bool { $this->status = 'Publié';}
        public function archiver():bool { $this->status = 'Archiver'; }

    }


    class Comments {
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


