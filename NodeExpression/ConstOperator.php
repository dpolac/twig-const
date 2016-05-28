<?php

namespace DPolac\TwigConstOperator\NodeExpression;


class ConstOperator extends \Twig_Node_Expression
{
    public function __construct(\Twig_Node $left, \Twig_Node $right, $lineno)
    {
        parent::__construct(array('left' => $left, 'right' => $right), array(), $lineno);
    }

    public function compile(\Twig_Compiler $compiler)
    {
        if (! ($this->getNode('right') instanceof \Twig_Node_Expression_Name)) {
            throw new \Exception("Right side of const operator must be identifier.");
        }
        
        $compiler
            ->raw('(constant(get_class(')
            ->subcompile($this->getNode('left'))
            ->raw(') . (')
            ->string("::".$this->getNode('right')->getAttribute('name'))
            ->raw(')))')
        ;
    }

}
