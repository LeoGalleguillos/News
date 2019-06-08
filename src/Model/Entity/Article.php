<?php
namespace LeoGalleguillos\News\Model\Entity;

use DateTime;
use LeoGalleguillos\News\Model\Entity as NewsEntity;

class Article
{
    protected $articleId;
    protected $body;
    protected $created;
    protected $title;
    protected $userId;
    protected $views;

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getViews(): int
    {
        return $this->views;
    }

    public function setArticleId(int $articleId): NewsEntity\Article
    {
        $this->articleId = $articleId;
        return $this;
    }

    public function setBody(string $body): NewsEntity\Article
    {
        $this->body = $body;
        return $this;
    }

    public function setCreated(DateTime $created): NewsEntity\Article
    {
        $this->created = $created;
        return $this;
    }

    public function setTitle(string $title): NewsEntity\Article
    {
        $this->title = $title;
        return $this;
    }

    public function setUserId(int $userId): NewsEntity\Article
    {
        $this->userId = $userId;
        return $this;
    }

    public function setViews(int $views): NewsEntity\Article
    {
        $this->views = $views;
        return $this;
    }
}
