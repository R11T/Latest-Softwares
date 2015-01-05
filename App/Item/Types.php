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
namespace App\Item;

/**
 * Types' Data Transport Object
 *
 * @since 0.3
 * @author Romain L.
 * @see \Test\Unit\App\Item\Types.php
 */
class Types
{
    /**
     * Names of all types
     *
     * @var array
     * @access private
     */
    private $names;

    /**
     * Construct data transport object
     *
     * @param array $data
     *
     * @access public
     */
    public function __construct(array $data)
    {
        foreach ($data as $row) {
            $this->names[] = (string) $row['type_name'];
        }
    }

    /**
     * Getter
     *
     * @return array
     * @access public
     */
    public function getNames()
    {
        return $this->names;
    }
}
