<?php
//namespace services;

class Autoloader
{
    public $paths = [
      'models',
      'services'
    ];

    public function loadClass(string $classname)
    {
        foreach ($this->paths as $dir) {
            $arrOfClassname = explode("\", $classname);
            if ($arrOfClassname[0] == $dir) {
                return ($_SERVER['DOCUMENT_ROOT'] . "/../{$dir}/{$arrOfClassname[1]}.php");
            
            }
        
    }