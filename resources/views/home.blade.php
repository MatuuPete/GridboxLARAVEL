@extends('layouts.base')

@section('content')
<style>
    .harapan img{
        width:100%;
        height:auto;
    }
</style>
<div class="harapan">
<img src="/storage/images/Front.png" alt="50%">

</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<h1> Adoptable Animals</h1>
    <div class="card-body" style="height: 50px;">
      <input type="text" id='animalSearch' placeholder="Search">
    </div> 


    
    <div  class="table-responsive">
        <table id="aatable" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>TYPE</th>
                <th>BREED</th>
                <th>NAME</th>
                <th>GENDER</th>
                <th>AGE</th>
                <th>IMAGE</th>
            </tr>
            </thead>
            <tfoot>
                <th>ID</th>
                <th>TYPE</th>
                <th>BREED</th>
                <th>NAME</th>
                <th>GENDER</th>
                <th>AGE</th>
                <th>IMAGE</th>
            </tfoot>
            <tbody id="aabody"></tbody>
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
