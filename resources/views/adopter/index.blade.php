@extends('layouts.base')
@section('content')
<h1>Adopter Tables</h1>
    <div class="table-responsive">
        <table id="adTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>DATE ADOPTED</th>
                    <th>ADDRESS</th>
                    <th>PHONE</th>
                    <th width="10%">ACTION</th>
                </tr>
                <tfoot>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>DATE ADOPTED</th>
                    <th>ADDRESS</th>
                    <th>PHONE</th>
                    <th width="10%">ACTION</th>
                </tfoot>
            </thead>
        </table>
    </div>
@endsection
<div class="modal fade" id="adEditModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Adopter</h4>
                </div>
                <div class="modal-body">
                    <form id="eadForm" method="#" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group"> 
                            <label for="ea_fname" class="control-label">First Name</label>
                            <input type="text" class="form-control " id="ea_fname" name="a_fname"  >
                            @if($errors->has('a_fname'))
                            <small>{{ $errors->first('a_fname') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="ea_lname" class="control-label">Last Name</label>
                            <input type="text" class="form-control " id="ea_lname" name="a_lname"  >
                            @if($errors->has('a_lname'))
                            <small>{{ $errors->first('a_lname') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="edate_adopted" class="control-label">Date Adopted</label>
                            <input type="text" class="form-control " id="edate_adopted" name="date_adopted"  >
                            @if($errors->has('date_adopted'))
                            <small>{{ $errors->first('date_adopted') }}</small>
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
                    <button id="adUpdatebtn" type="submit" class="btn btn-primary">Update</button>
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
            type: 'warning',
            timer: 10
        });
    });
</script>
@endsection