<?php

namespace Zunky44\Aakashsms;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Zunky44\Aakashsms\Skeleton\SkeletonClass
 */
class AakashsmsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'aakashsms';
    }
}
