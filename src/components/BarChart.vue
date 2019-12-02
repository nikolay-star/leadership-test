<script>
  import { Bar } from 'vue-chartjs'

  export default {
    name: 'BarChart',
    extends: Bar,
    props: {
      chartdata: {
        type: Object,
        default: null
      }
    },
    mounted () {
      // eslint-disable-next-line
      console.log(this.chartData);
      this.renderChart(this.chartdata)
    }
  }
</script>