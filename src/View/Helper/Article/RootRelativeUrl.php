<?php
namespace LeoGalleguillos\News\View\Helper\Article;

use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Service as NewsService;
use Zend\View\Helper\AbstractHelper;

class RootRelativeUrl extends AbstractHelper
{
    public function __construct(
        NewsService\Article\RootRelativeUrl $rootRelativeUrlService
    ) {
        $this->rootRelativeUrlService = $rootRelativeUrlService;
    }

    public function __invoke(NewsEntity\Article $articleEntity)
    {
        return $this->rootRelativeUrlService->getRootRelativeUrl(
            $articleEntity
        );
    }
}
