<?php
namespace LeoGalleguillos\News\Model\Service\Article;

use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Table as NewsTable;

class IncrementViews
{
    public function __construct(
        NewsTable\Article\ArticleId $articleIdTable
    ) {
        $this->articleIdTable = $articleIdTable;
    }

    public function incrementViews(
        NewsEntity\Article $articleEntity
    ): bool {
        return (bool) $this->articleIdTable->updateSetViewsViewsPlusOneWhereArticleId(
            $articleEntity->getArticleId()
        );
    }
}
