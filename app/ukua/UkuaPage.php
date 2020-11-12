<?php

class UkuaPage
{

    /**
     * @var string
     */
    protected static $title;

    /**
     * @var string
     */
    protected static $main;

    /**
     * @var string|null
     */
    protected static $script;

    /**
     * @var string
     */
    protected static $theme;

    /**
     * UkuaPage constructor.
     * @param string $title
     * @param string $main
     * @param string|null $script
     */
    public function __construct(string $title, string $main, string $script = null)
    {
        self::$title = $title;
        self::$main = $main;
        self::$script = $script;
    }

    public static function make()
    {
        require_once __DIR__ . '/../../app/views/base.php';
    }

    /**
     * @return string
     */
    public static function getTitle(): string
    {
        return self::$title;
    }

    /**
     * @return string
     */
    public static function getMain(): string
    {
        return self::$main;
    }

    /**
     * @return string|null
     */
    public static function getScript(): ?string
    {
        return self::$script;
    }

    /**
     * @return string
     */
    public static function getTheme(): string
    {
        return self::$theme;
    }

    /**
     * @param string $theme
     */
    public static function setTheme(string $theme): void
    {
        self::$theme = $theme;
    }
}