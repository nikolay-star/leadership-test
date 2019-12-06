<script>
  import { Bar } from 'vue-chartjs'

  const options = {
    legend: {
      display: false
    },
    maintainAspectRatio: false,
    height: 100,
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          stepSize: 1
        }
      }]
    },
    responsive: true
  };

  export default {
    name: 'BarChart',
    extends: Bar,
    props: {
      chartData: {
        type: Array
      },
      chartLabels: {
        type: Array
      },
      colors: {
        type: Array
      }
    },
    mounted () {
      this.renderChart({
        labels: this.chartLabels,
        datasets: [
          {
            data: this.chartData,
            backgroundColor: this.colors,
          }
        ],
      },
      options)
    }
  }
</script>