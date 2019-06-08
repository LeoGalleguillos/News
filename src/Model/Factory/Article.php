<?php
namespace LeoGalleguillos\News\Model\Factory;

use DateTime;
use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Table as NewsTable;

class Article
{
    public function __construct(
        NewsTable\Article $articleTable
    ) {
        $this->articleTable = $articleTable;
    }

    public function buildFromArticleId(int $articleId): NewsEntity\Article
    {
        return $this->buildFromArray(
            $this->articleTable->selectWhereArticleId($articleId)
        );
    }

    public function buildFromArray(
        array $array
    ): NewsEntity\Article {
        $articleEntity = new NewsEntity\Article();
        return $articleEntity
            ->setArticleId($array['article_id'])
            ->setBody($array['body'])
            ->setCreated(new DateTime($array['created']))
            ->setTitle($array['title'])
            ->setUserId($array['user_id'])
            ->setViews($array['views']);

        return $articleEntity;
    }
}
