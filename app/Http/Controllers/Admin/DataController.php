<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitor;
use App\Drink;
use App\Food;

class DataController extends Controller
{
    //
    public function drinks()
    {
        $drinks = (Drink::orderBy('nama', 'ASC'));
        // return datatables()->of(Drink::query())->toJson();
        return datatables()->of($drinks)


            ->editColumn('cover', function (Drink $model) {
                return '<img src="' . $model->cover . '" height="125px">';
            })
            ->addColumn('action', 'admin.drink.action')
            ->addIndexColumn()
            ->rawColumns(['cover', 'action'])
            ->toJson();
    }


    public function foods()
    {

        $foods = (Food::orderBy('nama', 'ASC'));

        // return datatables()->of(Food::query())->toJson();
        return datatables()->of($foods)


            ->editColumn('cover', function (Food $model) {
                return '<img src="' . $model->cover . '" height="125px">';
            })

            ->addColumn('action', 'admin.food.action')
            // ->addColumn('action', 'admin.food.action');
            // }) // add column edit
            ->addIndexColumn()
            ->rawColumns(['cover', 'action'])
            ->toJson();
    }


    public function visitors()
    {
        return datatables()->of(Visitor::query())->toJson();
    }
}