<?php
namespace LeoGalleguillos\News\Model\Service\Article;

use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Service as NewsService;

class Url
{
    public function __construct(
        NewsService\Article\RootRelativeUrl $rootRelativeUrlService
    ) {
        $this->rootRelativeUrlService = $rootRelativeUrlService;
    }

    public function getUrl(NewsEntity\Article $articleEntity): string
    {
        return 'https://'
             . $_SERVER['HTTP_HOST']
             . $this->rootRelativeUrlService->getRootRelativeUrl($articleEntity);
    }
}
