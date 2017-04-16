<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/16/2017
 * Time: 10:46
 */

namespace App;


/**
 * Class TemplateEngine
 *
 * @package App
 * @author  Dusan Perisic
 */
class TemplateEngine {
    /**
     * @var array
     */
    private $vars;

    /**
     * TemplateEngine constructor.
     */
    public function __construct(){
        $this->vars = [];
    }

    /**
     * @param string $html
     * @return mixed
     * @author Dusan Perisic
     */
    public function render( string $html){
        $vars = $this->prepareToRender();
        return str_replace(array_keys($vars), $vars, $html);
    }

    /**
     * @return array
     * @author Dusan Perisic
     */
    public function prepareToRender()
    {
        $preparedVars = [];
        foreach($this->vars as $i => $v)
        {
            $preparedVars['{$' . $i . '}'] = $v;
        }
        return $preparedVars;
    }

    /**
     * @param string $varName
     * @param        $varValue
     * @author Dusan Perisic
     */
    public function put( string $varName, $varValue)
    {
        $this->vars[$varName] = $varValue;
    }

    /**
     * @param string $varName
     * @return mixed|string
     * @author Dusan Perisic
     */
    public function get( string $varName)
    {
        return isset($this->vars[$varName]) ? $this->vars[$varName] : 'Variable not found!';
    }

    /**
     * @param string $varName
     * @return bool
     * @author Dusan Perisic
     */
    public function remove( string $varName)
    {
        if ($test = isset($this->vars[$varName]) ? true : false)
        {
            unset($this->vars[$varName]);
        }
        return true;
    }

    /**
     * @author Dusan Perisic
     */
    public function removeAll()
    {
        $this->vars = [];
    }
}

/*public function searchVars(string $html)
{
    preg_match_all(
        '/\{\$(.*?)\}/',
        $html,
        $matches
    );
}*/