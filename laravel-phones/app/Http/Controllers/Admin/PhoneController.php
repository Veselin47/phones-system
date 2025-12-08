<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\PhoneModel;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    // Админски списък (Таблица с редакция/триене)
    public function index()
    {
        // Зареждаме телефоните с връзките им за по-бърза заявка
        $phones = Phone::with(['model', 'manufacturer'])
                       ->orderBy('created_at', 'desc')
                       ->paginate(15);
                       
        return view('admin.phones.index', compact('phones'));
    }

    public function create()
    {
        $models = PhoneModel::with('manufacturer')->get();
        $manufacturers = Manufacturer::all();
        return view('admin.phones.create', compact('models', 'manufacturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_model_id' => 'required',
            'manufacturer_id' => 'required',
            'release_year' => 'required|integer'
        ]);

        Phone::create($request->all());

        return redirect()->route('admin.phones.index')->with('success', 'Телефонът е добавен успешно.');
    }

    public function edit(Phone $phone)
    {
        $models = PhoneModel::with('manufacturer')->get();
        $manufacturers = Manufacturer::all();
        return view('admin.phones.edit', compact('phone', 'models', 'manufacturers'));
    }

    public function update(Request $request, Phone $phone)
    {
        $request->validate([
            'name' => 'required',
            'phone_model_id' => 'required',
            'manufacturer_id' => 'required',
            'release_year' => 'required|integer'
        ]);

        $phone->update($request->all());

        return redirect()->route('admin.phones.index')->with('success', 'Телефонът е обновен.');
    }

    public function destroy(Phone $phone)
    {
        $phone->delete();
        return redirect()->route('admin.phones.index')->with('success', 'Телефонът е изтрит.');
    }
}