<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.09.18
 * Time: 16:51
 */

class XhprofFilter extends CFilter
{
    protected function preFilter($filterChain)
    {
        Xhprof::begin();
        return parent::preFilter($filterChain);
    }


    protected function postFilter($filterChain)
    {
        Xhprof::end();
        parent::postFilter($filterChain);
    }
}