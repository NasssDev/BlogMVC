<?php

namespace App\Controllers;

use App\Factory\PDOFactory;
use App\Managers\UserManager;
use App\Managers\ArticleManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class CrudController extends AbstractController
{
    #[Route('/api/crud', name: "crud", methods: ["GET"])]
    public function crud()
    {
        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();

        if ($logStatut) {
            $this->render("crud.php", [], "CRUD page", $logStatut);
        } else {
            $this->render("login.php", [], "Login page", $logStatut);
        }
    }

    #[Route('/crud', name: "crud", methods: ["POST"])]
    public function crud_form()
    {
        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();
        $username = $sessionManager->getSessionUsername();

        $articleManager = new ArticleManager(new PDOFactory());
        $articles = $articleManager->readAllArticlesFromUser($username);

        if ($logStatut) {

            if (isset($_POST['create_bt'])) {
                $this->render("create.php", [], "Post an article.", $logStatut);
            } else if (isset($_POST['read_bt'])) {
                header('location: /read');
            } else if (isset($_POST['update_bt'])) {
                $this->render("update.php", ["articles" => $articles], "Update an article.", $logStatut);
            } else if (isset($_POST['delete_bt'])) {
                $this->render("delete.php", ["articles" => $articles], "Delete page.", $logStatut);
            }
        } else {
            $this->render("login.php", [], "Login page", $logStatut);
        }
    }

    #[Route('/create', name: "crud", methods: ["POST"])]
    public function create_post()
    {
        $articleManager = new ArticleManager(new PDOFactory());
        $sessionManager = new SessionManager();

        $username = $sessionManager->getSessionUsername();

        $title = filter_input(INPUT_POST, "title");
        $content = filter_input(INPUT_POST, "content");
        $category = filter_input(INPUT_POST, "category");
        $descript = filter_input(INPUT_POST, "descript");

        if (isset($_FILES['illustration'])) {

            $tmpNameFile = $_FILES['illustration']['tmp_name'];
            $nameFile = $_FILES['illustration']['name'];
            $sizeFile = $_FILES['illustration']['size'];
            $errorFile = $_FILES['illustration']['error'];

            $tabExtension = explode('.', $nameFile);
            $extension = strtolower(end($tabExtension));
            //Tab des extensions acceptées
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            //Taille max acceptée
            $maxSize = 34000000;
            if (in_array($extension, $extensions) && $sizeFile <= $maxSize && $errorFile == 0) {
                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $illustration = $uniqueName . "." . $extension;
                move_uploaded_file($tmpNameFile, './upload/' . $illustration);
                $articleManager->insertFile($illustration);
            } else {
                echo "<script type='text/javascript'>alert('problem encountered verify extension and size file'); </script>";
                $this->render('create.php', [$_POST]);
            }
        }

        $getArticle = $articleManager->readOneArticleFromTitle($title);

        if (!$getArticle) {
            $articleManager->createArticle($username, $title, $content, $category, $illustration, $descript);
            $this->render('home.php', []);
        } else {
            echo "<script type='text/javascript'>alert('Title already use, please choose an other.'); </script>";
            $this->render('create.php', [$_POST]);
        }
    }
}
