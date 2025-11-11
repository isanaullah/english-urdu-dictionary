@extends('dashboard.admin.layouts.app')

@section('title')
    <title>{{ __('Manage Advertisements') }}</title>
@endsection

<div id="alert-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; max-width: 300px;">
    @if (session('success'))
        <div class="alert-message"
            style="padding: 10px 15px; border-radius: 5px; margin-bottom: 10px; font-size: 14px; color: #fff; background: #47C363; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert-message"
            style="padding: 10px 15px; border-radius: 5px; margin-bottom: 10px; font-size: 14px; color: #fff; background: #ff0018; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
            {{ session('error') }}
        </div>
    @endif

    @if (session('info'))
        <div class="alert-message"
            style="padding: 10px 15px; border-radius: 5px; margin-bottom: 10px; font-size: 14px; color: #fff; background: #17a2b8; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);">
            {{ session('info') }}
        </div>
    @endif
</div>

@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Manage Advertisements') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Advertisements List') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="mt-4 row">
                    {{-- Advertisements Table --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Advertisements List') }}</h4>
                                <div>
                                    <a href="{{ route('advertisements.create') }}" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> {{ __('Add New') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('ID') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Position') }}</th>
                                                <th>{{ __('Ad Code') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th class="text-center">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($advertisements as $ad)
                                                <tr>
                                                    <td>{{ $ad->id }}</td>
                                                    <td>{{ $ad->name }}</td>
                                                    <td>
                                                        <span class="badge badge-info">
                                                            {{ \App\Models\Advertisement::getPositions()[$ad->position] ?? $ad->position }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <code style="font-size: 12px;">{{ Str::limit($ad->ad_code, 50) }}</code>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input status-toggle" type="checkbox" 
                                                                data-id="{{ $ad->id }}" 
                                                                {{ $ad->status === 'active' ? 'checked' : '' }}>
                                                            <label class="form-check-label">
                                                                <span class="badge badge-{{ $ad->status === 'active' ? 'success' : 'danger' }}">
                                                                    {{ ucfirst($ad->status) }}
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('advertisements.show', $ad->id) }}"
                                                            class="btn btn-info btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{ route('advertisements.edit', $ad->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                            data-delete-url="{{ route('advertisements.destroy', $ad->id) }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">{{ __('No Advertisements Found') }}
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">{{ __('Delete Advertisement') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('Are you sure you want to delete this advertisement?') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a href="javascript:;" class="btn btn-danger" id="confirmDeleteBtn">{{ __('Delete') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Status toggle functionality
        const statusToggles = document.querySelectorAll('.status-toggle');
        statusToggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const adId = this.getAttribute('data-id');
                const status = this.checked ? 'active' : 'inactive';
                
                fetch('{{ route("advertisements.updateStatus") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id: adId,
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update badge
                        const badge = this.parentElement.querySelector('.badge');
                        badge.textContent = status.charAt(0).toUpperCase() + status.slice(1);
                        badge.className = `badge badge-${status === 'active' ? 'success' : 'danger'}`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Revert toggle on error
                    this.checked = !this.checked;
                });
            });
        });

        // Delete functionality
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteModal = document.getElementById('deleteModal');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let deleteUrl = '';

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                deleteUrl = button.getAttribute('data-delete-url');
                $(deleteModal).modal('show');
            });
        });

        confirmDeleteBtn.addEventListener('click', function() {
            if (deleteUrl) {
                const form = document.createElement('form');
                form.setAttribute('method', 'POST');
                form.setAttribute('action', deleteUrl);

                const csrfToken = document.createElement('input');
                csrfToken.setAttribute('type', 'hidden');
                csrfToken.setAttribute('name', '_token');
                csrfToken.setAttribute('value', '{{ csrf_token() }}');
                form.appendChild(csrfToken);

                const methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'DELETE');
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        });
    });
</script>

<!--Message Time-->
<script>
    setTimeout(function() {
        document.querySelectorAll('.alert-message').forEach(function(alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
</script>

<script src="{{ asset('backend/js/sweetalert.js') }}"></script>
