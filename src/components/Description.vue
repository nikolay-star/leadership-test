<template>
  <div class="description">
    <img src="../assets/img/main_logo.svg" class="description__logo" alt="">

    <h2 class="description__title">
      АНАЛИЗ СТИЛЕЙ РУКОВОДСТВА. ТЕСТ
    </h2>

    <p class="description__text">
      Цель теста - помочь Вам увидеть, как Вы склонны руководить людьми.
      Мы уверены, что Вы знаете, как нужно поступить в 20 нижеприведенных ситуациях, но в жизни, в условиях насыщенного графика, под давлением трудностей и бюджетных ограничений, мы поступаем так, как привыкли.
      Чтобы повысить мастерство руководителя, пожалуйста, выбирайте тот вариант действий, который Вы выбираете в подобных ситуациях в реальной жизни.
      <br><br>
      <strong>На каждую ситуацию у Вас будет 1,5 минуты.</strong>
    </p>

    <button class="description__btn" @click="$emit('testStarted')">
      <span class="description__btn-text">
        Начать тест
      </span>
    </button>
  </div>
</template>

<script>
  export default {
    name: 'Description'
  }
</script>

<style scoped lang="less">
  .description {
    text-align: center;
    max-width: 500px;
    margin: 0 auto;
    padding: 36px 30px;

    @media (max-width: 500px) {
      padding: 30px 20px;
    }

    &__logo {
      height: 135px;
      margin-bottom: 57px;
    }

    &__title {
      font-weight: bold;
      font-size: 20px;
      line-height: 24px;
      color: #000000;
      margin-bottom: 26px;

      @media (max-width: 500px) {
        font-size: 17px;
        line-height: 20px;
      }
    }

    &__text {
      font-size: 13px;
      line-height: 17px;
      color: #000000;
      max-width: 90%;
      margin: 0 auto 80px;

      @media (max-width: 500px) {
        font-size: 12px;
        line-height: 15px;
      }

      strong {
        font-weight: 600;
      }
    }

    &__btn {
      width: 255px;
      height: 48px;
      padding-top: 2px;
      border: none;
      background: #F12E45;
      cursor: pointer;

      &:hover {
        background: lighten(#F12E45, 3%);
      }

      &-text {
        display: none;
      }

      &:before {
        content: url("../assets/img/start_test.svg");
        height: 20px;
      }
    }
  }
</style>