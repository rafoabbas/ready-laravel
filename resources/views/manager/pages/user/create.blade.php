
@extends('manager.layouts.app')

@push('css')

@endpush
@push('styles')

@endpush


@push('page-title-right')

@endpush
@section('title',__('create_user'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <form action="{{ route('manager.user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('name') }}" placeholder="">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('username') }}</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="">
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('email') }}</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('phone') }}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('user') }} {{ __('role') }}</label>
                                <select class="form-control" name="role" data-toggle="select">
                                    @foreach($roles as $role)
                                        <option {{ old('role') == $role->id ? 'selected' : '' }}  value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('avatar') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('avatar') is-invalid @enderror" name="avatar" id="customFileLang" lang="tr">
                                    <label class="custom-file-label" for="customFileLang">{{ __('select') }} {{ __('avatar') }} </label>
                                    @error('avatar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('password') }}</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" placeholder="">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('confirm') }} {{ __('password') }}</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="" placeholder="">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-control-label required">{{ __('status') }}</label>
                                <select class="form-control" name="enabled" data-toggle="select">
                                    <option {{ old('enabled') == '1' ? 'selected' : '' }}  value="1">{{ __('enable') }}</option>
                                    <option {{ old('enabled') == '0' ? 'selected' : '' }} value="0">{{ __('disable') }}</option>
                                </select>
                                @error('enabled')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    @include('manager.common.card-from-footer',['url' => route('manager.user.index')])
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush

@push('scripts')

@endpush
