@extends('dashboard.admin.layouts.app')

@section('title')
    <title>{{ __('Create Advertisement') }}</title>
@endsection

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Create Advertisement') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item"><a href="{{ route('advertisements.manage') }}">{{ __('Advertisements') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Create') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Create New Advertisement') }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                    id="name" name="name" value="{{ old('name') }}" required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="position">{{ __('Position') }} <span class="text-danger">*</span></label>
                                                <select class="form-control @error('position') is-invalid @enderror" 
                                                    id="position" name="position" required>
                                                    <option value="">{{ __('Select Position') }}</option>
                                                    @foreach($positions as $key => $value)
                                                        <option value="{{ $key }}" {{ old('position') == $key ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('position')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                        <select class="form-control @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                {{ __('Active') }}
                                            </option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                {{ __('Inactive') }}
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="ad_code">{{ __('Advertisement Code') }} <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('ad_code') is-invalid @enderror" 
                                            id="ad_code" name="ad_code" rows="8" 
                                            placeholder="{{ __('Enter your advertisement HTML/JavaScript code here...') }}" required>{{ old('ad_code') }}</textarea>
                                        <small class="form-text text-muted">
                                            {{ __('You can paste HTML, JavaScript, or any advertisement code here.') }}
                                        </small>
                                        @error('ad_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> {{ __('Create Advertisement') }}
                                        </button>
                                        <a href="{{ route('advertisements.manage') }}" class="btn btn-secondary">
                                            <i class="fa fa-arrow-left"></i> {{ __('Back to List') }}
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image preview functionality
        const imageInput = document.getElementById('image');
        const imagePreview = document.createElement('div');
        imagePreview.className = 'mt-2';
        imageInput.parentNode.appendChild(imagePreview);

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.innerHTML = `
                        <img src="${e.target.result}" alt="Preview" 
                             class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = '';
            }
        });

        // Date validation
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');

        startDate.addEventListener('change', function() {
            endDate.min = this.value;
            if (endDate.value && endDate.value < this.value) {
                endDate.value = this.value;
            }
        });

        endDate.addEventListener('change', function() {
            if (startDate.value && this.value < startDate.value) {
                alert('{{ __("End date cannot be earlier than start date") }}');
                this.value = startDate.value;
            }
        });
    });
</script>
