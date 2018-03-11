<?php

namespace App\Models\Setup;

/**
 * Description of UOM
 *
 * @author Ervinne Sodusta <ervinne.sodusta@nuworks.ph>
 */
class UOM
{

    const MONTH  = 'mon';
    const DAY    = 'day';
    const HOUR   = 'hr';
    const MINUTE = 'min';
    const EXACT  = 'exa';

    public static function getList()
    {
        return [
            static::MONTH,
            static::DAY,
            static::HOUR,
            static::MINUTE,
            static::EXACT,
        ];
    }

}
