<?php
namespace LeoGalleguillos\News\Model\Service\Article;

use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Table as NewsTable;

class Delete
{
    public function __construct(
        NewsTable\Article\ArticleId $articleIdTable
    ) {
        $this->articleIdTable = $articleIdTable;
    }

    public function delete(NewsEntity\Article $articleEntity): bool
    {
        return (bool) $this->articleIdTable->updateSetDeletedToUtcTimestampWhereArticleId(
            $articleEntity->getArticleId()
        );
    }
}
