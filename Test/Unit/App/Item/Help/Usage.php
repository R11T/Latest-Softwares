<?php
/**
 * @licence GPL-v2
 * Summary :
 * « You may copy, distribute and modify the software as long as
 * you track changes/dates of in source files and keep all modifications under GPL.
 * You can distribute your application using a GPL library commercially,
 * but you must also disclose the source code. »
 *
 * @link https://www.tldrlegal.com/l/gpl2
 * @see LICENSE file
 */
namespace Test\Unit\App\Item\Help;

use \Test\Unit\TestCase;
use \App\Item\Help\Usage as _Usage;

/**
 * Unit testing on help usage
 *
 * @since 0.3
 * @author Romain L.
 * @see App\Item\Help\Usage
 */
class Usage extends TestCase
{
    /**
     * Tests constructing an usage item with a syntax
     *
     * @return void
     * @access public
     */
    public function test__construct()
    {
        $data = ['syntax' => 'Deep Thought'];

        $usage = new _Usage($data);

        $this->string($usage->getSyntax())->isIdenticalTo('Deep Thought');
    }

    /**
     * Tests displaying syntax
     *
     * @return void
     * @access public
     */
    public function testDisplaySyntax()
    {
        $data  = ['syntax' => 'Zaphod'];
        $usage = new _Usage($data);
        
        $display = $usage->display();

        $this->string($display)->contains('Zaphod');
    }

    /**
     * Tests displaying action
     *
     * @return void
     * @access public
     */
    public function testDisplayAction()
    {
        $data = [
            'syntax' => 'Zaphod',
            'action' => 'Arthur Dent',
        ];
        $usage = new _Usage($data);

        $display = $usage->display();

        $this->string($display)->contains('Arthur Dent');
    }

    /**
     * Tests displaying software type
     *
     * @return void
     * @access public
     */
    public function testDisplaySoftwareType()
    {
        $data = [
            'syntax'       => 'Zaphod',
            'softwareType' => 'Marvin, the paranoid android',
        ];
        $usage = new _Usage($data);

        $display = $usage->display();

        $this->string($display)->contains('Marvin, the paranoid android');
    }

    /**
     * Tests displaying software name
     *
     * @return void
     * @access public

     */
    public function testDisplaySoftwareName()
    {
        $data = [
            'syntax'       => 'Zaphod',
            'softwareName' => 'Trillian',
        ];
        $usage = new _Usage($data);

        $display = $usage->display();

        $this->string($display)->contains('Trillian');
    }
}

