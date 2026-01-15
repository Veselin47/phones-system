<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\PhoneModel;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class PhoneController extends Controller
{
    // АДМИН: Списък с телефони
    public function index()
    {
        $phones = Phone::with(['model', 'manufacturer'])
                       ->orderBy('created_at', 'desc')
                       ->paginate(15);
                       
        return view('admin.phones.index', compact('phones'));
    }

    // АДМИН: Форма за добавяне
    public function create()
    {
        $models = PhoneModel::with('manufacturer')->get();
        $manufacturers = Manufacturer::all();
        return view('admin.phones.create', compact('models', 'manufacturers'));
    }

    // АДМИН: Запазване
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_model_id' => 'required',
            'manufacturer_id' => 'required',
            'release_year' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Валидация за снимка
        ]);

        $data = $request->all();

        // Проверка и качване на снимка
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('phones', 'public');
            $data['image'] = $path;
        }

        Phone::create($data);

        return redirect()->route('admin.phones.index')->with('success', 'Телефонът е добавен успешно.');
    }

    // АДМИН: Форма за редакция
    public function edit($id)
    {
        $phone = Phone::findOrFail($id);
        $models = PhoneModel::with('manufacturer')->get();
        $manufacturers = Manufacturer::all();
        
        return view('admin.phones.edit', compact('phone', 'models', 'manufacturers'));
    }

    // АДМИН: Обновяване
    public function update(Request $request, $id)
    {
        $phone = Phone::findOrFail($id);
        
        $request->validate([
            'name' => 'required',
            'phone_model_id' => 'required',
            'manufacturer_id' => 'required',
            'release_year' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Ако е качена нова снимка
        if ($request->hasFile('image')) {
            // 1. Изтриваме старата, ако има
            if ($phone->image) {
                Storage::disk('public')->delete($phone->image);
            }
            // 2. Качваме новата
            $path = $request->file('image')->store('phones', 'public');
            $data['image'] = $path;
        }

        $phone->update($data);

        return redirect()->route('admin.phones.index')->with('success', 'Телефонът е обновен.');
    }

    // АДМИН: Изтриване
    public function destroy($id)
    {
        $phone = Phone::findOrFail($id);
        if ($phone->image) {
            Storage::disk('public')->delete($phone->image);
        }
        $phone->delete();
        
        return redirect()->route('admin.phones.index')->with('success', 'Телефонът е изтрит.');
    }
}