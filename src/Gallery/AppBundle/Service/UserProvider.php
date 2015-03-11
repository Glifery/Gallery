<?php

namespace Gallery\AppBundle\Service;

use Gallery\AppBundle\Entity\User;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\Exception\AccountNotLinkedException;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider;

class UserProvider extends FOSUBUserProvider
{
    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $username = $response->getUsername();

        $user = $this->userManager->findUserBy(array($this->getProperty($response) => $username));

        if (null === $username) {
            throw new AccountNotLinkedException(sprintf("User '%s' not found.", $username));
        }
        if (null === $user) {
            $user = new User();
            $user->setUsername($username);
            $user->setEmail($username);
            $user->setPlainPassword(12345);
            $user->setVkontakteId($username);
            $user->setEnabled(true);
            $this->userManager->updatePassword($user, 12345);
            $user->setLastLogin(new \DateTime());
            $this->userManager->updateUser($user);
        }

        return $user;
    }
}