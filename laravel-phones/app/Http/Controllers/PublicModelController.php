<?php

namespace App\Http\Controllers;

use App\Models\PhoneModel;
use Illuminate\Http\Request;

class PublicModelController extends Controller
{
    public function index()
    {
        // Зареждаме моделите заедно с производителя, за да го покажем
        $models = PhoneModel::with('manufacturer')
                            ->orderBy('name')
                            ->paginate(12);

        // Връщаме публичното вю
        return view('models.index', compact('models'));
    }
}