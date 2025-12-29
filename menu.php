<?php
require_once 'Classes.php';
require_once 'collection.php';



$validChoice = false;

$articles = [
    $article1 = new Article(1, 'Movies', 'there is a lot of good movies', 'published', 7),
    $article2 = new Article(2, 'Anime', 'hianime is the best website to watch animes', 'published', 7),
    $article3 = new Article(3, 'novels', 'The novels are the best way to improve your vocabulery', 'published', 7),
    $article4 = new Article(4, 'games', 'games are such a beautiful way to redius stress', 'draft', 7),
    $article5 = new Article(5, 'Anime', 'hianime is the best website to watch animes', 'published', 7),
    $article6 = new Article(6, 'novels', 'The novels are the best way to improve your vocabulery', 'published', 4),
    $article7 = new Article(7, 'novels', 'The novels are the best way to improve your vocabulery', 'published', 4),
    $article8 = new Article(8, 'novels', 'The novels are the best way to improve your vocabulery', 'published', 4)
];

$comment1 = new Comments(1, "Great article!", 3, 3);
$comment2 = new Comments(2, "Very helpful, thanks!", 4, 3);

$article3->addComment($comment1);
$article3->addComment($comment2);

$users = [
    new Admin(2,'sara', 'sara@gmail.com', 'sara2025', true),
    new Editor(3,'hajar', 'hajar@gmail.com', 'hajar2025', 'junior'),
    new Author(7,'ahmed', 'ahmed@gmail.com', 'ahmed2025','bio',$articles),
    new Author(4,'imad', 'imad@gmail.com', 'imad2025','bio',$articles)
];


$collection = new Collection($users, $articles);


function clearSystem(){echo "\033[2J\033[H";}

