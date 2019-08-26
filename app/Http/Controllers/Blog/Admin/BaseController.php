<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuestBaseController;


/**
 * Базовый контроллер для всех контроллеров управляющих
 * блогом и панели администрирования.
 *
 * Должен быть родителем всех контроллером управления блогом.
 *
 * @package App\Http\Controllers\Blog\Admin
 */
abstract class BaseController extends GuestBaseController
{
    /**
     *BaseController constructor.
     */
    public function __construct()
    {
        // Инициализация общих моментров для админки
    }
}
