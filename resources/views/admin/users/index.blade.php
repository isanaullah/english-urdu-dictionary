@extends('dashboard.admin.layouts.app')

@section('title')
    <title>{{ __('Users') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            {{-- Page Header --}}
            <div class="section-header">
                <h1>{{ __('Users') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Users List') }}</div>
                </div>
            </div>

            {{-- Inject Livewire Component --}}
            <div class="section-body">
                @livewire('admin.user.show-user')
            </div>
        </section>
    </div>
@endsection
