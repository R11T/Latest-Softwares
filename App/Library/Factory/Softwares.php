<?php
namespace App\Library\Factory;

class Softwares
{
    protected function readSoftwareDir($path)
    {
        $files = [];
        
        $dir = ROOT_DIR . ltrim($path, '\\');
        $dir = str_replace('\\', '/', $dir);
        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ('.' !== $entry && '..' !== $entry) {
                    $files[] = $entry;
                }
            }
        }
        closedir($handle);
        return $files;
    }

    protected function massInstanciate($modelPath)
    {
        $softwares = [];
        $files = $this->readSoftwareDir($modelPath);

        foreach ($files as $file) {
            $name = substr($file, 0, strpos($file, '.php'));
            $ns = $modelPath . $name;
            $software = new $ns();
            $softwares[$name] = //[
                $software->getData()
            //    $software->getLink(),
            //];
                ;
        }
       return $softwares;
    }
}
