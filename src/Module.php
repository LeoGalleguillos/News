<?php
namespace LeoGalleguillos\News;

use LeoGalleguillos\News\Model\Factory as NewsFactory;
use LeoGalleguillos\News\Model\Service as NewsService;
use LeoGalleguillos\News\Model\Table as NewsTable;
use LeoGalleguillos\News\View\Helper as NewsHelper;
use LeoGalleguillos\Flash\Model\Service as FlashService;
use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\User\Model\Factory as UserFactory;
use LeoGalleguillos\User\Model\Service as UserService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'doesVisitorOwnArticle' => NewsHelper\Article\DoesVisitorOwnArticle::class,
                    'getArticleRootRelativeUrl' => NewsHelper\Article\RootRelativeUrl::class,
                ],
                'factories' => [
                    NewsHelper\Article\DoesVisitorOwnArticle::class => function ($sm) {
                        return new NewsHelper\Article\DoesVisitorOwnArticle(
                            $sm->get(NewsService\Article\DoesVisitorOwnArticle::class)
                        );
                    },
                    NewsHelper\Article\RootRelativeUrl::class => function ($sm) {
                        return new NewsHelper\Article\RootRelativeUrl(
                            $sm->get(NewsService\Article\RootRelativeUrl::class)
                        );
                    },
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                NewsFactory\Article::class => function ($sm) {
                    return new NewsFactory\Article(
                        $sm->get(NewsTable\Article::class)
                    );
                },
                NewsService\Article\Articles::class => function ($sm) {
                    return new NewsService\Article\Articles(
                        $sm->get(NewsFactory\Article::class),
                        $sm->get(NewsTable\Article::class)
                    );
                },
                NewsService\Article\Delete::class => function ($sm) {
                    return new NewsService\Article\Delete(
                        $sm->get(NewsTable\Article\ArticleId::class)
                    );
                },
                NewsService\Article\DoesVisitorOwnArticle::class => function ($sm) {
                    return new NewsService\Article\DoesVisitorOwnArticle(
                        $sm->get(UserService\LoggedInUser::class)
                    );
                },
                NewsService\Article\IncrementViews::class => function ($sm) {
                    return new NewsService\Article\IncrementViews(
                        $sm->get(NewsTable\Article\ArticleId::class)
                    );
                },
                NewsService\Article\RootRelativeUrl::class => function ($sm) {
                    return new NewsService\Article\RootRelativeUrl(
                        $sm->get(StringService\UrlFriendly::class)
                    );
                },
                NewsService\Article\Url::class => function ($sm) {
                    return new NewsService\Article\Url(
                        $sm->get(NewsService\Article\RootRelativeUrl::class)
                    );
                },
                NewsTable\Article::class => function ($sm) {
                    return new NewsTable\Article(
                        $sm->get('news')
                    );
                },
                NewsTable\Article\ArticleId::class => function ($sm) {
                    return new NewsTable\Article\ArticleId(
                        $sm->get('news')
                    );
                },
            ],
        ];
    }
}
