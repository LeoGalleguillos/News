<?php
namespace LeoGalleguillos\NewsTest\Model\Service;

use DateTime;
use Generator;
use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\News\Model\Factory as NewsFactory;
use LeoGalleguillos\News\Model\Service as NewsService;
use LeoGalleguillos\News\Model\Table as NewsTable;
use PHPUnit\Framework\TestCase;

class ArticlesTest extends TestCase
{
    protected function setUp()
    {
        $this->articleFactoryMock = $this->createMock(
            NewsFactory\Article::class
        );
        $this->articleTableMock = $this->createMock(
            NewsTable\Article::class
        );
        $this->articlesService = new NewsService\Article\Articles(
            $this->articleFactoryMock,
            $this->articleTableMock
        );
    }

    public function testGetArticles()
    {
        $articleEntities  = $this->articlesService->getArticles(
            1
        );
        $this->articleTableMock->method('selectWhereDeletedIsNullOrderByCreatedDesc')->willReturn(
            $this->yieldArrays()
        );
        $this->assertInstanceOf(
            Generator::class,
            $articleEntities
        );
        $articleEntities = iterator_to_array($articleEntities);
        $this->assertSame(
            3,
            count($articleEntities)
        );
    }

    protected function yieldArrays()
    {
        yield [];
        yield [];
        yield [];
    }
}
