
@extends('admin/layout')

@section('style')
<link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        
        <h1>{{ trans('backoffice.layers') }}</h1>
        
        <p class="clearfix">
            <a class="btn btn-success pull-right" href="{{ url('admin/layers/form') }}"><i class="fa fa-database"></i> {{ trans('backoffice.create_layer') }}</a>
        </p>

        <table id="example" class="display table-striped" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>{{ trans('backoffice.title') }}</th>
                    <th class="col-md-2">{{ trans('backoffice.options') }}</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>{{ trans('backoffice.title') }}</th>
                    <th>{{ trans('backoffice.options') }}</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

@stop

@section('script')
<script src=" {{ asset('assets/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').dataTable({
            "ajax": "{{ url('admin/layers') }}",
            "columns": [
                { "data": "content.title" },
                {
                    "orderable": false,
                    "searchable": false,
                    "render": function ( data, type, full, meta ) {
                        return '<a class="btn btn-success btn-xs" title="{{ trans('backoffice.edit') }}" href="' + "{{ url('admin/layers/form') }}/" + full.id + '"><i class="fa fa-pencil"></i></a>'
                            + '&nbsp;<a class="btn btn-danger btn-xs" title="{{ trans('backoffice.delete') }}" href="' + "{{ url('admin/layers/delete') }}/" + full.id + '"><i class="fa fa-trash"></i></a>';
                    }
                }
            ]
        });
    });
</script>
@stop
