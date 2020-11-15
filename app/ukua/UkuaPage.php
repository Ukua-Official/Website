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
    protected static $description;

    /**
     * @var string
     */
    protected static $main;

    /**
     * @var string|null
     */
    protected static $script_defer;

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
     * @param string $description
     * @param string|null $script_defer
     * @param string|null $script
     */
    public function __construct(string $title, string $description, string $main, string $script_defer = null, string $script = null)
    {
        self::$title = $title;
        self::$description = $description;
        self::$main = $main;
        self::$script_defer = $script_defer;
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
    public static function getDescription(): string
    {
        return self::$description;
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
    public static function getScriptDefer(): ?string
    {
        return self::$script_defer;
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