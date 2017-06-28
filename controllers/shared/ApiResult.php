<?php


class ApiResult
{
    /**
     * @var boolean
     */
    public $IsSuccess;

    /**
     * @var string
     */
    public $Message;

    /**
     * @var object
     */
    public $Data;

    /**
     * ApiResult constructor.
     * @param bool|null $isSuccess
     * @param string|null $message
     * @param object|null $data
     */
    public function __construct(bool $isSuccess = null, string $message = null, $data = null)
    {
        $this->IsSuccess = $isSuccess;
        $this->Message = $message;
        $this->Data = $data;
    }


    public function Json()
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }
}