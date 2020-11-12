<?php

class UkuaMessages
{

    /**
     * @var array
     */
    protected static $messages = array();

    /**
     * @var string
     */
    protected static $currentLanguages = 'en';

    /**
     * @param string $lang
     * @param array $strs
     */
    public static function loadMessages(string $lang, array $strs)
    {
        if (empty(self::$messages[$lang]))
            self::$messages[$lang] = array();
        self::$messages[$lang] = array_merge(self::$messages[$lang], $strs);
    }

    /**
     * @param string $lang
     * @return string
     */
    public static function setCurrentLanguages(string $lang): string
    {
        return self::$currentLanguages = $lang;
    }

    /**
     * @param $key
     * @param string $lang
     * @return mixed|string
     */
    public static function getMessage($key, $lang = 'en')
    {
        $str = self::$messages[$lang][$key];
        if (empty($str)) $str = "$lang.$key";
        return $str;
    }

    /*
    public static function &getAllStrings(string $lang): array
    {
        return self::$messages[$lang];
    }

    public static function freeUnused()
    {
        foreach (self::$messages as $lang => $data)
            if ($lang != self::$currentLanguages) {
                $lstr = self::$messages[$lang]['langname'];
                self::$messages[$lang] = array();
                self::$messages[$lang]['langname'] = $lstr;
            }
    }

    public static function getLangList()
    {
        $_list = array();
        foreach (self::$messages as $lang => $data) {
            $h['name'] = $lang;
            $h['desc'] = self::$messages[$lang]['langname'];
            $h['current'] = $lang == self::$currentLanguages;
            $_list[] = $h;
        }
        return $_list;
    }

    function generateTemplateStrings(array $arr)
    {
        $trans = array();
        foreach ($arr as $totrans) {
            $trans[$totrans] = UkuaMessages::translate($totrans);
        }
        return $trans;
    }
    */
}