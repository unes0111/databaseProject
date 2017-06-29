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

}