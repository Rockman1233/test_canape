<?php
/**
 * Created by PhpStorm.
 * User: sergejandrejkin
 * Date: 25.11.17
 * Time: 15:32
 */

class View
{

    private $aData = [];
    private $aData2 = [];
    public $pagination;
    public $content;
    public $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    function addData($sName, $Value)
    {
        $this->aData[$sName] = $Value;

    }

    function addData2($sName, $Value)
    {
        $this->aData2[$sName] = $Value;
    }

    function generate()
    {
        include_once $this->template;
        include_once $this->content;
    }


}