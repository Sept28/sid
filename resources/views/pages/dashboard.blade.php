@extends('layouts.app')

@section('content')
  <main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Dashboard
      </h2>
      <!-- Cards -->
      <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total Keluarga
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $family->count() }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
          >
            <svg class="w-6 h-6"
                 fill="currentColor" 
                 viewBox="0 0 20 20" 
                 xmlns="http://www.w3.org/2000/svg"
            >
              <path fill-rule="evenodd" 
                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" 
                    clip-rule="evenodd">
              </path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Penduduk
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $villager->count() }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
          >
            <svg class="w-6 h-6"
                 fill="currentColor" 
                 viewBox="0 0 20 20" 
                 xmlns="http://www.w3.org/2000/svg"
                 ><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Pendatang
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $comer->count() }}
            </p>
          </div>
        </div>
        <!-- Card -->
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
          >
            <svg class="w-6 h-6"
                 fill="currentColor" 
                 viewBox="0 0 20 20" 
                 xmlns="http://www.w3.org/2000/svg"
            >
              <path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z"></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Pindahan
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $mover->count() }}
            </p>
          </div>
        </div>
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
          >
            <svg class="w-6 h-6"
                 fill="currentColor" 
                 viewBox="0 0 20 20" 
                 xmlns="http://www.w3.org/2000/svg"
            >
              <path fill-rule="evenodd" 
                    d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" 
                    clip-rule="evenodd"></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Kelahiran
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $birth->count() }}
            </p>
          </div>
        </div>
        <div
          class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <div
            class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
          >
            <svg class="w-6 h-6"
                 fill="currentColor" 
                 viewBox="0 0 20 20" 
                 xmlns="http://www.w3.org/2000/svg"
            >
                  <path fill-rule="evenodd"
                   d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z"
                   clip-rule="evenodd"></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Meninggal
            </p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
              {{ $death->count() }}
            </p>
          </div>
        </div>
      </div>

      <!-- Charts -->
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Statistik
      </h2>
      <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div
          class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Kelahiran dan Kematian
          </h4>
          <canvas id="bar"></canvas>
          <div
            class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
          >
          </div>
        </div>
        <div
          class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Pendatang dan Pindahan
          </h4>
          <canvas id="line"></canvas>
          <div
            class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
          >
          </div>
        </div>
      </div>
      <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div
          class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
          <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
            Jenis Kelamin
          </h4>
          <canvas id="pie"></canvas>
          <div
            class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
          >
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@push('after-script')
  <script>
    /**
     * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
     */
    const pieConfig = {
      type: 'doughnut',
      data: {
        datasets: [
          {
            data: [{{ $pie['l'] }}, {{ $pie['p'] }}],
            /**
             * These colors come from Tailwind CSS palette
             * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
             */
            backgroundColor: ['#7e3af2', '#0694a2', '#1c64f2'],
            label: 'Dataset 1',
          },
        ],
        labels: ['Laki-laki', 'Perempuan']
      },
      options: {
        responsive: true,
        cutoutPercentage: 80,
        /**
         * Default legends are ugly and impossible to style.
         * See examples in charts.html to add your own legends
         *  */
        legend: {
          display: false,
        },
      },
    }

    // change this to the id of your chart element in HMTL
    const pieCtx = document.getElementById('pie')
    window.myPie = new Chart(pieCtx, pieConfig)

    /**
   * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
   */
  const lineConfig = {
    type: 'line',
    data: {
      labels: ['September', 'Oktober', 'November', 'Desember', 'January', 'February'],
      datasets: [
        {
          label: 'Pendatang',
          /**
           * These colors come from Tailwind CSS palette
           * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
           */
          backgroundColor: '#0694a2',
          borderColor: '#0694a2',
          data: [{{ $lcomer['sept'] }}, {{ $lcomer['okt'] }}, {{ $lcomer['nov'] }}, {{ $lcomer['des'] }}, {{ $lcomer['jan'] }}, {{ $lcomer['feb'] }}],
          fill: false,
        },
        {
          label: 'Pindahan',
          fill: false,
          /**
           * These colors come from Tailwind CSS palette
           * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
           */
          backgroundColor: '#7e3af2',
          borderColor: '#7e3af2',
          data: [{{ $lmover['sept'] }}, {{ $lmover['okt'] }}, {{ $lmover['nov'] }}, {{ $lmover['des'] }}, {{ $lmover['jan'] }}, {{ $lmover['feb'] }}],
        },
      ],
    },
    options: {
      responsive: true,
      /**
       * Default legends are ugly and impossible to style.
       * See examples in charts.html to add your own legends
       *  */
      legend: {
        display: false,
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true,
      },
      scales: {
        x: {
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Month',
          },
        },
        y: {
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value',
          },
        },
      },
    },
  }

  // change this to the id of your chart element in HMTL
  const lineCtx = document.getElementById('line')
  window.myLine = new Chart(lineCtx, lineConfig)

  
  /**
   * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
   */
  const barConfig = {
    type: 'bar',
    data: {
      labels: ['September', 'Oktober', 'November', 'Desember', 'January', 'February'],
      datasets: [
        {
          label: 'Lahir',
          backgroundColor: '#0694a2',
          // borderColor: window.chartColors.red,
          borderWidth: 1,
          data: [{{ $barbirth['sept'] }}, {{ $barbirth['okt'] }}, {{ $barbirth['nov'] }}, {{ $barbirth['des'] }}, {{ $barbirth['jan'] }}, {{ $barbirth['feb'] }}],
        },
        {
          label: 'Meninggal',
          backgroundColor: '#7e3af2',
          // borderColor: window.chartColors.blue,
          borderWidth: 1,
          data: [{{ $bardeath['sept'] }}, {{ $bardeath['okt'] }}, {{ $bardeath['nov'] }}, {{ $bardeath['des'] }}, {{ $bardeath['jan'] }}, {{ $bardeath['feb'] }}],
        },
      ],
    },
    options: {
      responsive: true,
      legend: {
        display: false,
      },
    },
  }

  const barsCtx = document.getElementById('bar')
  window.myBar = new Chart(barsCtx, barConfig)

  </script>
@endpush