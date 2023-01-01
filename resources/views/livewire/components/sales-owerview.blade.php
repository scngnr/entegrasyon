 <div>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--begin::Chart widget 3-->
  <div class="card card-flush overflow-hidden h-md-100">
    <!--begin::Header-->
    <div class="card-header py-5">
      <!--begin::Title-->
      <h3 class="card-title align-items-start flex-column">
        <span class="card-label fw-bolder text-dark">Test</span>
        <span class="text-gray-400 mt-1 fw-bold fs-6">Günlük, aylık ve yıllık olarak inceleyebilirsiniz</span>
      </h3>
      <!--end::Title-->
      <!--begin::Actions-->
      <div class="card-toolbar">
        <!--begin::Filters-->
        <div class="d-flex flex-stack flex-wrap gap-4">
          <!--begin::Destination-->
          <div class="d-flex align-items-center fw-bolder">
            <!--begin::Label-->
            <?php $timestamp = \Carbon\Carbon::now()->timestamp ?>
            <div class="text-muted fs-7 me-2">{{$select}}Cateogry</div>
            <!--end::Label-->
            <!--begin::Select-->
            <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" wire:model=select >
              <option value="daily" selected>Günlük</option>
              <option value="weekly">Haftalık</option>
              <option value="montly">Aylık</option>
              <option value="yearly">Yıllık</option>
            </select>

            <script type="text/javascript">

            $( document ).ready(function() {

            $('#{{$timestamp}}').select2();
            });
            </script>
            <!--end::Select-->
          </div>
          <!--end::Destination-->
          <!--begin::Search-->
          <a href="/product" class="btn btn-light btn-sm">Ürün Sayfasına git</a>
          <!--end::Search-->
        </div>
        <!--begin::Filters-->
      </div>
      <!--end::Actions-->
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
      <!--begin::Chart-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <canvas id="{{$timestamp}}" max-width="150" max-height="250"></canvas>
      <script>
      <?php
      echo "const ctx = document.getElementById('{$timestamp}');
      const myChart = new Chart(ctx, {

          data: {
              labels: [ " ; for ($i=0; $i < count($ciroCount); $i++){echo "'" .  \Carbon\Carbon::now()->subDay(29 - $i)->day. " " . \Carbon\Carbon::now()->subDay(30 - $i)->dayName . "'" . ",";}
              echo "],
              datasets: [{
                  label: 'Satış tutarı',
                  type: 'line',
                  data: [ " ; for ($i=0; $i < count($ciroCount); $i++){echo  $ciroCount[$i] . ",";}
                  echo "0],
                  backgroundColor: [\"#3e95cd\", \"#8e5ea2\",\"#3cba9f\",\"#e8c3b9\",\"#c45850\"],
                  borderColor: [\"#3e95ce\", \"#8e5ea1\",\"#3cba9c\",\"#e8c3bf\",\"#c45852\"],
                  borderWidth: 2,
                  fill: false
              },
              {
                label: 'Satış adeti',
                type: 'bar',
                data: [ " ; for ($i=0; $i < count($saleCount); $i++){echo  count($saleCount[$i]) . ",";}
                echo "0],
                  backgroundColor: [
                      'rgba(255, 99, 255, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 3
              }]
          },
          options: {
  responsive: true,
  interaction: {
    mode: 'index',
    intersect: false,
  },
  stacked: false,
  plugins: {
    title: {
      display: true,
      text: 'Günlük Satış tutarı Adeti grafiği'
    }
  },
  scales: {
    y: {
      type: 'linear',
      display: true,
      position: 'left',
    },
    y1: {
      type: 'linear',
      display: true,
      position: 'right',

      // grid line settings
      grid: {
        drawOnChartArea: false, // only want the grid lines for one axis to show up
      },
    },
  }
},
      });";
       ?>
      </script>
      <!--end::Chart-->
    </div>
    <!--end::Card body-->
  </div>
  <!--end::Chart widget 3-->
</div>
