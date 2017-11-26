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
    public $content;
    private $template;

    public function __construct($template)
    {
        $this->template = $template;
    }


    function addData($sName, $Value){
        $this->aData[$sName] = $Value;
        /*echo '<pre>';
        print_r($Value);
        echo '</pre>';*/

    }

    function generate()
    {
        foreach ($this->aData as $sName => $value) {
        }
        include_once $this->template;
        include_once $this->content;
    }


}