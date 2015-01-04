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
namespace App\Library\Interfaces;

/**
 * Define an element as stackable (LIFO)
 */
interface IStackable
{
    /**
     * Add an element on the top of the stack
     *
     * @param IDisplayable $element
     *
     * @return void
     * @access public
     */
    public function push(IDisplayable $element);

    /**
     * Substract element of the top
     *
     * @return \IDisplayble
     * @access public
     */
    public function pop();
}
