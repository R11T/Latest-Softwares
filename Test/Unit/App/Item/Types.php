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
namespace Test\Unit\App\Item;

use \Test\Unit\TestCase;
use \App\Item\Types as _Types;

class Types extends TestCase
{
    /**
     * Test constructing types
     *
     * @return void
     * @access public
     */
    public function test__construct()
    {
        $data = [
            ['type_name' => 'Papa Smurf'],
            ['type_name' => 'Brainy Smurf'],
        ];

        $types = new _Types($data);

        $names = $types->getNames();

        $this->array($names)->hasSize(2);
        $this->string($names[0])->isIdenticalTo('Papa Smurf');
        $this->string($names[1])->isIdenticalTo('Brainy Smurf');
    }
}
