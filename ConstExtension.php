<?php

namespace DPolac\TwigConstOperator;

class ConstExtension extends \Twig_Extension 
{
    const DEFAULT_OPERATOR = '#';

    /* @var string */
    private $operator;
    
    public function __construct($operator = self::DEFAULT_OPERATOR)
    {
        $this->operator = $operator;
    }

    /**
     * {@inheritdoc}
     */
    public function getOperators()
    {
        return [
            [],
            [
                $this->operator => [
                    'precedence' => 500,
                    'class' => '\DPolac\TwigConstOperator\NodeExpression\ConstOperator',
                    'associativity' => \Twig_ExpressionParser::OPERATOR_LEFT
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return "dpolac_const_operator_" . $this->operator;
    }
}