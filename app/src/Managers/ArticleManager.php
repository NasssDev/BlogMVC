<?php

namespace App\Managers;

use App\Entitys\Article;

class ArticleManager extends BaseManager
{
    public function createArticle($username, $title, $content, $category, $illustration, $descript): void
    {
        $query = $this->pdo->prepare("INSERT INTO article (author, title, content, category, illustration, descript) VALUES (:username, :title, :content, :category, :illustration, :descript) ");
        $query->bindValue('username', $username, \PDO::PARAM_STR);
        $query->bindValue('title', $title, \PDO::PARAM_STR);
        $query->bindValue('content', $content, \PDO::PARAM_STR);
        $query->bindValue('category', $category, \PDO::PARAM_STR);
        $query->bindValue('illustration', $illustration, \PDO::PARAM_STR);
        $query->bindValue('descript', $descript, \PDO::PARAM_STR);
        $query->execute();

    }

    public function readAllArticles(): array
    {
        $query = $this->pdo->query("SELECT * FROM article");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Article($data);
        }

        return $users;
    }

    public function readAllArticlesFromUser(string $username): array
    {
        $query = $this->pdo->prepare("SELECT * FROM article WHERE author = :username");
        $query->bindValue('username', $username, \PDO::PARAM_STR);
        $query->execute();

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Article($data);
        }

        return $users;
    }

    public function readOneArticle(int $id): Article
    {
        $query = $this->pdo->prepare("SELECT * FROM article WHERE id = :id");
        $query->bindValue('id', $id, \PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        $article = new Article($data);
        
        return $article;
    }

    public function readOneArticleFromTitle(string $title): array
    {
        $query = $this->pdo->prepare("SELECT * FROM article WHERE title = :title");
        $query->bindValue('title', $title, \PDO::PARAM_STR);
        $query->execute();
        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Article($data);
        }

        return $users;
    }

    public function deleteArticle(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM article WHERE id = :id");
        $query->bindValue('id', $id, \PDO::PARAM_INT);
        $query->execute();     
        
        $query2 = $this->pdo->prepare("DELETE FROM comment WHERE id_article = :id");
        $query2->bindValue('id', $id, \PDO::PARAM_INT);
        $query2->execute();   
    }

    public function updateArticle($id, $username, $title, $content, $category, $illustration, $descript, $statut): void
    {
        $query = $this->pdo->prepare("UPDATE article SET author = :username, title = :title, content = :content, category = :category, illustration = :illustration, descript = :descript, statut=:statut WHERE id = :id ");
        $query->bindValue('id', $id, \PDO::PARAM_STR);
        $query->bindValue('username', $username, \PDO::PARAM_STR);
        $query->bindValue('statut', $statut, \PDO::PARAM_INT);
        $query->bindValue('title', $title, \PDO::PARAM_STR);
        $query->bindValue('content', $content, \PDO::PARAM_STR);
        $query->bindValue('category', $category, \PDO::PARAM_STR);
        $query->bindValue('illustration', $illustration, \PDO::PARAM_STR);
        $query->bindValue('descript', $descript, \PDO::PARAM_STR);
        $query->execute();

    }

    public function insertFile($fileName): void
    {
        $query = $this->pdo->prepare("INSERT INTO upload_file (file_name) VALUES (:file_name) ");
        $query->bindValue('file_name', $fileName, \PDO::PARAM_STR);
        $query->execute();
    }
}
