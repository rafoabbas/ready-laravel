<div class="card-footer">
    <div class="row">
        <div class="col-md-12">
            <div class="button-list float-right">
                <a href="{{(isset($url)) ? $url : ''}}" class="btn btn-danger waves-effect waves-light">
                    <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>@lang('cancel')
                </a>
                <button type="submit" class="btn btn-success waves-effect waves-light">
                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('save')
                </button>
            </div>
        </div>
    </div>

</div>
