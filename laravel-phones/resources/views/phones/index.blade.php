@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding-top: 3rem; padding-bottom: 3rem;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-8 px-4 sm:px-0">
            <div>
                <h1 style="color: #1f2937; font-size: 1.875rem; font-weight: 800; line-height: 1.25;">Каталог телефони</h1>
                <p style="color: #6b7280; margin-top: 0.25rem;">Преглед и управление на наличните устройства</p>
            </div>
        </div>

        <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1.5rem; margin-bottom: 2rem; margin-left: 1rem; margin-right: 1rem;" class="shadow-sm">
            <form method="GET" action="{{ route('phones.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                
                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.25rem;">Година</label>
                    <input type="number" name="year" value="{{ request('year') }}" placeholder="Напр. 2023"
                           style="width: 100%; border: 1px solid #d1d5db; border-radius: 0.5rem; padding: 0.5rem;"
                           class="shadow-sm">
                </div>

                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.25rem;">Модел</label>
                    <select name="model_id" style="width: 100%; border: 1px solid #d1d5db; border-radius: 0.5rem; padding: 0.5rem;" class="shadow-sm">
                        <option value="">Всички модели</option>
                        @foreach($models as $model)
                            <option value="{{ $model->id }}" @selected(request('model_id') == $model->id)>
                                {{ $model->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.25rem;">Производител</label>
                    <select name="manufacturer_id" style="width: 100%; border: 1px solid #d1d5db; border-radius: 0.5rem; padding: 0.5rem;" class="shadow-sm">
                        <option value="">Всички производители</option>
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}" @selected(request('manufacturer_id') == $manufacturer->id)>
                                {{ $manufacturer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit" style="background-color: #2563eb; color: white; border-radius: 0.5rem; padding: 0.5rem 1rem; font-weight: 500; border: none; cursor: pointer;" class="flex-1 hover:opacity-90 shadow-sm">
                        Търси
                    </button>
                    <a href="{{ route('phones.index') }}" style="background-color: #ffffff; border: 1px solid #d1d5db; color: #374151; border-radius: 0.5rem; padding: 0.5rem 1rem; text-decoration: none; text-align: center;">
                        Изчисти
                    </a>
                </div>
            </form>
        </div>

        <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; overflow: hidden; margin-left: 1rem; margin-right: 1rem;" class="shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead style="background-color: #f8fafc;">
                        <tr>
                            <th scope="col" style="color: #64748b; padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Име на устройство</th>
                            <th scope="col" style="color: #64748b; padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Серия / Модел</th>
                            <th scope="col" style="color: #64748b; padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Марка</th>
                            <th scope="col" style="color: #64748b; padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Година</th>
                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #ffffff;" class="divide-y divide-gray-200">
                        @forelse($phones as $phone)
                        <tr class="hover:bg-gray-50">
                            <td style="padding: 1rem 1.5rem; white-space: nowrap;">
                                <div style="font-size: 0.875rem; font-weight: 700; color: #111827;">{{ $phone->name }}</div>
                            </td>
                            <td style="padding: 1rem 1.5rem; white-space: nowrap;">
                                <span style="background-color: #dbeafe; color: #1e40af; padding: 0.125rem 0.5rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600;">
                                    {{ $phone->model->name }}
                                </span>
                            </td>
                            <td style="padding: 1rem 1.5rem; white-space: nowrap; font-size: 0.875rem; color: #4b5563;">
                                {{ $phone->manufacturer->name }}
                            </td>
                            <td style="padding: 1rem 1.5rem; white-space: nowrap; font-size: 0.875rem; color: #6b7280;">
                                {{ $phone->release_year }}
                            </td>
                            <td style="padding: 1rem 1.5rem; white-space: nowrap; text-align: right; font-size: 0.875rem; font-weight: 500;">
                                <a href="#" style="color: #2563eb; text-decoration: none;">Виж</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="padding: 2.5rem; text-align: center; color: #6b7280;">
                                Няма намерени телефони за тези критерии.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6 px-4 sm:px-0">
            {{ $phones->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection