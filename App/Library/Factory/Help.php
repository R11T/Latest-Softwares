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
            'action' => 'get',
        ];

        $collection = new \App\Library\Collection($introduction);
        $usage      = new \App\Item\Help\Usage($dataUsage);
        $collection->push($usage);
        return $collection;
    }

    public function badSoftwareType()
    {
        $usage = [
            'syntax'       => 'get [software-type] software-name',
            'softwareType' => $this->suggestType(),
        ];
        $help = new \App\Item\Help\Usage($usage);
        return new \App\Library\Collection($help);
    }

    private function suggestType()
    {
        $itemsType = new \App\Item\Types(\App\Singleton::daoType()->getAllNames());
        return implode(' ', $itemsType->getNames());
    }

    public function badSoftwareName()
    {
        $usage = [
            'syntax'       => 'get software-type [software-name]',
            'softwareName' => 'all ' . $this->suggestName(),
        ];
        $help = new \App\Item\Help\Usage($usage);
        return new \App\Library\Collection($help);
    }

    private function suggestName()
    {
        // find a way to figure out which one is the factory at this moment
        //$get = $factory->getAllNames();
        //return implode(' ', $get);
        return 'Cr fx';
    }
}
