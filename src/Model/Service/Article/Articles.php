<?php
namespace LeoGalleguillos\News\Model\Service\Article;

use Generator;
use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Factory as NewsFactory;
use LeoGalleguillos\News\Model\Service as NewsService;
use LeoGalleguillos\News\Model\Table as NewsTable;

class Articles
{
    public function __construct(
        NewsFactory\Article $articleFactory,
        NewsTable\Article $articleTable
    ) {
        $this->articleFactory = $articleFactory;
        $this->articleTable   = $articleTable;
    }

    /**
     * @yield NewsEntity\Article
     */
    public function getArticles(int $page): Generator
    {
        $limitOffset   = ($page - 1) * 100;
        $limitRowCount = 100;

        $generator = $this->articleTable->selectWhereDeletedIsNullOrderByCreatedDesc(
            $limitOffset,
            $limitRowCount
        );
        foreach ($generator as $array) {
            yield $this->articleFactory->buildFromArray($array);
        }
    }
}
