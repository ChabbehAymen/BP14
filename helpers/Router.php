<?php
class Router
{
    static array $locations = ['home'=>'/BP14/',
        'login'=>'/BP14/login',
        'signup'=>'/BP14/signup',
        'profile'=>'/BP14/profile',
        'event'=>'/BP14/event',
        'purchases'=>'/BP14/purchases'];

    static function route(string $destination, array $params = null): void{
        $locateTo = '';
        foreach (Router::$locations as $name => $location) {
            if ($name === $destination) {
                if ($params !== null) $locateTo = $location . '?' . $params['key'] . '=' . $params['value'];
                else $locateTo = $location;
                break;
            }
        }
        header('Location: '.$locateTo);
    }

}