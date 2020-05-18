<?php
namespace LeoGalleguillos\NewsTest\Model\Service\Article;

use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Service as NewsService;
use LeoGalleguillos\String\Model\Service as StringService;
use PHPUnit\Framework\TestCase;

class RootRelativeUrlTest extends TestCase
{
    protected function setUp(): void
    {
        $this->rootRelativeUrlService = new NewsService\Article\RootRelativeUrl(
            new StringService\UrlFriendly()
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            NewsService\Article\RootRelativeUrl::class,
            $this->rootRelativeUrlService
        );
    }
}
