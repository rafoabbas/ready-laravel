@extends('manager.layouts.app')

@push('css')

@endpush
@push('styles')

@endpush


@push('page-title-right')

@endpush
@section('title',__('edit_adr'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <form action="{{ route('manager.adr.update', $adr->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                       <div class="form-row">

                           <div class="form-group col-6">
                               <label for="name">@lang('name')</label>
                               <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $adr->name) }}">
                               @error('name')
                               <div class="invalid-feedback">
                                   {{ $message }}
                               </div>
                               @enderror
                           </div>


                           <div class="form-group col-6">
                               <label for="status">@lang('status')</label>
                               <select name="enabled" data-toggle="select2" id="status">
                                   <option {{ old('enabled', $adr->enabled) == '1' ? 'selected' : '' }}  value="1">@lang('enabled')</option>
                                   <option {{ old('enabled', $adr->enabled) == '0' ? 'selected' : '' }} value="0">@lang('disabled')</option>
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
