<?php

namespace Tests\Feature;

use App\TemplateEngine;
use Tests\TestCase;

/**
 * Class TemplateEngineTest
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class TemplateEngineTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTemplateEngine()
    {
        $templateEngine = new TemplateEngine();

        $templateEngine->put('name', 'Cenk');
        $this->assertEquals('Cenk', $templateEngine->get('name'));
        $templateEngine->remove('name');
        $this->assertEquals('Variable not found!', $templateEngine->get('name'));
        $templateEngine->removeAll();
        $this->assertEquals('Variable not found!', $templateEngine->get('name'));
        $templateEngine->put('name', 'Cenk');
        $this->assertEquals("Hello Cenk", $templateEngine->render('Hello {$name}'));
        $templateEngine->put('firstName', 'Cenk');
        $templateEngine->put('lastName', 'Civici');
        $this->assertEquals("Hello Cenk Civici", $templateEngine->render('Hello {$firstName} {$lastName}'));
    }
}
