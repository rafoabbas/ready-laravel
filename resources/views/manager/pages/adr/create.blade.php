
@extends('manager.layouts.app')

@push('css')

@endpush
@push('styles')

@endpush


@push('page-title-right')

@endpush
@section('title',__('create_adr'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <form action="{{ route('manager.adr.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-6">
                                <label for="name">@lang('name')</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="form-group col-6">
                                <label for="status">@lang('status')</label>
                                <select name="enabled" data-toggle="select2" id="status">
                                    <option {{ old('enabled') == '1' ? 'selected' : '' }}  value="1">@lang('enabled')</option>
                                    <option {{ old('enabled') == '0' ? 'selected' : '' }} value="0">@lang('disabled')</option>
                                </select>
                            </div>



                        </div>
                    </div>

                    @include('manager.common.card-from-footer',['url' => route('manager.adr.index')])
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush

@push('scripts')

@endpush
