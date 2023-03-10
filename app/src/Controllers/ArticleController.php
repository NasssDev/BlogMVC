<?php

namespace App\Controllers;

use App\Factory\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\CommentManager;
use App\Managers\UserManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class ArticleController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        $articleManager = new ArticleManager(new PDOFactory());
        $articles = $articleManager->readAllArticles();

        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();
        //echo $sessionManager->getUsername();
        if($logStatut){
            $this->render("crud.php", [], "crud page", $logStatut);
        }else{
            $this->render("home.php", ["articles" => $articles], "Tous les articles", $logStatut);
        }
    }

    /**
     * @param $id
     * @return void
     */
    #[Route('/article/{id}', name: "showOne", methods: ["GET"])]
    public function showOneArticle($id)
    {
        $articleManager = new ArticleManager(new PDOFactory());
        $commentManager = new CommentManager(new PDOFactory());
        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();
        $article = $articleManager->readOneArticle($id);
        $comments = $commentManager->readAllComment($id);
        $username = $sessionManager->getSessionUsername();
        $this->render("showOne.php", ["article" => $article, "comments" => $comments, "logStatut" => $logStatut, "username" => $username], "Un article", $logStatut);
    }
    
}
