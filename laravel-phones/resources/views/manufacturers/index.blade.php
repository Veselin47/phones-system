@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding-top: 3rem; padding-bottom: 3rem;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-6 px-4 sm:px-0">
            <h1 style="color: #1f2937; font-size: 1.875rem; font-weight: 800;">Всички производители</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-0">
            @foreach($manufacturers as $manufacturer)
            <div style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; overflow: hidden; transition: transform 0.2s; box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05);">
                <div style="padding: 1.5rem;">
                    <div class="flex items-center justify-between">
                        <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937;">{{ $manufacturer->name }}</h3>
                    </div>
                    
                    <div style="margin-top: 1rem; color: #6b7280; font-size: 0.875rem;">
                        Държава: <span style="font-weight: 500; color: #374151;">{{ $manufacturer->country ?? 'Неизвестна' }}</span>
                    </div>

                    <div style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #f3f4f6;">
                        <a href="{{ route('phones.index', ['manufacturer_id' => $manufacturer->id]) }}" style="display: block; text-align: center; background-color: #eff6ff; color: #2563eb; padding: 0.5rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600; font-size: 0.875rem;">
                            Виж телефоните &rarr;
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
         
        <div class="mt-6 px-4 sm:px-0">
            {{ $manufacturers->links() }}
        </div>
    </div>
</div>
@endsection