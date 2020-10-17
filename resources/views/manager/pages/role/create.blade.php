
@extends('manager.layouts.app')

@push('css')

@endpush
@push('styles')

@endpush


@push('page-title-right')

@endpush
@section('title',__('create_role'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <form action="{{ route('manager.role.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-12">
                                <label for="name">@lang('name')</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <hr class="mb-0">
                            </div>

                            @foreach($permissions as $permission)
                                <div class="from-group col-sm-3">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input {{ old('permissions') ? in_array($permission->id, old('permissions')) ? 'checked' : '' : '' }}  class="custom-control-input" name="permissions[]" id="customCheck.{{ $permission->id }}" type="checkbox" value="{{ $permission->id }}">
                                        <label class="custom-control-label" for="customCheck.{{ $permission->id }}">@lang($permission->name)</label>
                                    </div>
                                </div>
                            @endforeach



                        </div>
                    </div>

                    @include('manager.common.card-from-footer',['url' => route('manager.role.index')])
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush

@push('scripts')

@endpush
