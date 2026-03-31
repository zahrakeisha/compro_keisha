@extends('template/layout')
@section('title', 'Dashboard')

@section('content')
        <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalvisitor }}</h3>

                <p>Visitors</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
              <a href="/visitor" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalmessage }}</h3>

                <p>Messages</p>
              </div>
              <div class="icon">
                <i class="far fa-envelope"></i>
              </div>
              <a href="/contact" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning ">
              <div class="inner">
                <h3>{{ $totalblog }}</h3>

                <p>Blog</p>
              </div>
              <div class="icon">
                <i class="far fa-newspaper"></i>
              </div>
              <a href="/blog" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalclient }}</h3>

                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="fas fa-handshake"></i>
              </div>
              <a href="/client" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
          
        <div class="row">
          <div class="col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Visitors This Year</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                <div class="chart">
                  <canvas id="visitorYearChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                  </canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Visitors This Month</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                  </canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-outline card-warning">
              <div class="card-header">
                <h3 class="card-title">Visitors This Week</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="visitorWeekChart"
                    style="min-height: 250px; height: 250px;">
                  </canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="card card-outline card-danger">

            <div class="card-header">
              <h3 class="card-title">Data Distribution</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <div class="chart">
                <canvas id="donutChart" style="min-height: 250px;"></canvas>
              </div>
            </div>

          </div>
        </div>
        </div>
        <!-- /.row -->
@endsection

<!--js chart-->
@push('js')
<script>
var labels = {!! json_encode($visitorChart->pluck('day')) !!};
var dataVisitor = {!! json_encode($visitorChart->pluck('total')) !!};

var ctx = document.getElementById('barChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total Visitor',
            data: dataVisitor,
            borderWidth: 2
            
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

<script>
    const ctxYear = document.getElementById('visitorYearChart');

    new Chart(ctxYear, {
        type: 'bar', // bisa ganti line
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Total Visitor',
                data: @json($visitorTotals),
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
new Chart(document.getElementById('visitorWeekChart'), {
    type: 'bar',
    data: {
        labels: @json($days),
        datasets: [{
            label: 'Total Visitor',
            data: @json($visitorWeekTotals),
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
new Chart(document.getElementById('donutChart'), {
    type: 'doughnut',
    data: {
        labels: ['Visitors', 'Messages', 'Blogs', 'Clients'],
        datasets: [{
            data: @json($donutData),
            backgroundColor: [
                '#17a2b8', // biru (visitor)
                '#28a745', // hijau (message)
                '#ffc107', // kuning (blog)
                '#dc3545'  // merah (client)
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
@endpush

