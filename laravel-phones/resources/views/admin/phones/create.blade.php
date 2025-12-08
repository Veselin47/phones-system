@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding-top: 3rem; padding-bottom: 3rem;">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        
        <div style="margin-bottom: 1.5rem;">
            <a href="{{ route('admin.phones.index') }}" style="color: #6b7280; text-decoration: none; font-size: 0.875rem;">&larr; Обратно към списъка</a>
            <h1 style="color: #1f2937; font-size: 1.875rem; font-weight: 800; margin-top: 0.5rem;">Добави нов телефон</h1>
        </div>

        <div style="background-color: white; padding: 2rem; border-radius: 0.75rem; border: 1px solid #e5e7eb; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
            
            <form action="{{ route('admin.phones.store') }}" method="POST">
                @csrf
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Име на обявата/телефона</label>
                    <input type="text" name="name" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" placeholder="Напр. iPhone 13 Pro Max - Запазен" required>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Модел</label>
                    <select name="phone_model_id" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" required>
                        <option value="">Избери модел...</option>
                        @foreach($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }} ({{ $model->manufacturer->name }})</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Производител</label>
                    <select name="manufacturer_id" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" required>
                        <option value="">Избери производител...</option>
                        @foreach($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem;">Година на производство</label>
                    <input type="number" name="release_year" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" placeholder="2023">
                </div>

                <button type="submit" style="background-color: #16a34a; color: white; padding: 0.75rem 2rem; border-radius: 0.5rem; font-weight: 600; border: none; cursor: pointer; width: 100%;">
                    Запази телефона
                </button>
            </form>
        </div>
    </div>
</div>
@endsection