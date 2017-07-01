<?php
error_reporting(0);

require_once($_SERVER ['DOCUMENT_ROOT'] . '/controllers/shared/ApiResult.php');


class Utils
{
    /**
     * @return mixed object decoded from json
     */
    public static function getPostRequestJsonData()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            exit();

        $postJsonData = file_get_contents('php://input');
        if (!isset($postJsonData))
        {
            echo (new ApiResult(false, 'No input data.'))->Json();
            exit();
        }

        $data = json_decode($postJsonData);
        if (json_last_error() != JSON_ERROR_NONE)
        {
            echo (new ApiResult(false, 'Bad input data : ' . $postJsonData))->Json();
            exit();
        }

        return $data;
    }


    /**
     * @return mixed object from post_form
     */
    public static function getPostRequestData()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST')
            exit();

        if (!isset($_POST))
        {
            echo (new ApiResult(false, 'No input data.'))->Json();
            exit();
        }

        return $_POST;
    }


    /**
     * @return mixed $_GET
     */
    public static function get_GET_RequestParameters()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET')
            exit();

        return $_GET;
    }


    /**
     * @param array $listOfSessionVariables
     * @return bool
     */
    public static function hasSession(array $listOfSessionVariables): bool
    {
        session_start();
        $has = isset($_SESSION);

        foreach ($listOfSessionVariables as $variable)
        {
            $has = $has && isset($_SESSION[$variable]) && $_SESSION[$variable] != null;
        }
        return $has;
    }


    public static function getFromSession(string $key)
    {
        session_start();
        if (!isset($_SESSION))
            return null;

        return $_SESSION[$key];
    }


    /**
     * @param array $listOfSessionVariables as $key => $value
     */
    public static function setSession(array $listOfSessionVariables)
    {
        session_start();
        foreach ($listOfSessionVariables as $key => $value)
        {
            $_SESSION[$key] = $value;
        }
    }


    /**
     * destroy this session
     */
    public static function clearSession()
    {
        session_start();
        session_destroy();
    }


    /**
     * @param string $path
     */
    public static function redirect(string $path)
    {
        echo '<script>window.location.href = "' . $path . '" </script>';
    }
}