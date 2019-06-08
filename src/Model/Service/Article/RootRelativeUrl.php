<?php
namespace LeoGalleguillos\News\Model\Service\Article;

use Generator;
use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Factory as NewsFactory;
use LeoGalleguillos\News\Model\Service as NewsService;
use LeoGalleguillos\News\Model\Table as NewsTable;
use LeoGalleguillos\String\Model\Service as StringService;

class RootRelativeUrl
{
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    public function getRootRelativeUrl(NewsEntity\Article $articleEntity): string
    {
        return '/news/'
            . $articleEntity->getArticleId()
            . '/'
            . $this->urlFriendlyService->getUrlFriendly($articleEntity->getTitle());
    }
}
