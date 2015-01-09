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
namespace App\Library\Factory;

/**
 * Help factory
 *
 * @since 0.3
 * @author Romain L.
 * @see \Test\Unit\App\Library\Factory\Help
 */
class Help
{
    /**
     * Constructs main help
     *
     * @return \App\Library\Collection
     * @access public
     */
    public function main()
    {
        $dataIntro = [
            'description' => 'Latest Softwares get latest versions of softwares',
            'author'      => 'R11T and contributors',
            'link'        => 'https://github.com/R11T/Latest-Softwares',
        ];
        $introduction = new \App\Item\Help\Introduction($dataIntro);

        $dataUsage = [
            'syntax' => '[action] software-type software-name',
            'action' => 'get update',
        ];

        $collection = new \App\Library\Collection($introduction);
        $usage      = new \App\Item\Help\Usage($dataUsage);
        $collection->push($usage);
        return $collection;
    }

    /**
     * Constructs help in case of bad software type
     *
     * @return \App\Library\Collection
     * @access public
     */
    public function badSoftwareType()
    {
        $usage = [
            'syntax'       => 'get [software-type] software-name',
            'softwareType' => $this->suggestType(),
        ];
        $help = new \App\Item\Help\Usage($usage);
        return new \App\Library\Collection($help);
    }

    // TODO: for now i have only action possible, but in the future, should be replaced by requested action
    // And there possibly are divergences in syntax (ex : 'create' operation)

    /**
     * Furnish a space separated list of software types
     *
     * @return string
     * @access private
     */
    private function suggestType()
    {
        $itemsType = new \App\Item\Types(\App\Singleton::daoType()->getAllNames());
        return implode(' ', $itemsType->getNames());
    }

    /**
     * Constructs help in case of bad software name
     *
     * @return \App\Library\Collection
     * @access public
     */
    public function badSoftwareName()
    {
        $usage = [
            'syntax'       => 'get software-type [software-name]',
            'softwareName' => 'all ' . $this->suggestName(),
        ];
        $help = new \App\Item\Help\Usage($usage);
        return new \App\Library\Collection($help);
    }

    /**
     * Furnish a space separated list of software names
     *
     * @return string
     * @access private
     */
    private function suggestName()
    {
        $get = \App\Singleton::factory()->getAllNames();
        return implode(' ', $get);
    }
}
