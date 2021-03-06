<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/**
 * Base Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Returns whether this is an wechat request.
     * @return bool whether this is an wechat request.
     */
    public function getIsWeChat()
    {
        return stripos(Request::userAgent(), 'MicroMessenger') !== false;
    }

    /**
     * Returns whether this is an alipay request.
     * @return bool whether this is an alipay request.
     */
    public function getIsAliPay()
    {
        return stripos(Request::userAgent(), 'Alipay') !== false;
    }

    /**
     * 获取当前控制器名
     *
     * @return string
     */
    public function getCurrentControllerName(): string
    {
        return $this->getCurrentAction()['controller'];
    }

    /**
     * 获取当前方法名
     *
     * @return string
     */
    public function getCurrentMethodName(): string
    {
        return $this->getCurrentAction()['action'];
    }

    /**
     * 获取当前控制器与方法
     *
     * @return array
     */
    public function getCurrentAction()
    {
        $action = Route::current()->getActionName();
        list($controllerName, $actionName) = explode('@', $action);
        return ['controller' => $controllerName, 'action' => $actionName];
    }
}