do {
start :
clearSystem();

echo "\e[33m============================\e[0m\n";
echo "\e[33m| Welcome to our Blog ^^ |\e[0m\n";
echo "\e[33m============================\e[0m\n";

echo "1 => Login\n";
echo "2 => Continue without account\n";
echo "0 => Exit Program\n";
$mainChoice = trim(fgets(STDIN));
switch($mainChoice){
        // -------------------------------      LOGIN       ---------------------------------------------0
    case '1':
       echo "\033[2J\033[H";
        echo "enter username : ";
        $username = trim(fgets(STDIN));

        echo "\nenter password : ";
        $password = trim(fgets(STDIN));

        if($collection->login($username, $password)){
            clearSystem();
            echo "\e[32m the login was succesful \e[0m\n";
            echo "logged in as : \e[31m" . $collection->getCurrentUserRole() . "\e[0m\n";
            // Auhtor
            if($collection->getCurrentUser() instanceof Author){
                authorMenu :
                echo "1 => see all articles\n";
                echo "2 => see my articles\n";
                $choix3 = trim(fgets(STDIN));
                switch($choix3){
                    case '1':
                        clearSystem();
                        //list des articles :
                        print_r($collection->showArticles());

                        author_allArticlesMenu:
                        echo "1 => read article\n";
                        echo "2 => return\n";
                        $choix4 = trim(fgets(STDIN));
                        if($choix4 == 1){
                            clearSystem();
                            echo "enter the _id of the article :\n";
                            $article_id = trim(fgets(STDIN));
                            // check if the article exist or not then show its infos
                            //if there is indeed the article we chow this menu
                            echo "1 => see comments";
                            echo "2 => add comment";
                            echo "3 => return \n";

                            auhtor_seeSingleArticle :

                            $choix5 = trim(fgets(STDIN));
                            if($choix5 == 1){
                                clearSystem(); 
                                /*show comments*/
                                echo "1 => return";
                                $choix7 = trim(fgets(STDIN));
                                if($choix7 == 1){goto auhtor_seeSingleArticle;}
                                else{exit;}
                            ;}
                            
                            if($choix5 == 2){
                                clearSystem();
                                 /* add comment function */;}
                            if($choix5 == 3){ goto author_allArticlesMenu;}
                            else{echo "invalid choice! try again\n"; goto auhtor_seeSingleArticle;}
                        }
                        if($choix4 == 2){
                            clearSystem();
                            goto authorMenu;
                        }
                        else {
                            clearSystem();
                            echo "invalid choice! try again";
                            goto author_allArticlesMenu;
                        }
                    case '2':
                        clearSystem();
                        $_id = $collection->getCurrentUserID();
                        $collection->showCurrentUserArticles();
                        // var_dump($this->current_user);
                        // var_dump($this->current_user->articles);
                        author_seeMyArticles:
                        echo "1 => read article\n";
                        echo "2 => delete article\n";
                        echo "3 => update article\n";
                        echo "4 => publish article\n";
                        echo "5 => return\n";

                        $choix8 = trim(fgets(STDIN));
                        switch ($choix8) {
                            case '1':
                                clearSystem();
                                echo "_id : ";
                                $want_to_read_id =(int) trim(fgets(STDIN));
                                


                                # code...
                                
                                break;
                            case '2':
                                clearSystem();
                                echo "_id : ";
                                $want_to_delete_id =(int) trim(fgets(STDIN));
                                if ($collection-> deleteCurrentUserArticle($want_to_delete_id)) {
                                    echo "\e[32mArticle deleted successfully!\e[0m\n";
                                } else {
                                    echo "\e[31mYou can't delete this article or it does not exist.\e[0m\n";
                                }

                                # code...
                                break;
                            case '3':
                                clearSystem();
                                # code...
                                break;
                                case '4':
                                    chosePUvlishedID:
                                    clearSystem();
                                    $collection->showCurrentUserArticles();
                                    echo "chose the _id of the article you want to publish : \n";
                                    if($collection->checkIfArticleExistThenPublish($want_to_publish_id)){
                                        echo "\e[32marticle published successfully!\e[0m\n";
                                        goto author_seeMyArticles;

                                    }else{
                                        echo "\e[33mthis article is already pulblished or does not exist!\e[0m\n";
                                        goto chosePUvlishedID;
                                    }
                                    // break;
                                # code...
                            case '5':
                                clearSystem();
                                goto authorMenu;
                                break;
                            
                            default:
                            clearSystem();
                                echo "invalid choice! try again";
                                goto authorMenu;
                                
                        }
                    case '555':
                        clearSystem();
                        $collection->logout();
                        goto start;
                    case '0':
                        exit();
                    default :
                        clearSystem();
                        echo "invalid choice! try again";
                        goto authorMenu;

                }
            }

            // Admin and Editor
            if($collection->getCurrentUser() instanceof Moderateur){
                clearSystem();
                echo "1 => see all articles";
                echo "2 => ";
                $choix6 = trim(fgets(STDIN));
                switch ($choix6) {
                    case '1':
                        clearSystem();
                        # code...
                        break;
                    case '555':
                        clearSystem();
                        $collection->logout();
                        goto start;
                    case '0':
                        exit();
                    default:
                    clearSystem();
                        echo "invalid choice! try again";
                        goto authorMenu;
                        break;
                }
            }
            echo "555 => Logout\n";
            echo "0 => Exit\n";
            // print_r($collection->getCurrentUser()) ;
        }else{
            echo "something went wrong!";
        }
        $validChoice = true;
        break;

        // -------------------------------      NORMAL USER     ---------------------------------------------0
    case '2':
        startCase2 :
        clearSystem();
        echo "\e[32m happy reading ^^\e[0m\n";

        // sub menu
        echo "1 => See all articles \n";
        echo "2=> return \n";
        echo "0 => Exit Program\n";

        $choice1 = trim(fgets(STDIN));
        switch($choice1){
            case "1": // see all articles
                clearSystem();
                print_r($collection->showArticles());

                //sub menu
                subStartCase2_1:
                echo "1 => read Article\n";
                echo "2 => return\n";
                $choice2 = trim(fgets(STDIN));
                switch($choice2){
                    case "1": // read article
                        clearSystem();
                        $articleID = trim(fgets(STDIN));
                        // show article if exist
                        break;

                    case '2': // return
                        clearSystem();
                        goto startCase2;

                    default :
                        clearSystem();
                        echo "invalid choice! try again";
                        goto subStartCase2_1;
                }
                // end of sub menu
            case 2:
                goto start;
            case 0:
                echo "\e[33mexit program...\e[0m\n";
                exit();
            default :
        }
        // end of sub menu

        $validChoice = true;
        break;



        // ---------------------------------            EXIT PROGRAM      -------------------------------------------0
    case '0':
        clearSystem();
        echo "\e[33mexit program...\e[0m\n";
        exit();

        // ---------------------------------        INVALID CHOICE      -------------------------------------------0
    default:
        clearSystem();
        echo "please chose one of the existing choices!!\n";
        goto start;
        $validChoice = false;
        break;
}
} while(!$validChoice);
