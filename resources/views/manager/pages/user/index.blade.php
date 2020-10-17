@extends('manager.layouts.app')

@push('css')

@endpush
@push('styles')

@endpush


@push('page-title-right')
    <a href="{{ route('manager.user.create') }}" class="btn btn-success waves-effect waves-light">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('add_new')
    </a>
    @endpush
@section('title',__('user_list'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <form action="{{ route('manager.user.index') }}">
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                    <input type="hidden" name="direction" value="{{ request('direction') }}">
                    <input type="hidden" name="page" value="{{ request('page') }}">
                    <input type="hidden" name="limit" value="{{ request('limit') }}">
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <input type="text" placeholder="@lang('enter_name')" class="form-control" value="{{ request('name') }}" name="name">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="button-list float-right">

                                    <button type="submit" class="btn btn-info waves-effect waves-light">
                                        <span class="btn-label"><i class="mdi mdi-search-web"></i></span>@lang('search')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="card">

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-light ">
                        <tr>
                            <th>@sortablelink('id', '#',['filter' => 'active, visible'])</th>
                            <th>@sortablelink('name', __('name'))</th>
                            <th>@sortablelink('username', __('username'))</th>
                            <th>@sortablelink('email', __('email'))</th>
                            <th>@sortablelink('enabled', __('status'))</th>
                            <th>@sortablelink('created_at', __('created_at'))</th>
                            <th>@lang('actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>@include('manager.common.table-status', ['status' => $item->enabled])</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="justify-content-center">
                                    <div class="dropdown ">
                                        <a href="#" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-tbl" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" style="">
                                            <a class="dropdown-item" href="{{ route('manager.user.edit', $item->id) }}"><i class="mdi mdi-file-edit mr-2 text-muted vertical-middle"></i>@lang('edit')</a>
                                            @include('manager.common.table-dropdown-delete',['url' => route('manager.user.destroy', $item->id)])
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @include('manager.common.card-pagination',['items' => $items])
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush

@push('scripts')

@endpush
