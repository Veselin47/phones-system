@extends('layouts.app')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding-top: 3rem; padding-bottom: 3rem;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-6 px-4 sm:px-0">
            <h1 style="color: #1f2937; font-size: 1.875rem; font-weight: 800;">Управление на телефони</h1>
            <a href="{{ route('admin.phones.create') }}" style="background-color: #16a34a; color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem; text-decoration: none; font-weight: 600; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                + Добави нов телефон
            </a>
        </div>

        <div style="background-color: white; border-radius: 0.75rem; border: 1px solid #e5e7eb; overflow: hidden; box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1);" class="mx-4 sm:mx-0">
            <table class="min-w-full divide-y divide-gray-200">
                <thead style="background-color: #f9fafb;">
                    <tr>
                        <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase;">ID</th>
                        <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase;">Име</th>
                        <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase;">Модел</th>
                        <th style="padding: 1rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase;">Производител</th>
                        <th style="padding: 1rem 1.5rem; text-align: right; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase;">Действия</th>
                    </tr>
                </thead>
                <tbody style="background-color: white;" class="divide-y divide-gray-200">
                    @foreach($phones as $phone)
                    <tr class="hover:bg-gray-50">
                        <td style="padding: 1rem 1.5rem; font-size: 0.875rem; color: #6b7280;">{{ $phone->id }}</td>
                        <td style="padding: 1rem 1.5rem; font-size: 0.875rem; font-weight: 600; color: #111827;">{{ $phone->name }}</td>
                        <td style="padding: 1rem 1.5rem; font-size: 0.875rem; color: #4b5563;">{{ $phone->model->name }}</td>
                        <td style="padding: 1rem 1.5rem; font-size: 0.875rem; color: #4b5563;">{{ $phone->manufacturer->name }}</td>
                        <td style="padding: 1rem 1.5rem; text-align: right;">
                            <a href="{{ route('admin.phones.edit', $phone->id) }}" style="color: #d97706; font-weight: 600; margin-right: 1rem; text-decoration: none;">Редакция</a>
                            <form action="{{ route('admin.phones.destroy', $phone->id) }}" method="POST" onsubmit="return confirm('Изтриване?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: #dc2626; font-weight: 600; background: none; border: none; cursor: pointer;">Изтрий</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 px-4 sm:px-0">
            {{ $phones->links() }}
        </div>
    </div>
</div>
@endsection