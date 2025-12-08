<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Добави това
use App\Models\PhoneModel;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class PhoneModelController extends Controller
{
    // АДМИН: Списък с всички модели
    public function index()
    {
        $models = PhoneModel::with('manufacturer')->orderBy('name')->paginate(15);
        return view('admin.models.index', compact('models'));
    }

    // АДМИН: Форма за добавяне
    public function create()
    {
        $manufacturers = Manufacturer::orderBy('name')->get();
        return view('admin.models.create', compact('manufacturers'));
    }

    // АДМИН: Записване
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        PhoneModel::create($request->all());

        return redirect()->route('admin.models.index')->with('success', 'Моделът е добавен успешно.');
    }

    // АДМИН: Форма за редакция
    public function edit(PhoneModel $model)
    {
        $manufacturers = Manufacturer::orderBy('name')->get();
        return view('admin.models.edit', compact('model', 'manufacturers'));
    }

    // АДМИН: Обновяване
    public function update(Request $request, PhoneModel $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer_id' => 'required|exists:manufacturers,id',
        ]);

        $model->update($request->all());

        return redirect()->route('admin.models.index')->with('success', 'Моделът е обновен.');
    }

    // АДМИН: Изтриване
    public function destroy(PhoneModel $model)
    {
        if($model->phones()->count() > 0) {
            return back()->with('error', 'Не може да изтриете този модел, защото има телефони свързани с него!');
        }

        $model->delete();
        return redirect()->route('admin.models.index')->with('success', 'Моделът е изтрит.');
    }
}