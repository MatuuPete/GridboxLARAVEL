@extends('layouts.base')

@section('content')
<H1>Disease/Injury Tables</H1>
    <div class="table-responsive">
        <table id="diTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TYPE</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th width="10%">ACTION</th>
                </tr>
                <tfoot>
                    <th>ID</th>
                    <th>TYPE</th>
                    <th>NAME</th>
                    <th>DESCRIPTION</th>
                    <th width="10%">ACTION</th>
                </tfoot>
            </thead>
        </table>
    </div>
@endsection
    <div class="modal fade" id="diModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Disease/Injury</h4>
                </div>
                <div class="modal-body">
                    <form id="diForm" method="post" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group"> 
                            <label for="type" class="control-label">Type</label><br>
                            <label for="Disease">Disease</label>
                            {{ Form::radio('type', 'Disease', false) }}
                            <label for="Injury">Injury</label>
                            {{ Form::radio('type', 'Injury', false) }}
                            @if($errors->has('type'))
                                <small>{{ $errors->first('type') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="dis_inj" class="control-label">Name</label>
                            <input type="text" class="form-control " id="dis_inj" name="dis_inj" value="{{old('dis_inj')}}">
                            @if($errors->has('dis_inj'))
                            <small>{{ $errors->first('dis_inj') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="description" class="control-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
                            @if($errors->has('description'))
                            <small>{{ $errors->first('description') }}</small>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="diFormSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="diEditModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Disease/Injury</h4>
                </div>
                <div class="modal-body">
                    <form id="ediForm" method="#" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="etype" class="control-label">Type</label><br>
                            <input type="text" class="form-control " id="etype" name="type"  >
                            @if($errors->has('type'))
                            <small>{{ $errors->first('type') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="edis_inj" class="control-label">Disease Injury</label>
                            <input type="text" class="form-control " id="edis_inj" name="dis_inj"  >
                            @if($errors->has('dis_inj'))
                            <small>{{ $errors->first('dis_inj') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="edescription" class="control-label">Disease Injury</label>
                            <input type="etext" class="form-control " id="edescription" name="description"  >
                            @if($errors->has('description'))
                            <small>{{ $errors->first('description') }}</small>
                            @endif
                        </div> 
                        <input type="hidden" id="id" name="id" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="diUpdatebtn" type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        demo.initChartist();
        $.notify({
            icon: ,
            message: 
        },{
            type: 'danger',
            timer: 10
        });
    });
</script>
@endsection