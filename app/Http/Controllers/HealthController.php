<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace App\Http\Controllers;


class HealthController extends Controller
{
    /**
     * @return string
     */
    public function ping()
    {
        return 'Pong';
    }
}
