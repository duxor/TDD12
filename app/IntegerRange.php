<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/16/2017
 * Time: 13:40
 */

namespace App;


class IntegerRange extends Range {
    public function __construct(int $form, int $to){
        $this->from = $form;
        $this->to = $to;
    }
}