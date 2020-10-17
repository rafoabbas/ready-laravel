<div class="card-footer bg-white">
    @stack('pagination_start')
    @if ($items->firstItem())
        <div class="row">
            <div class="col-sm-5 d-flex align-items-center">
                <select data-toggle="pagination" name="limit" class="form-control form-control-sm d-inline-block w-auto d-none d-md-block">
                    <option value="10" {{ request('limit', setting('default_list_limit','10')) == '10' ? 'selected' : '' }} selected="selected">10</option>
                    <option value="25" {{ request('limit') == '25' ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('limit') == '50' ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('limit') == '100' ? 'selected' : '' }}>100</option>
                </select>
                <span class="table-text d-none d-lg-block ml-2">
                {{ __('per_page') }},
                {{ __('per_page_showing', ['first' => $items->firstItem(), 'last' => $items->lastItem(), 'total' => $items->total()]) }}
        </span>
            </div>
            <div class="col-sm-7 pagination-xs">
                <nav class="float-right">
                    {!! $items->withPath(request()->url())->appends(request()->except('page'))->links() !!}
                </nav>
            </div>
        </div>

    @else
        <div class="col-xs-12 col-sm-12" id="datatable-basic_info" role="status" aria-live="polite">
            <span>{{ trans('no_records') }}</span>
        </div>
    @endif
    @stack('pagination_end')

</div>
