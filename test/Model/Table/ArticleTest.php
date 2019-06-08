<?php
namespace LeoGalleguillos\NewsTest\Model\Table;

use Generator;
use LeoGalleguillos\News\Model\Table as NewsTable;
use LeoGalleguillos\Test\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TableTestCase
{
    protected function setUp()
    {
        $this->articleTable = new NewsTable\Article($this->getAdapter());

        $this->dropTable('article');
        $this->createTable('article');
    }

    public function testInsert()
    {
        $articleId = $this->articleTable->insert(
            1,
            2,
            'title',
            'body'
        );
        $this->assertSame(
            1,
            $articleId
        );
    }
}
