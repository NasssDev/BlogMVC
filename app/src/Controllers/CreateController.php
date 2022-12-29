<?php

namespace App\Controllers;

use App\Factory\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class CreateController extends AbstractController
{

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

        if(isset($_FILES['illustration'])){

            $tmpNameFile = $_FILES['illustration']['tmp_name'];
            $nameFile = $_FILES['illustration']['name'];
            $sizeFile = $_FILES['illustration']['size'];
            $errorFile = $_FILES['illustration']['error'];

            $tabExtension = explode('.', $nameFile);
            $extension = strtolower(end($tabExtension));
            //Tab des extensions acceptées
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            //Taille max que l'on accepte
            $maxSize = 34000000;
            if(in_array($extension, $extensions) && $sizeFile <= $maxSize && $errorFile == 0){
                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $illustration = $uniqueName.".".$extension;
                move_uploaded_file($tmpNameFile, './upload/'.$illustration);
                $articleManager->insertFile($illustration);
            }else{
                echo "<script type='text/javascript'>alert('problem encountered verify extension and size file'); </script>";
                $this->render('create.php',[$_POST]);
            }
        }

        $getArticle = $articleManager->readOneArticleFromTitle($title);

        if(!$getArticle){
            $articleManager->createArticle($username, $title, $content, $category, $illustration, $descript);
            $this->render('home.php',[]);
        }else{
            echo "<script type='text/javascript'>alert('Title already use, please choose an other.'); </script>";
            $this->render('create.php',[$_POST]);
        }
    }
}