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
            'description' => 'Latest Softwares get latests version of softwares',
            'author'      => 'R11T and contributors',
            'link'        => 'https://github.com/R11T/Latest-Softwares',
        // intro
        // arguments
        ];
        $introduction = new \App\Item\Help\Introduction($dataIntro);

        $dataUsage = [
            'action software-type software-name',
        ];

        $dataArgument = [
           'aa',
        ];

        $collection = new \App\Library\Collection($introduction);

        // $usage = new \App\Item\Help\Usage($dataUsage);
        // $collection->push($usage);
        return $collection;
    }

    // item/help est un composite de plusieurs sous aide
    // item/help/action($data) presente les différentes actions possibles
    // item/help/software($data) permet de présenter l'aide relative à un type de logiciel
    // le display de item/help rajoute les informations d'intro

   // public function get()

   // dans item help : titre, section 1,
   // pour aide generale : titre, synopsis, description, exemple
}
