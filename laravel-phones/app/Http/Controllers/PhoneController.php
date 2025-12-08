<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\PhoneModel;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        $manufacturers = Manufacturer::has('phones')->orderBy('name')->get(); // само тези с телефони
        $models = PhoneModel::has('phones')->orderBy('name')->get(); // само модели с телефони

        $query = Phone::with(['model.manufacturer', 'manufacturer']);

        if ($request->filled('year')) {
            $query->where('release_year', $request->year);
        }

        if ($request->filled('model_id')) {
            $query->where('phone_model_id', $request->model_id);
        }

        if ($request->filled('manufacturer_id')) {
            $query->where('manufacturer_id', $request->manufacturer_id);
        }

        $phones = $query->orderBy('release_year', 'desc')->paginate(15);

        $models = PhoneModel::with('manufacturer')->orderBy('name')->get();
        $manufacturers = Manufacturer::orderBy('name')->get();

        return view('phones.index', compact('phones', 'models', 'manufacturers'));
    }
}
