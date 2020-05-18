<?php
namespace LeoGalleguillos\NewsTest\Model\Factory;

use DateTime;
use Generator;
use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Factory as NewsFactory;
use LeoGalleguillos\News\Model\Service as NewsService;
use LeoGalleguillos\News\Model\Table as NewsTable;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected function setUp(): void
    {
        $this->articleTableMock = $this->createMock(
            NewsTable\Article::class
        );
        $this->articleFactory = new NewsFactory\Article(
            $this->articleTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            NewsFactory\Article::class,
            $this->articleFactory
        );
    }
}
