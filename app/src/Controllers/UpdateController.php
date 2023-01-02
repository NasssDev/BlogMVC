<?php

namespace App\Controllers;

use App\Factory\PDOFactory;
use App\Managers\ArticleManager;
use App\Managers\SessionManager;
use App\Routes\Route;

class UpdateController extends AbstractController
{

    #[Route('/update', name: "update", methods: ["POST"])]
    public function update()
    {

        $id = filter_input(INPUT_POST, "choice");

        $articleManager = new ArticleManager(new PDOFactory());
        $article = $articleManager->readOneArticle($id);

        $sessionManager = new SessionManager();
        $logStatut = $sessionManager->check_login();

        $this->render("updateOne.php", ["article" => $article, "article_id" => $id], "Update one article", $logStatut);
        
    }

    #[Route('/updateOne/{id}', name: "update", methods: ["POST"])]
    public function updateOne($id)
    {
        $sessionManager = new SessionManager();
        $username = $sessionManager->getSessionUsername();

        $title = filter_input(INPUT_POST, "title");
        $content = filter_input(INPUT_POST, "content");
        $category = filter_input(INPUT_POST, "category");
        $descript = filter_input(INPUT_POST, "descript");
        $statut = filter_input(INPUT_POST, "statut");
        
        $articleManager = new ArticleManager(new PDOFactory());

        if(isset($_FILES['illustration'])){

            $tmpNameFile = $_FILES['illustration']['tmp_name'];
            $nameFile = $_FILES['illustration']['name'];
            $sizeFile = $_FILES['illustration']['size'];
            $errorFile = $_FILES['illustration']['error'];

            $tabExtension = explode('.', $nameFile);
            $extension = strtolower(end($tabExtension));

            // on garde le nom du fichier sans extension pour l'ajouter au nom
            $nameWithoutExt = $tabExtension[0];

            //Tab des extensions acceptées
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            //Taille max acceptée
            $maxSize = 34000000;
            if(in_array($extension, $extensions) && $sizeFile <= $maxSize && $errorFile == 0){
                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $illustration = $nameWithoutExt.'_'.$uniqueName.".".$extension;
                move_uploaded_file($tmpNameFile, './upload/'.$illustration);
                @unlink( './upload/'.$_POST['oldFile']);
                $articleManager->insertFile($illustration);
            }else{
                echo "<script type='text/javascript'>alert('problem encountered verify extension and/or size file'); </script>";
                $this->render('update.php',[$_POST]);
            }
        }else{

            $illustration = $_POST['oldFile'];
        }

        $articleManager->updateArticle($id, $username, $title, $content, $category, $illustration, $descript, $statut);
        
        header('location: /');
    }


}
