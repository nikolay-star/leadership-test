<template>
  <div class="results">

    <h2 class="results__title">
      Таблица 1. Мои стили руководства
    </h2>

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
      Таблица 2. Индекс несоответствия стилей руководства
    </h2>
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
      Распечатать результат
    </button>
  </div>
</template>

<script>
  export default {
    name: 'Results',
    props: [
      'resultsList',
      'disbalanceResults'
    ],
    data: () => {
      return {
        chartLabels: ['Инструктор', 'Учитель', 'Консультант', 'Партнер'],
        chartData: {}
      }
    },
    methods: {
      print() {
        window.print();
      }
    }
  }
</script>

<style scoped lang="less">
  .results {
    padding: 40px 50px 40px 0;
    box-shadow: 0 5.5px 5px rgba(0, 0, 0, 0.24), 0 9px 18px rgba(0, 0, 0, 0.18);
    max-width: 640px;
    margin: 0 auto;
    min-height: 100vh;
    overflow-x: auto;

    &__title {
      text-align: center;
      margin-bottom: 20px;
      font-size: 17px;
      font-weight: 600;
    }
  }

  .table {
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
    font-size: 20px;
    cursor: pointer;

    &:hover {
      background: lighten(#F12E45, 3%);
    }

    @media print {
      &, & * {
        display: none !important;
      }
    }
  }
</style>