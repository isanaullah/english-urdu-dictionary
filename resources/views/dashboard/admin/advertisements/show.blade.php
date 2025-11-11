@extends('dashboard.admin.layouts.app')

@section('title')
    <title>{{ __('View Advertisement') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('View Advertisement') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item"><a href="{{ route('advertisements.manage') }}">{{ __('Advertisements') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('View') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>{{ __('Advertisement Details') }}</h4>
                                <div>
                                    <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i> {{ __('Edit') }}
                                    </a>
                                    <a href="{{ route('advertisements.manage') }}" class="btn btn-secondary">
                                        <i class="fa fa-arrow-left"></i> {{ __('Back to List') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th width="200">{{ __('ID') }}:</th>
                                                <td>{{ $advertisement->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Name') }}:</th>
                                                <td>{{ $advertisement->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Position') }}:</th>
                                                <td>
                                                    <span class="badge badge-info">
                                                        {{ \App\Models\Advertisement::getPositions()[$advertisement->position] ?? $advertisement->position }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Status') }}:</th>
                                                <td>
                                                    <span class="badge badge-{{ $advertisement->status === 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($advertisement->status) }}
                                                    </span>
                                                    @if($advertisement->isActive())
                                                        <span class="badge badge-success ml-2">{{ __('Currently Active') }}</span>
                                                    @else
                                                        <span class="badge badge-warning ml-2">{{ __('Not Active') }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Advertisement Code') }}:</th>
                                                <td>
                                                    <pre class="bg-light p-2 border rounded" style="max-height: 200px; overflow-y: auto;"><code>{{ $advertisement->ad_code }}</code></pre>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Created') }}:</th>
                                                <td>{{ $advertisement->created_at->format('F d, Y \a\t g:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Last Updated') }}:</th>
                                                <td>{{ $advertisement->updated_at->format('F d, Y \a\t g:i A') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5>{{ __('Advertisement Preview') }}</h5>
                                            <div class="border rounded p-3 bg-light">
                                                {!! $advertisement->ad_code !!}
                                            </div>
                                            <small class="text-muted mt-2 d-block">
                                                {{ __('Live preview of the advertisement code') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
