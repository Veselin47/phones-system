<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    // Метод само за показване на списъка на потребителите
    public function index()
    {
        // Взимаме марките, подредени по име
        $manufacturers = Manufacturer::orderBy('name')->paginate(12);

        // Връщаме ПУБЛИЧНОТО вю (това със сивите карти, което направихме по-рано)
        return view('manufacturers.index', compact('manufacturers'));
    }
}