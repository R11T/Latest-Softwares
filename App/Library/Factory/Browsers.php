<?php
namespace App\Library\Factory;

class Browsers
{
    protected $browsers;

    protected $type = 'browsers';

    protected $modelClass = '\App\Model\Browser\\';

    
    public function getSoftwares()
    {
        $browsers = $this->massInstanciate($this->modelClass);
        if (empty($browsers)) {
            throw new \LogicException('Browsers directory is empty');
        } else {
            $this->browsers = $browsers;
        }
        return [$this->type => $this->browsers];
    }
}
