@extends('manager.layouts.app')

@push('css')

@endpush
@push('styles')

@endpush


@push('page-title-right')
    <a href="#" class="btn btn-success waves-effect waves-light">
        <span class="btn-label"><i class="mdi mdi-plus"></i></span>@lang('add_new')
    </a>
    @endpush
@section('title',__('home'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush

@push('scripts')

@endpush
