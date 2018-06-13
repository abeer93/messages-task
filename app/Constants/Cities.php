<?php

namespace App\Constants;

/**
 * Cities Class represent cities names
 * @package App\Constants
 * @author Abeer Elhout <abeer.elhout@gmail.com>
 */
class Cities
{
    /**
     * @const Cities::DAMASCUS represent Damascus city.
     */
    const DAMASCUS = 'Damascus';

    /**
     * @const Cities::MOGADISHU represent Mogadishu city.
     */
    const MOGADISHU = 'Mogadishu';

    /**
     * @const Cities::IBIZA represent Ibiza city.
     */
    const IBIZA = 'Ibiza';

    /**
     * @const Cities::CAIRO represent Cairo city.
     */
    const CAIRO = 'Cairo';

    /**
     * @const Cities::TAHRIR represent Tahrir city.
     */
    const TAHRIR = 'Tahrir';

    /**
     * @const Cities::NAIROBI represent Nairobi city.
     */
    const NAIROBI = 'Nairobi';

    /**
     * @const Cities::KATHMANDU represent Kathmandu city.
     */
    const KATHMANDU = 'Kathmandu';

    /**
     * @const Cities::BERNABAU represent Bernabau city.
     */
    const BERNABAU = 'Bernabau';

    /**
     * @const Cities::ATHENS represent Athens city.
     */
    const ATHENS = 'Athens';

    /**
     * @const Cities::ISTANBUL represent Istanbul city.
     */
    const ISTANBUL = 'Istanbul';

    /**
     * @return array contain Cities types
     */
    public static function getCitiesNames() : array
    {
        $Cities = [
            self::ATHENS, self::BERNABAU, self::CAIRO,
            self::DAMASCUS, self::IBIZA, self::ISTANBUL,
            self::KATHMANDU, self::MOGADISHU, self::NAIROBI,
            self::TAHRIR
        ];
        return $Cities;
    }
}