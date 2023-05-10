@extends('layouts.base')

@section('title', 'Adopted')
@section('category', 'Animal & Adopter')
@section('content')
	<div class="table-responsive">
        <table id="plTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>TYPE</th>
                    <th>BREED</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>AGE</th>
                    <th>IMAGE</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>DATE ADOPTED</th>
                </tr>
                <tfoot>
                    <th>TYPE</th>
                    <th>BREED</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>AGE</th>
                    <th>IMAGE</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>DATE ADOPTED</th>
                </tfoot>
            </thead>
        </table>
    </div>
@endsection
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