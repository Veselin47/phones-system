@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding-top: 3rem; padding-bottom: 3rem;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-8 px-4 sm:px-0">
            <div>
                <h1 style="color: #1f2937; font-size: 1.875rem; font-weight: 800; line-height: 1.25;">Каталог Модели</h1>
                <p style="color: #6b7280; margin-top: 0.25rem;">Разгледайте всички налични серии и модели телефони</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-4 sm:px-0">
            @foreach($models as $model)
            <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; overflow: hidden; transition: transform 0.2s; box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05);">
                <div style="padding: 1.5rem;">
                    
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">
                        {{ $model->name }}
                    </h3>

                    <div style="margin-bottom: 1.5rem;">
                        <span style="background-color: #eff6ff; color: #2563eb; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
                            {{ $model->manufacturer->name }}
                        </span>
                    </div>

                    <div style="padding-top: 1rem; border-top: 1px solid #f3f4f6;">
                        <a href="{{ route('phones.index', ['model_id' => $model->id]) }}" style="display: block; text-align: center; background-color: white; border: 1px solid #d1d5db; color: #374151; padding: 0.5rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: background-color 0.2s;">
                            Виж налични телефони
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-8 px-4 sm:px-0">
            {{ $models->links() }}
        </div>
    </div>
</div>
@endsection