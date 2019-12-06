<template>
  <div
    ref="content"
    class="results">
    <h1 class="results__main-title">Результаты теста</h1>

    <h2 class="results__title">
      Мои стили руководства
    </h2>

    <BarChart
      id="result_1"
      class="bar-chart"
      :chartData="Object.values(resultsList)"
      :chartLabels="this.chartLabels"
      :colors="colorsMain"/>

    <table border="1" class="table" cellspacing="0">
      <tr>
        <th v-for="(item, i) in chartLabels" :key="i">
          {{ item }}
        </th>
      </tr>
      <tr>
        <td v-for="(item, i) in Object.values(resultsList)" :key="i">
          {{ item }}
        </td>
      </tr>
    </table>
    <br>
    <br>

    <h2 class="results__title">
      Индивидуальный консалтинг
    </h2>
    <BarChart
      id="result_3"
      class="bar-chart"
      :chartData="Object.values(resultsStat)"
      :chartLabels="this.chartLabelsBlack"
      :colors="colorsGray"/>
    <br><br>

    <h2 class="results__title">
      Индекс несоответствия стилей руководства
    </h2>

    <BarChart
      id="result_2"
      class="bar-chart"
      :chartData="Object.values(disbalanceResults)"
      :chartLabels="this.chartLabels"
      :colors="colorsMain" />

    <table border="1" class="table" cellspacing="0">
      <tr>
        <th v-for="(item, i) in chartLabels" :key="i">
          {{ item }}
        </th>
      </tr>
      <tr>
        <td v-for="(item, i) in Object.values(disbalanceResults)" :key="i">
          {{ item }}
        </td>
      </tr>
    </table>
    <br>
    <br>

    <button
      class="print"
      @click="print"
    >
      Распечатать pdf
    </button>
    <div class="results-footer">
      <div>
        <img src="../assets/img/wiser-logo.svg" alt="">
      </div>

      <a href="mailto:office@wiser360.net" class="results-footer__email-link">office@wiser360.net</a>

      <div class="results-footer__phone">
        <a href="tel:0800 218 428">0800 218 428</a> (бесплатные звонки по Украине)
      </div>

      <div class="results-footer__rights">
        © 2019 Wiser 360 Все права защищены. Копирование запрещено
      </div>
    </div>
  </div>

</template>

<script>
  // import jsPDF from 'jspdf';
  // import html2canvas from "html2canvas";

  import BarChart from '@/components/BarChart';
  export default {
    name: 'Results',
    components: { BarChart },
    props: [
      'resultsList',
      'disbalanceResults',
      'resultsStat'
    ],
    data: () => {
      return {
        chartLabels: ['Инструктор', 'Учитель', 'Консультант', 'Партнер'],
        chartLabelsBlack: ['Плохо', 'Терпимо', 'Хорошо', 'Отлично'],
        chartData: {},
        result_1: '',
        result_2: '',
        result_3: '',
        colorsMain: ['#ed1d24', '#f47321', '#e9da17', '#84c441'],
        colorsGray: ['#040707', '#3e3e3d', '#6d6e6e', '#9e9f9f']
      }
    },
    // mounted() {
    //   setTimeout(this.download, 2000);
    // },
    methods: {
      print() {
        window.print();
      },
      saveCanvasAsImg() {
        let result_1 = document.getElementsByClassName('chartjs-render-monitor')[0];
        let result_2 = document.getElementsByClassName('chartjs-render-monitor')[1];
        let result_3 = document.getElementsByClassName('chartjs-render-monitor')[2];

        this.result_1 = result_1.toDataURL("image/png");
        this.result_2 = result_2.toDataURL("image/png");
        this.result_3 = result_3.toDataURL("image/png");

        this.$emit('saveCanvasImgs', {
          result_1: this.result_1,
          result_2: this.result_2,
          result_3: this.result_3
        })
      },
      // download() {
      //   const doc = new jsPDF();
      //   const contentHtml = this.$refs.content;
      //   // eslint-disable-next-line
      //   console.log(contentHtml);
      //   doc.fromHTML(contentHtml.html, 15, 15, {
      //     width: 800
      //   });
      //   doc.save("sample.pdf");
      // },
      // downloadWithCSS() {
      //   const doc = new jsPDF();
      //   /** WITH CSS */
      //   var canvasElement = document.createElement('canvas');
      //   html2canvas(this.$refs.content, { canvas: canvasElement
      //   }).then(function (canvas) {
      //     console.log(canvas);
      //     const img = canvas.toDataURL("image/jpeg", 0.8);
      //     doc.addImage(img,'JPEG',0,0,600,800);
      //     doc.save("test_results.pdf");
      //   });
      // },
    }
  }
</script>

<style scoped lang="less">
  .results {
    padding: 40px 10px;
    box-shadow: 0 5.5px 5px rgba(0, 0, 0, 0.24), 0 9px 18px rgba(0, 0, 0, 0.18);
    max-width: 640px;
    margin: 0 auto;
    min-height: 100vh;
    overflow-x: auto;

    &__main-title {
      font-size: 18px;
      margin-bottom: 10px;
      text-align: center;
    }

    &__descr {
      margin-bottom: 27px;
      font-weight: 300;
      font-size: 12px;
      line-height: 1.2em;
      color: #000000;
    }

    &__title {
      text-align: center;
      margin-bottom: 15px;
      font-size: 16px;
      font-weight: 600;
    }
  }

  .table {
    display: none;
    margin: 0 auto;

    th, td {
      padding: 4px 6px;
    }
  }

  .print {
    width: 255px;
    height: 40px;
    display: block;
    margin: 0 auto;
    border: none;
    background: #F12E45;
    color: #ffffff;
    font-size: 17px;
    cursor: pointer;
    text-transform: uppercase;

    img {
      width: 152px;
    }

    &:hover {
      background: lighten(#F12E45, 3%);
    }

    @media print {
      &, & * {
        display: none !important;
      }
    }
  }

  .bar-chart {
    height: 300px;
  }

  .results-footer {
    text-align: center;
    padding: 70px 10px 20px;

    img {
      width: 147px;
      margin-bottom: 22px;
    }

    &__email-link {
      font-weight: 300;
      font-size: 14px;
      text-align: center;
      text-decoration: underline;
      color: #0094FF;
    }

    &__phone {
      padding-top: 10px;
      font-weight: 300;
      font-size: 14px;
      color: #000;
      margin-bottom: 30px;

      a {
        font-weight: 300;
        font-size: 14px;
        color: #0094FF;
        text-decoration: none;
      }
    }

    &__rights {
      padding-bottom: 21px;
      font-weight: 300;
      font-size: 14px;
      color: #000;
    }
  }

</style>