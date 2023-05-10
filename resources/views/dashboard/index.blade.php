@extends('layouts.base')
@section('brand', 'Dashboard')
@section('content')
    <div class="row">
          <div class="col-md-12">
            <div class="card">

            <div class="row">
                    <div class="col-md-9 pr-1">
                      <h4 class="card-title">Monthly Adopted</h4>
                        <div id="animalAdopted_chart_container" style=" border-radius:1%;">
                          <div class="row">
                            <div style="margin-right:30px; margin-left:20px;" class="col-md-2 pr-1">
                              <label><b>Start</b></label><br>
                              <input style="width:100px;" type="text" name="from_date" id="adoption_from_date" class="form-control" placeholder="From date"/>
                            </div>

                            <div style="margin-right:30px;"class="col-md-2 pr-1">
                              <label><b>End</b></label><br>
                              <input style="width:100px;" type="text" name="to_date" id="adoption_to_date" class="form-control" placeholder="To date"/>
                            </div>

                            <div class="col-md-2 pr-1">
                              <label><b></b></label><br>
                              <button  id="view_adopted" class="btn btn-default" style="margin: 1px;border: 1px groove white;">View</button>
                            </div>
                          </div>
                          <canvas id="adopt_chart"width="9px" height="9px"></canvas>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="container">
                  <div class="row">
                    <div class="col-md-9 pl-1">
                      <h4 class="card-title">Monthly Rescued</h4>
                        <div id="animalRescued_chart_container" style=" border-radius:1%;">  
                          <div class="row">
                            <div style="margin-right:30px; margin-left:20px;" class="col-md-2 pr-1">
                              <label><b>Start</b></label><br>
                                <input style="width:100px;" type="text" name="from_date" id="rescued_from_date" class="form-control" placeholder="From date"/>
                            </div>

                            <div style="margin-right:30px;"class="col-md-2 pr-1">
                              <label><b>End</b></label><br>
                              <input style="width:100px;" type="text" name="to_date" id="rescued_to_date" class="form-control" placeholder="To date"/>
                            </div>

                            <div class="col-md-2 pl-1">
                              <label><b></b></label><br>
                              <button id="view_rescued" class="btn btn-default" style="margin: 1px;border: 1px groove white;">View</button>
                            </div>
                          </div>
                          <canvas id="rescue_chart" width="9" height="9"></canvas>
                        </div>
                    </div>
                   </div>

                
            </div>
          </div>
@endsection    
@section('script')
<script type='text/javascript' src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
<script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.min.js" integrity="sha256-RQLbEU539dpygNMsBGZlplus6CkitaLy0btTCHcULpI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        demo.initChartist();
        $.notify({
            icon: 'fa fa-heart',
            message: "Welcome to <b>Dashboard</b>."
        },{
            type: 'danger',
            timer: 10
        });
    });
</script>
@endsection