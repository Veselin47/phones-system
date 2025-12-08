<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index() {
        $manufacturers = Manufacturer::orderBy('name')->paginate(10);
        return view('admin.manufacturers.index', compact('manufacturers'));
    }

    public function create() {
        return view('admin.manufacturers.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:manufacturers,name']);
        Manufacturer::create($request->all());
        return redirect()->route('admin.manufacturers.index');
    }

    public function edit(Manufacturer $manufacturer) {
        return view('admin.manufacturers.edit', compact('manufacturer'));
    }

    public function update(Request $request, Manufacturer $manufacturer) {
        $request->validate(['name' => 'required|unique:manufacturers,name,' . $manufacturer->id]);
        $manufacturer->update($request->all());
        return redirect()->route('admin.manufacturers.index');
    }

    public function destroy(Manufacturer $manufacturer) {
        $manufacturer->delete();
        return redirect()->route('admin.manufacturers.index');
    }
}
