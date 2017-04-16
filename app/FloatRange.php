<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/16/2017
 * Time: 13:41
 */

namespace App;


class FloatRange extends Range {
    public function __construct(float $form, float $to){
        $this->from = $form;
        $this->to = $to;
    }
}