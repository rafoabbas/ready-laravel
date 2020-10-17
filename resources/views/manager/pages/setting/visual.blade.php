@extends('manager.layouts.app')

@push('css')

@endpush
@push('styles')
    <style>
        .img-fluid{
            height: 100px;
        }
    </style>
@endpush


@push('page-title-right')

    @endpush
@section('title',__('visual_settings'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('manager.setting.visual.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card border border-light">
                                    <div class="card-header">@lang('logo_upload')</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="inputGroupFile04">
                                                    <label class="custom-file-label" for="inputGroupFile04">@lang('choose_file')</label>
                                                </div>
                                            </div>
                                            @error('logo')
                                            <div class="text-danger">
                                                <small>{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('uploads/'.setting('logo')) }}" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border border-light">
                                    <div class="card-header">@lang('logo_dark_upload')</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="logo_dark" class="custom-file-input @error('logo_dark') is-invalid @enderror" id="inputGroupFile0logo_dark">
                                                    <label class="custom-file-label" for="inputGroupFile0logo_dark">@lang('choose_file')</label>
                                                </div>
                                            </div>
                                            @error('logo_dark')
                                            <div class="text-danger">
                                                <small>{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('uploads/'.setting('logo_dark')) }}" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border border-light">
                                    <div class="card-header">@lang('mail_and_footer_logo_upload')</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="logo_footer" class="custom-file-input @error('logo_footer') is-invalid @enderror" id="inputGroupFile04">
                                                    <label class="custom-file-label" for="inputGroupFile04">@lang('choose_file')</label>
                                                </div>
                                            </div>
                                            @error('logo_footer')
                                            <div class="text-danger">
                                                <small>{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('uploads/'.setting('logo_footer')) }}" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card border border-light">
                                    <div class="card-header">@lang('favicon_upload')</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="favicon" class="custom-file-input @error('favicon') is-invalid @enderror" id="inputGroupFile04">
                                                    <label class="custom-file-label" for="inputGroupFile04">@lang('choose_file')</label>
                                                </div>
                                            </div>
                                            @error('favicon')
                                            <div class="text-danger">
                                                <small>{{ $message }}</small>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('uploads/'.setting('favicon')) }}" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('manager.common.card-from-footer',['url' => route('manager.home')])

                </div>
            </form>

        </div>
    </div>
@endsection

@push('script')

@endpush

@push('scripts')
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endpush
