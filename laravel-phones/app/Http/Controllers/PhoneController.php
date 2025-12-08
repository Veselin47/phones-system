<?php

namespace App\Http\Controllers;

use App\Models\PhoneModel;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class PhoneModelController extends Controller
{
    // АДМИН: Списък с всички модели
    public function index()
    {
        // Зареждаме и производителя, за да го покажем в таблицата
        $models = PhoneModel::with('manufacturer')->orderBy('name')->paginate(15);
        
        // Връщаме админското вю
        return view('admin.models.index', compact('models'));
    }

    // АДМИН: Форма за добавяне
    public function create()
    {
        // Трябват ни производителите за падащото меню
        $manufacturers = Manufacturer::orderBy('name')->get();
        return view('admin.models.create', compact('manufacturers'));
    }

    // АДМИН: Записване в базата
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
    public function edit(PhoneModel $model) // Laravel автоматично намира модела по ID
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
        // Проверка: Има ли телефони от този модел?
        if($model->phones()->count() > 0) {
            return back()->with('error', 'Не може да изтриете този модел, защото има телефони свързани с него!');
        }

        $model->delete();
        return redirect()->route('admin.models.index')->with('success', 'Моделът е изтрит.');
    }
}