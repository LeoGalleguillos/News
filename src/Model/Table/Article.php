<?php
namespace LeoGalleguillos\News\Model\Table;

use Generator;
use Zend\Db\Adapter\Adapter;

class Article
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function insert(
        int $userId,
        string $title,
        string $body
    ): int {
        $sql = '
            INSERT
              INTO `article` (
                       `user_id`
                     , `title`
                     , `body`
                     , `created`
                   )
            VALUES (?, ?, ?, UTC_TIMESTAMP())
                 ;
        ';
        $parameters = [
            $userId,
            $title,
            $body,
        ];
        return (int) $this->adapter
            ->query($sql)
            ->execute($parameters)
            ->getGeneratedValue();
    }

    public function selectWhereArticleId(int $articleId): array
    {
        $sql = '
            SELECT `article_id`
                 , `user_id`
                 , `title`
                 , `body`
                 , `views`
                 , `created`
                 , `deleted`
              FROM `article`
             WHERE `article_id` = ?
                 ;
        ';
        $parameters = [
            $articleId,
        ];
        return $this->adapter->query($sql)->execute($parameters)->current();
    }

    public function selectWhereDeletedIsNullOrderByCreatedDesc(
        int $limitOffset,
        int $limitRowCount
    ): Generator {

    }

    public function updateSetTitleBodyWhereArticleId(
        string $title,
        string $body,
        int $articleId
    ): bool {
        $sql = '
            UPDATE `article`
               SET `article`.`title` = ?
                 , `article`.`body` = ?
             WHERE `article`.`article_id` = ?
                 ;
        ';
        $parameters = [
            $title,
            $body,
            $articleId,
        ];
        return (bool) $this->adapter
                           ->query($sql)
                           ->execute($parameters)
                           ->getAffectedRows();
    }

    public function updateSetViewsViewsPlusOneWhereArticleId(int $articleId): int
    {
        $sql = '
            UPDATE `article`
               SET `article`.`views` = `article`.`views` + 1
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
