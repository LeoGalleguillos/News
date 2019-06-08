<?php
namespace LeoGalleguillos\News\Model\Service\Article;

use Exception;
use LeoGalleguillos\News\Model\Entity as NewsEntity;
use LeoGalleguillos\User\Model\Service as UserService;

class DoesVisitorOwnArticle
{
    public function __construct(
        UserService\LoggedInUser $loggedInUserService
    ) {
        $this->loggedInUserService = $loggedInUserService;
    }

    public function doesVisitorOwnArticle(NewsEntity\Article $articleEntity): bool
    {
        try {
            $userEntity = $this->loggedInUserService->getLoggedInUser();
        } catch (Exception $exception) {
            return false;
        }

        return ($userEntity->getUserId() == $articleEntity->getUserId());
    }
}
