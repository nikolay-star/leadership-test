<template>
  <div class="welcome">
    <div class="welcome__top">
      <div class="welcome__top-inner">
        <img src="../assets/img/main_logo.svg" class="welcome__logo" alt="">

        <h1 class="welcome__title">
          АНАЛИЗ СТИЛЕЙ РУКОВОДСТВА. ТЕСТ
        </h1>
      </div>
    </div>
    <div class="welcome__bottom">
      <form action="" class="form" @submit.prevent="onSubmit">
        <div class="form__inline">
          <div class="form-control">
            <label class="form-control__label form-control__label_name">
              <input type="text" class="form-control__input" required placeholder="Имя">
            </label>
          </div>
          <div class="form-control">
            <label class="form-control__label form-control__label_email">
              <input type="email" class="form-control__input" required placeholder="E-mail">
            </label>
          </div>
          <div class="form-control">
            <label class="form-control__label form-control__label_post">
              <input type="text" class="form-control__input" required placeholder="Должность">
            </label>
          </div>
        </div>
        <div class="form__btns">
          <button class="form__btn" type="submit">
            <span class="form__btn-text">
              Начать тест
            </span>
          </button>
        </div>
      </form>

      <div class="welcome__rights">
        © 2019 Wiser 360 Все права защищены. Копирование запрещено
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Welcome',
  methods: {
    onSubmit() {
      this.$emit('submitForm');
    }
  }
}
</script>

<style scoped lang="less">
  .welcome {
    &__top {
      min-height: 332px;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      background: #f8f8f8;

      @media (min-height: 700px) {
        min-height: 50vh;
      }

      &-inner {
        text-align: center;
      }
    }

    &__logo {
      height: 135px;
      margin-bottom: 35px;
    }

    &__title {
      font-weight: bold;
      font-size: 17px;
      line-height: 21px;
      text-align: center;
      color: #000000;
      text-transform: uppercase;
    }

    &__bottom {
      min-height: 332px;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      position: relative;

      @media (min-height: 700px) {
        min-height: 50vh;
      }
    }

    &__rights {
      position: absolute;
      bottom: 21px;
      width: 100%;
      text-align: center;
      font-weight: 300;
      font-size: 11px;
      line-height: 13px;
      color: #000000;
    }
  }

  .form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    &__inline {
      display: flex;
      flex-direction: row;
      margin-bottom: 57px;
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

  .form-control {
    &+& {
      margin-left: 21px;
    }

    &__label {
      display: flex;
      align-items: center;

      &:before {
        display: block;
        max-width: 20px;
        max-height: 20px;
        margin-right: 11px;
      }

      &_name {
        &:before {
          content: url("../assets/img/i-name.svg");
        }
      }

      &_email {
        &:before {
          content: url("../assets/img/i-name.svg");
        }
      }

      &_post {
        &:before {
          content: url("../assets/img/i-position.svg");
        }
      }
    }

    &__input {
      width: 167px;
      border: none;
      border-bottom: 1px solid rgba(0, 0, 0, 0.36);
      outline: none;
      padding: 8px 0;
      line-height: 1;
      font-size: 14px;
      color: #000000;
    }
  }
</style>
