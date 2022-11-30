<?php

namespace App\Traits;

trait SlugTrait
{
    function getSlugFromString($string){
        $invalidCharacterPattern = '/[^က-႟a-zA-Z]/';
        $twoOrMoreDashPattern = '/-{2,}/';

        $replacedStringWithDashes =  preg_replace($invalidCharacterPattern,"-",$string);

        return preg_replace($twoOrMoreDashPattern,"-",$replacedStringWithDashes);
    }

    function isUnique(){
    }
}
