@extends('manager.layouts.app')

@push('css')

@endpush
@push('styles')

@endpush


@push('page-title-right')
{{--    <a href="#" class="btn btn-success waves-effect waves-light">--}}
{{--        <span class="btn-label"><i class="mdi mdi-plus"></i></span>@lang('add_new')--}}
{{--    </a>--}}
    @endpush
@section('title',__('general_settings'))


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
            <form action="{{ route('manager.setting.general.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">

                   <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="application_name">@lang('application_name')</label>
                                <input type="text" class="form-control @error('application_name') is-invalid @enderror" id="application_name" name="application_name" value="{{ setting('application_name','application_name') }}">
                                @error('application_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="site_name">@lang('site_name')</label>
                                <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name" value="{{ setting('site_name','site_name') }}">
                                @error('site_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="homepage_title">@lang('homepage_title')</label>
                                <input type="text" class="form-control @error('homepage_title') is-invalid @enderror" id="homepage_title" name="homepage_title" value="{{ setting('homepage_title','homepage_title') }}">
                                @error('homepage_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="site_description">@lang('site_description')</label>
                                <input type="text" class="form-control @error('site_description') is-invalid @enderror" id="site_description" name="site_description" value="{{ setting('site_description','site_description') }}">
                                @error('site_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="copyright">@lang('copyright')</label>
                                <input type="text" class="form-control @error('copyright') is-invalid @enderror" id="copyright" name="copyright" value="{{ setting('copyright','copyright') }}">
                                @error('copyright')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="keywords">@lang('keywords')</label>
                                <textarea  rows="6" class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords">{{ setting('keywords','keywords') }}</textarea>
                                @error('keywords')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="footer_about_section">@lang('footer_about_section')</label>
                                <textarea rows="6"  class="form-control @error('footer_about_section') is-invalid @enderror" id="footer_about_section" name="footer_about_section">{{ setting('footer_about_section','footer_about_section') }}</textarea>
                                @error('footer_about_section')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                   </div>
                    @include('manager.common.card-from-footer',['url' => route('manager.home')])

                </div> <!-- end card-box-->

            </form>

        </div>
    </div>
@endsection

@push('script')

@endpush

@push('scripts')


@endpush
