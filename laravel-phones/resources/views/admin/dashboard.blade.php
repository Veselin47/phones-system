@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding-top: 3rem; padding-bottom: 3rem;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <h1 style="color: #1f2937; font-size: 2rem; font-weight: 800; margin-bottom: 1.5rem;">Админ панел</h1>
        <p style="color: #6b7280; margin-bottom: 2rem;">Добре дошъл! От тук можеш да управляваш цялото съдържание на сайта.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <a href="{{ route('admin.phones.index') }}" style="display: block; text-decoration: none;">
                <div style="background-color: white; padding: 2rem; border-radius: 0.75rem; border: 1px solid #e5e7eb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: transform 0.2s;">
                    <h2 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">📱 Телефони</h2>
                    <p style="color: #6b7280;">Добавяне, редакция и изтриване на обяви за телефони.</p>
                </div>
            </a>

            <a href="{{ route('admin.manufacturers.index') }}" style="display: block; text-decoration: none;">
                <div style="background-color: white; padding: 2rem; border-radius: 0.75rem; border: 1px solid #e5e7eb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: transform 0.2s;">
                    <h2 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">🏭 Производители</h2>
                    <p style="color: #6b7280;">Управление на марките (Apple, Samsung и др.).</p>
                </div>
            </a>

            <a href="{{ route('admin.models.index') }}" style="display: block; text-decoration: none;">
                <div style="background-color: white; padding: 2rem; border-radius: 0.75rem; border: 1px solid #e5e7eb; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); transition: transform 0.2s;">
                    <h2 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">Vk Модели</h2>
                    <p style="color: #6b7280;">Управление на сериите и моделите.</p>
                </div>
            </a>

        </div>
    </div>
</div>
@endsection