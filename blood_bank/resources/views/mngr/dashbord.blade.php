@extends('mngr.layout.template')

@section('content')
    
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">All Donners <i class="mdi mdi-diamond mdi-24px float-right"></i>
            {{-- <i class="mdi mdi-chart-line mdi-24px float-right"></i> --}}
          </h4>
          <h2 class="mb-5">{{$total_donners}}</h2>
          <a href="{{route('donners')}}" class="card-text text-decoration-none text-white">Check all donners &rarr;</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">New Donners <i class="mdi mdi-diamond mdi-24px float-right"></i>
            {{-- <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i> --}}
          </h4>
          <h2 class="mb-5">{{$total_latest_donners}}</h2>
          <a href="{{route('donners').'?start='.date('Y-m-d H:i:s',strtotime('-1 month')).'&end='.date('Y-m-d H:i:s').'&filter=Filter'}}" class="card-text text-decoration-none text-white">Check new donners &rarr;</a>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Donners in Malappuram <i class="mdi mdi-diamond mdi-24px float-right"></i>
          </h4>
          <h2 class="mb-5">{{$total_mlp_donners}}</h2>
          <a href="{{route('donners').'?fname=&lname=&district=5&group=&filter=Filter'}}" class="card-text text-decoration-none text-white">Check donners in malappuram &rarr;</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body" id="group-chart">
          {{-- <h4 class="card-title">Project Status</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Name </th>
                  <th> Due Date </th>
                  <th> Progress </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> 1 </td>
                  <td> Herman Beck </td>
                  <td> May 15, 2015 </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td> 2 </td>
                  <td> Messsy Adam </td>
                  <td> Jul 01, 2015 </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td> 3 </td>
                  <td> John Richards </td>
                  <td> Apr 12, 2015 </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td> 4 </td>
                  <td> Peter Meggik </td>
                  <td> May 15, 2015 </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td> 5 </td>
                  <td> Edward </td>
                  <td> May 03, 2015 </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td> 5 </td>
                  <td> Ronald </td>
                  <td> Jun 05, 2015 </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-dark">Active Blood Donners</h4>
          {{-- <div class="add-items d-flex">
            <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
            <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
          </div> --}}
          <div class="list-wrapper">
            <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox myCheckbox" type="checkbox" checked> O-ve </label>
                </div>
                {{-- <i class="remove mdi mdi-close-circle-outline"></i> --}}
                <span class="remove">{{ $bloodGroupDonnerCount['o']}}</span>
              </li>
              <li class="form-check">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox myCheckbox" type="checkbox" checked> AB-ve </label>
                </div>
                <span class="remove">{{ $bloodGroupDonnerCount['ab']}}</span>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox myCheckbox" type="checkbox" checked> B-ve </label>
                </div>
                <span class="remove">{{ $bloodGroupDonnerCount['b']}}</span>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox myCheckbox" type="checkbox" checked> A-ve </label>
                </div>
                <span class="remove">{{ $bloodGroupDonnerCount['a']}}</span>
              </li>
              <li class="form-check">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox myCheckbox" type="checkbox" checked> O+ve </label>
                </div>
                <span class="remove">{{ $bloodGroupDonnerCount['O']}}</span>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox myCheckbox" type="checkbox" checked> AB+ve </label>
                </div>
                <span class="remove">{{ $bloodGroupDonnerCount['AB']}}</span>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox myCheckbox" type="checkbox" checked> B+ve </label>
                </div>
                <span class="remove">{{ $bloodGroupDonnerCount['B']}}</span>
              </li>
              <li>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox myCheckbox" type="checkbox" checked> A+ve </label>
                </div>
                <span class="remove">{{ $bloodGroupDonnerCount['A']}}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
  <!--Graph goes-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Blood Group', 'Count'],
        <?php echo $graph_list;?>
      ]);

      var options = {
        title: 'Donners in Groups',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('group-chart'));
      chart.draw(data, options);
    }
  </script>
  <!--Graph goes-->
  