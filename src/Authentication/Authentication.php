<?php

namespace Usanzadunje\Authentication;

use Usanzadunje\Models\User;

class Authentication
{
    /**
     * Logs in user with credentials provided.
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password): bool
    {
        $user = (new User)->where('email', $email)->where('password', $password, '=', 'AND')->first();
        if (!$user) {
            echo "Email or password is incorrect";

            return false;
        }

        session_start(array(
            'save_path' => resource_path('sessions'),
        ));

        if (!isset($_SESSION['auth'])) {
            $_SESSION['auth'] = $user;
        }
        echo "Welcome " . $user->getName();

        return true;
    }

    /**
     * Logs out current user.
     *
     * @return bool
     */
    public function logout(): bool
    {
        if (isset($_SESSION['auth'])) {
            $_SESSION['auth'] = null;
        }

        return true;
    }

    /**
     * Returns currently logged-in users model.
     *
     * @return User|null
     */
    public function user(): ?User
    {
        return $_SESSION['auth'] ?: null;
    }
}