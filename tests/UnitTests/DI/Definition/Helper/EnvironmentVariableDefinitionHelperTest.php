<?php
/**
 * PHP-DI
 *
 * @link      http://php-di.org/
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace UnitTests\DI\Definition\Helper;

use DI\Definition\EnvironmentVariableDefinition;
use DI\Definition\Helper\EnvironmentVariableDefinitionHelper;

/**
 * @covers \DI\Definition\Helper\EnvironmentVariableDefinitionHelper
 */
class EnvironmentVariableDefinitionHelperTest extends \PHPUnit_Framework_TestCase
{
    public function testGetDefinition()
    {
        $helper = new EnvironmentVariableDefinitionHelper('bar', false);
        $definition = $helper->getDefinition('foo');

        $this->assertTrue($definition instanceof EnvironmentVariableDefinition);
        $this->assertSame('foo', $definition->getName());
        $this->assertSame('bar', $definition->getVariableName());
        $this->assertFalse($definition->isOptional());
    }

    public function testGetDefinitionOptional()
    {
        $helper = new EnvironmentVariableDefinitionHelper('bar', true, 'default');
        $definition = $helper->getDefinition('foo');

        $this->assertTrue($definition instanceof EnvironmentVariableDefinition);
        $this->assertSame('foo', $definition->getName());
        $this->assertSame('bar', $definition->getVariableName());
        $this->assertTrue($definition->isOptional());
        $this->assertEquals('default', $definition->getDefaultValue());
    }
}
