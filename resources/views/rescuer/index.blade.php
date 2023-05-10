@extends('layouts.base')
@section('content')
<h1>RESCUER TABLE</h1>
    <div class="table-responsive">
        <table id="rTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th width="10%">IMAGE</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>ADDRESS</th>
                    <th>PHONE</th>
                    <th width="10%">ACTION</th>
                </tr>
                <tfoot>
                    <th>ID</th>
                    <th width="10%">IMAGE</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>ADDRESS</th>
                    <th>PHONE</th>
                    <th width="10%">ACTION</th>
                </tfoot>
            </thead>
            <tbody id="rBody">
        </table>
    </div>
@endsection
    <div class="modal fade" id="rModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Rescuer</h4>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" id="rForm" role="form" method="post" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group"> 
                            <label for="r_fname" class="control-label">First Name</label>
                            <input type="text" class="form-control " id="r_fname" name="r_fname"></text>
                        </div> 
                        <div class="form-group"> 
                            <label for="r_lname" class="control-label">Last Name</label>
                            <input type="text" class="form-control " id="r_lname" name="r_lname">
                        </div>
                        <div class="form-group"> 
                            <label for="address" class="control-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="form-group"> 
                            <label for="phone" class="control-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">    
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="rFormSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="rEditModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Rescuer</h4>
                </div>
                <div class="modal-body">
                    <form id="erForm" role="form" method="#" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group"> 
                            <label for="er_fname" class="control-label">First Name</label>
                            <input type="text" class="form-control " id="er_fname" name="r_fname"  >
                            @if($errors->has('r_fname'))
                            <small>{{ $errors->first('r_fname') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="er_lname" class="control-label">Last Name</label>
                            <input type="text" class="form-control " id="er_lname" name="r_lname"  >
                            @if($errors->has('r_lname'))
                            <small>{{ $errors->first('r_lname') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="eaddress" class="control-label">Address</label>
                            <input type="text" class="form-control " id="eaddress" name="address"  >
                            @if($errors->has('address'))
                            <small>{{ $errors->first('address') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="ephone" class="control-label">Phone</label>
                            <input type="text" class="form-control " id="ephone" name="phone"  >
                            @if($errors->has('phone'))
                            <small>{{ $errors->first('phone') }}</small>
                            @endif
                        </div> 
                        <input type="hidden" id="id" name="id" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="rUpdatebtn" type="submit" class="btn btn-primary">Update</button>
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