@extends('layouts.base')

@section('content')
<h1>ANIMAL TABLE</h1>
    <div class="table-responsive">
        <table id="anTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TYPE</th>
                    <th>BREED</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>AGE</th>
                    <th>DATE RESCUED</th>
                    <th>PLACE RESCUED</th>
                    <th>IMAGE</th>
                    <th>DATE CHECKED</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
                <tfoot>
                    <th>ID</th>
                    <th>TYPE</th>
                    <th>BREED</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>AGE</th>
                    <th>DATE RESCUED</th>
                    <th>PLACE RESCUED</th>
                    <th>IMAGE</th>
                    <th>DATE CHECKED</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tfoot>
            </thead>
        </table>
    </div>
@endsection
 <div class="modal fade" id="anModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Animal</h4>
                </div>
                <div class="modal-body">
                    <form id="anForm" method="post" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group"> 
                            <label for="type" class="control-label">Type</label><br>
                            <label for="Cat">Cat</label>
                            {{ Form::radio('type', 'Cat', false) }}
                            <label for="Dog">Dog</label>
                            {{ Form::radio('type', 'Dog', false) }}
                            @if($errors->has('type'))
                                <small>{{ $errors->first('type') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="breed" class="control-label">Breed</label>
                            <input type="text" class="form-control " id="breed" name="breed" value="{{old('breed')}}">
                            @if($errors->has('breed'))
                            <small>{{ $errors->first('breed') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            @if($errors->has('name'))
                            <small>{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="gender" class="control-label">Gender</label><br>
                            <label for="Male">Male</label>
                            {{ Form::radio('gender', 'Male', false) }}
                            <label for="Female">Female</label>
                            {{ Form::radio('gender', 'Female', false) }}
                            @if($errors->has('gender'))
                                <small>{{ $errors->first('gender') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="age" class="control-label">Age</label>
                            <input type="text" class="form-control" id="age" name="age" value="{{old('age')}}">
                            @if($errors->has('age'))
                            <small>{{ $errors->first('age') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="date_rescued" class="control-label">Date Rescued</label><br>
                            {{ Form::date('date_rescued', \Carbon\Carbon::now()->format('Y-m-d')) }}
                            @if($errors->has('date_rescued'))
                            <small>{{ $errors->first('date_rescued') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="place_rescued" class="control-label">Place Rescued</label>
                            <input type="text" class="form-control" id="place_rescued" name="place_rescued" value="{{old('place_rescued')}}">
                            @if($errors->has('place_rescued'))
                            <small>{{ $errors->first('place_rescued') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="date_checked" class="control-label">Date Checked</label><br>
                            {{ Form::date('date_checked', \Carbon\Carbon::now()->format('Y-m-d')) }}
                            @if($errors->has('date_checked'))
                            <small>{{ $errors->first('date_checked') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
                            @if($errors->has('image'))
                            <small>{{$errors->first('image')}}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="rescuer_id" class="control-label">Rescuer</label>
                            {{ Form::select('rescuer_id', $rescuer, null, ['class'=>'form-control', 'placeholder'=>'Select rescuer:']) }}
                            @if($errors->has('rescuer_id'))
                            <small>{{ $errors->first('rescuer_id') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="personnel_id" class="control-label">Personnel</label>
                            {{ Form::select('personnel_id', $personnel, null, ['class'=>'form-control', 'placeholder'=>'Select personnel:']) }}
                            @if($errors->has('personnel_id'))
                            <small>{{ $errors->first('personnel_id') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="disease_injury" class="control-label">Disease/Injury</label><br>
                            @foreach ($disease_injury as $id => $treatmentdetail)
                                {{ Form::label('treatmentdetail', $treatmentdetail)}}
                                {{ Form::checkbox('disease_injury_id[]', $id, null, ['id'=>'treatmentdetail']) }}
                            @endforeach
                            @if($errors->has('disease_injury'))
                            <small>{{ $errors->first('disease_injury') }}</small>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="anFormSubmit" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="anEditModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Animal</h4>
                </div>
                <div class="modal-body">
                    <form id="eanForm" method="#" action="#" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group"> 
                            <label for="etype" class="control-label">Type</label><br>
                            <input type="text" class="form-control " id="etype" name="type"  >
                            @if($errors->has('type'))
                            <small>{{ $errors->first('type') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="ebreed" class="control-label">Breed</label>
                            <input type="text" class="form-control " id="ebreed" name="breed"  >
                            @if($errors->has('breed'))
                            <small>{{ $errors->first('breed') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="ename" class="control-label">Name</label>
                            <input type="text" class="form-control " id="ename" name="name"  >
                            @if($errors->has('name'))
                            <small>{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="egender" class="control-label">Gender</label><br>
                            <input type="text" class="form-control " id="egender" name="gender"  >
                            @if($errors->has('gender'))
                                <small>{{ $errors->first('gender') }}</small>
                            @endif
                        </div> 
                        <div class="form-group"> 
                            <label for="eage" class="control-label">Age</label>
                            <input type="text" class="form-control " id="eage" name="age"  >
                            @if($errors->has('age'))
                            <small>{{ $errors->first('age') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="edate_rescued" class="control-label">Date Rescued</label><br>
                            <input type="text" class="form-control " id="edate_rescued" name="date_rescued"  >
                            @if($errors->has('date_rescued'))
                            <small>{{ $errors->first('date_rescued') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="eplace_rescued" class="control-label">Place Rescued</label>
                            <input type="text" class="form-control " id="eplace_rescued" name="place_rescued"  >
                            @if($errors->has('place_rescued'))
                            <small>{{ $errors->first('place_rescued') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="edate_checked" class="control-label">Date Checked</label><br>
                            <input type="text" class="form-control " id="edate_checked" name="date_checked"  >
                            @if($errors->has('date_checked'))
                            <small>{{ $errors->first('date_checked') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="rescuer_id" class="control-label">Rescuer</label>
                            {{ Form::select('rescuer_id', $rescuer, null, ['class'=>'form-control', 'placeholder'=>'Select rescuer:']) }}
                            @if($errors->has('rescuer_id'))
                            <small>{{ $errors->first('rescuer_id') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="personnel_id" class="control-label">Personnel</label>
                            {{ Form::select('personnel_id', $personnel, null, ['class'=>'form-control', 'placeholder'=>'Select personnel:']) }}
                            @if($errors->has('personnel_id'))
                            <small>{{ $errors->first('personnel_id') }}</small>
                            @endif
                        </div>
                        <div class="form-group"> 
                            <label for="disease_injury" class="control-label">Disease/Injury</label>
                            @foreach ($disease_injury as $id => $treatmentdetail)
                                {{ Form::label('treatmentdetail', $treatmentdetail)}}
                                {{ Form::checkbox('disease_injury_id[]', $id, null, ['id'=>'treatmentdetail']) }}
                            @endforeach
                            @if($errors->has('disease_injury'))
                            <small>{{ $errors->first('disease_injury') }}</small>
                            @endif
                        </div>
                        <input type="hidden" id="id" name="id" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="anUpdatebtn" type="submit" class="btn btn-primary">Update</button>
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