<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Carbon\Carbon;

class DiggingDeeperController extends Controller
{
   /**
    * Базовая информация:
    * @url https://laravel.com/docs/5.8/collections
    *
    * Справочная информация:
    * @url https://laravel.com/api/5.8/Illuminate/Support/Collection.httml
    *
    * Вариант коллекции для моделей eloquent:
    * @url https://laravel.com/apu/5.8/Illuminate/Database/Eloquent/Collection.html
    *
    * Билдер запросов - то с чем можно перепутать коллецииЖ
    * @url https://laravel.com/docs/5.8/queries
    */
    public function collections()
    {
        $result = [];

        /**
         * @var \Illuminate\Database\Eloquent\Collection $eloquentCollection
         */
        $eloquentCollection = BlogPost::withTrashed()->get();

        // dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());
        /**
         * @var \Illuminate\Support\Collection $collection
         */
        $collection = collect($eloquentCollection->toArray());

//        dd(
//            get_class($eloquentCollection),
//            get_class($collection),
//            $collection
//        );

        // Выбока первый и последний
//        $result['first'] = $collection->first();
//        $result['last'] = $collection->last();

        // Выборка статей которые = 10
//        $result['where']['data'] = $collection
//            ->where('category_id', 10)
//            ->values()
//            ->keyBy('id');
//


//        $result['where']['count'] = $result['where']['data']->count();
//        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
//        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();

        //dd($result);

        // Базовая перемененая не изменяется. Просто вернется измененная версия.
//        $result['map']['all'] = $collection->map(function (array $item) {
//
//            $newsItem = new \stdClass();
//            $newsItem->item_id = $item['id'];
//            $newsItem->item_name = $item['title'];
//            $newsItem->exists = is_null($item['deleted_at']);
//
//            return $newsItem;
//        });
//
//        $result['map']['not_exists'] = $result['map']['all']->where('exists',
//            '=', false)
//            ->values();
//
//        dd($result);

        // Базовая переменная измениться (трансформиркется).
        ;$collection->transform(function (array $item) {
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_name = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);
            $newItem->created_at = Carbon::parse($item['created_at']);

            return $newItem;
    });
        dd($collection);
    }

}
