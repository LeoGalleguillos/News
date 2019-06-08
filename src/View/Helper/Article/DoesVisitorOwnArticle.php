<?php
namespace LeoGalleguillos\News\View\Helper\Article;

use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Service as NewsService;
use Zend\View\Helper\AbstractHelper;

class DoesVisitorOwnArticle extends AbstractHelper
{
    public function __construct(
        NewsService\Article\DoesVisitorOwnArticle $doesVisitorOwnArticleService
    ) {
        $this->doesVisitorOwnArticleService = $doesVisitorOwnArticleService;
    }

    public function __invoke(NewsEntity\Article $articleEntity)
    {
        return $this->doesVisitorOwnArticleService->doesVisitorOwnArticle(
            $articleEntity
        );
    }
}
