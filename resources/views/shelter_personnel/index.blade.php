@extends('layouts.base')

@section('content')
<H1>
    PERSONNEL TABLE
</H1>
    <div class="table-responsive">
        <table id="spTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th width="10%">IMAGE</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>JOB DESCRIPTION</th>
                    <th>ADDRESS</th>
                    <th>PHONE</th>
                    <th width="10%">ACTION</th>
                </tr>
                <tfoot>
                    <th>ID</th>
                    <th width="10%">IMAGE</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>JOB DESCRIPTION</th>
                    <th>ADDRESS</th>
                    <th>PHONE</th>
                    <th width="10%">ACTION</th>
                </tfoot>
            </thead>
        </table>
    </div>
@endsection
    <div class="modal fade" id="spModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create shelter personnel</h4>
                </div>
                <div class="modal-body">
                    <form id="spForm" method="post" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
                            @if($errors->has('image'))
                            <small>{{$errors->first('image')}}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="p_fname" class="control-label">First Name</label>
                            <input type="text" class="form-control " id="p_fname" name="p_fname" value="{{old('p_fname')}}" ></text>
                            @if($errors->has('p_fname'))
                                <small>{{ $errors->first('p_fname') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="p_lname" class="control-label">Last Name</label>
                            <input type="text" class="form-control " id="p_lname" name="p_lname" value="{{old('p_lname')}}">
                            @if($errors->has('p_lname'))
                            <small>{{ $errors->first('p_lname') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="job_description" class="control-label">Job Description</label><br>
                            <label for="Employee">Employee</label>
                            {{ Form::radio('job_description', 'Employee', false) }}
                            <label for="Veterinarian">Veterinarian</label>
                            {{ Form::radio('job_description', 'Veterinarian', false) }}
                            <label for="Volunteer">Volunteer</label>
                            {{ Form::radio('job_description', 'Volunteer', false) }}
                            @if($errors->has('job_description'))
                            <small>{{ $errors->first('job_description') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="address" class="control-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
                            @if($errors->has('address'))
                            <small>{{ $errors->first('address') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="phone" class="control-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                            @if($errors->has('phone'))
                            <small>{{ $errors->first('phone') }}</small>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="spFormSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="spEditModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Shelter Personnel</h4>
                </div>
                <div class="modal-body">
                    <form id="espForm" method="#" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group"> 
                            <label for="ep_fname" class="control-label">First Name</label>
                            <input type="text" class="form-control " id="ep_fname" name="p_fname"  >
                            @if($errors->has('p_fname'))
                            <small>{{ $errors->first('p_fname') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="ep_lname" class="control-label">Last Name</label>
                            <input type="text" class="form-control " id="ep_lname" name="p_lname"  >
                            @if($errors->has('p_lname'))
                            <small>{{ $errors->first('p_lname') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="ejob_description" class="control-label">Job Description</label>
                            <input type="text" class="form-control " id="ejob_description" name="job_description"  >
                            @if($errors->has('job_description'))
                            <small>{{ $errors->first('job_description') }}</small>
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
                    <button id="spUpdatebtn" type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        demo.initChartist();
        $.notify({
            icon: '',
            message: 
        },{
            type: 'warning',
            timer: 10
        });
    });
</script>
@endsection