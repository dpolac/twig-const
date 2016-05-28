<?php

namespace DPolac\TwigLambda\Tests;

use DPolac\TwigConstOperator\ConstExtension;

class IntegrationTest extends \Twig_Test_IntegrationTestCase
{

    public function getExtensions()
    {
        return array(
            new ConstExtension(),
            new ConstExtension(':::'),
            new ConstExtension('const'),
        );
    }

    public function getFixturesDir()
    {
        return dirname(__FILE__).'/Fixtures/';
    }
}
