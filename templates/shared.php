<?php


class shared
{
    /**
     * @param array $listOfSessionVariables
     * @return bool
     */
    public static function hasSession(array $listOfSessionVariables): bool
    {
        $has = isset($_SESSION);

        foreach ($listOfSessionVariables as $variable)
        {
            $has = $has && isset($_SESSION[$variable]) && $_SESSION[$variable] != null && trim($_SESSION[$variable]) != '';
        }
        return $has;
    }


    /**
     * @param array $listOfSessionVariables as $key => $value
     */
    public static function setSession(array $listOfSessionVariables)
    {
        foreach ($listOfSessionVariables as $key => $value)
        {
            $_SESSION[$key] = $value;
        }
    }


    /**
     * @param string $path
     */
    public static function redirect(string $path)
    {
        echo '<script>window.location.href = "' . $path . '" </script>';
    }
}