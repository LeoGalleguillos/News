<?php
namespace LeoGalleguillos\NewsTest\Model\Entity;

use DateTime;
use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\User\Model\Entity as UserEntity;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected function setUp()
    {
        $this->articleEntity = new NewsEntity\Article();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            NewsEntity\Article::class,
            $this->articleEntity
        );
    }
}
