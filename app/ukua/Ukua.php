<?php

class Ukua
{

    /**
     * @var AltoRouter
     */
    protected static $router;

    /**
     * @var string
     */
    protected static $lang;

    /**
     * Ukua constructor.
     * @throws Exception
     */
    public function __construct()
    {
        self::$router = new AltoRouter();
        $tempLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $acceptLang = ['fr', 'en'];
        self::$lang = in_array($tempLang, $acceptLang) ? $tempLang : 'en';
        /** @noinspection PhpIncludeInspection */
        require_once __DIR__ . '/../../app/lang/lang_' . self::$lang . '.php';
        $tempTheme = $_COOKIE['UkuaTheme'];
        UkuaPage::setTheme(isset($tempTheme) ? $tempTheme : 'light');
        if (_FORBIDEN == true) require_once __DIR__ . '/../../app/views/403.php';
        else $this->makeRoute();
    }

    /**
     * @throws Exception
     */
    public function makeRoute(): void
    {
        //TODO: @Route 'home'
        self::$router->map('GET', '/', function () {
            require_once __DIR__ . '/../../app/views/home.php';
        }, 'home');
        //TODO: @Route 'status'
        self::$router->map('GET', '/status', function () {
            require_once __DIR__ . '/../../app/views/status.php';
        }, 'status');
        /*//TODO: @Route 'contact'
        self::$router->map('GET', '/contact', function () {
            require_once __DIR__ . '/../../app/views/contact.php';
        }, 'contact');

        //TODO: @Route 'profile'
        self::$router->map('GET', '/profile', function () {
            require_once __DIR__ . '/../../app/views/profile.php';
        }, 'profile');*/

        //TODO: @Route 'legals'
        self::$router->map('GET', '/legals', function () {
            require_once __DIR__ . '/../../app/views/legals.php';
        }, 'legals');

        //TODO: @Route 'auth-sign'
        self::$router->map('GET', '/auth/sign', function () {
            require_once __DIR__ . '/../../app/views/auth/sign.php';
        }, 'auth-sign');

        //TODO: @Route 'auth-logout'
        self::$router->map('GET', '/auth/logout', function () {
            require_once __DIR__ . '/../../app/views/auth/logout.php';
        }, 'auth-logout');

        /*//TODO: @Route 'auth-forgot'
        self::$router->map('GET', '/auth/forgot', function () {
            require_once __DIR__ . '/../../app/views/auth/forgot.php';
        }, 'auth-forgot');

        //TODO: @Route 'friends'
        self::$router->map('GET', '/friends/', function () {
            require_once __DIR__ . '/../../app/views/friends.php';
        }, 'friends');

        //TODO: @Route 'friends-search'
        self::$router->map('GET', '/friends/search', function () {
            require_once __DIR__ . '/../../app/views/friends/search.php';
        }, 'friends-search');

        //TODO: @Route 'friend-user'
        self::$router->map('GET', '/friend/[a:displayName]/', function ($displayName) {
            require_once __DIR__ . '/../../app/views/friends/user.php';
        }, 'friend-user');

        //TODO: @Route 'friend-invite'
        self::$router->map('POST', '/friend/invite/', function () {
            require_once __DIR__ . '/../../app/forms/friends/invite.php';
        }, 'friend-invite');

        //TODO: @Route 'friend-accept'
        self::$router->map('POST', '/friend/accept/', function () {
            require_once __DIR__ . '/../../app/forms/friends/accept.php';
        }, 'friend-accept');

        //TODO: @Route 'friend-deny'
        self::$router->map('POST', '/friend/deny/', function () {
            require_once __DIR__ . '/../../app/forms/friends/deny.php';
        }, 'friend-deny');

        //TODO: @Route 'messages'
        self::$router->map('GET', '/messages/', function () {
            require_once __DIR__ . '/../../app/views/messages.php';
        }, 'messages');

        //TODO: @Route 'message-user'
        self::$router->map('GET', '/message/[a:displayName]/', function ($displayName) {
            require_once __DIR__ . '/../../app/views/messages/user.php';
        }, 'message-user');

        //TODO: @Route 'message-create'
        self::$router->map('POST', '/message/create/', function () {
            require_once __DIR__ . '/../../app/forms/messages/create.php';
        }, 'message-create');*/
    }

    /**
     * @return AltoRouter
     */
    public static function getRouter(): AltoRouter
    {
        return self::$router;
    }

    /**
     * @return string
     */
    public static function getLang(): string
    {
        return self::$lang;
    }

    public static function match(): void
    {
        if (_FORBIDEN == false) {
            $match = self::$router->match();
            if (is_array($match) && is_callable($match['target'])) {
                call_user_func_array($match['target'], $match['params']);
            } else {
                require_once __DIR__ . '/../../app/views/404.php';
            }
        }
        UkuaPage::make();
    }
}