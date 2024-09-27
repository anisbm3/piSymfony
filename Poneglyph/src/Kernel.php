<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Knp\Bundle\TimeBundle\KnpTimeBundle;
class Kernel extends BaseKernel
{
    use MicroKernelTrait;
   
    
}
 