<?php
/**
 * @licence GPL-v2
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
        // arguments
        ];
        $introduction = new \App\Item\Help\Introduction($dataIntro);

        $dataUsage = [
            'syntax' => 'action software-type software-name',
        ];

        $dataArgument = [
           'action' => 'get',
        ];

        $collection = new \App\Library\Collection($introduction);
        $usage      = new \App\Item\Help\Usage($dataUsage);
        $collection->push($usage);
        $argument   = new \App\Item\Help\Argument($dataArgument);
        $collection->push($argument);
        return $collection;
    }
}
