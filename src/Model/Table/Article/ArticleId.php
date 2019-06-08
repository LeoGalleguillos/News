<?php
namespace LeoGalleguillos\News\Model\Table\Article;

use Zend\Db\Adapter\Adapter;

class ArticleId
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function updateSetDeletedToUtcTimestampWhereArticleId(
        int $articleId
    ): int {
        $sql = '
            UPDATE `article`
               SET `article`.`deleted` = UTC_TIMESTAMP()
             WHERE `article`.`article_id` = ?
                 ;
        ';
        $parameters = [
            $articleId,
        ];
        return (int) $this->adapter
            ->query($sql)
            ->execute($parameters)
            ->getAffectedRows();
    }
}
