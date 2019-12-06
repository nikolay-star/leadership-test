<template>
  <div class="test-item">
    <h2 class="test-item__title">
      <span class="test-item__title-text">
        АНАЛИЗ СТИЛЕЙ РУКОВОДСТВА. ТЕСТ
      </span>
      <span class="test-item__title-number">
        {{ testItemNumber + 1 }}
      </span>
    </h2>

    <div class="test-item__question">
      {{ question }}
    </div>

    <ul class="test-item__answers">
      <li
        v-for="(item, index) in answersList"
        class="test-item__answer"
        :key="index">

        <input
          v-model="selectedRadio"
          :id="index"
          :name="testItemNumber"
          :value="item"
          type="radio"
          class="test-item__radio"
          @change="onRadioChanged"
        >

        <label class="test-item__label" :for="index">
          <span>
            {{ item.text }}
          </span>
        </label>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    name: 'TestItem',
    data: () => {
      return {
        selectedRadio: ''
      }
    },
    props: [
      'testItemNumber',
      'question',
      'answersList'
    ],
    methods: {
      onRadioChanged() {
        // eslint-disable-next-line
        // console.log(this.selectedRadio);
        this.$emit('optionChanged', this.selectedRadio);
      }
    }
  }
</script>

<style scoped lang="less">
  .test-item {
    width: 100%;

    &__title {
      margin-bottom: 33px;
      padding-left: 15px;

      &-text {
        display: inline-block;
        font-weight: bold;
        font-size: 15px;
        line-height: 20px;
        color: #000000;

        @media (max-width: 500px) {
          font-size: 13px;
          line-height: 18px;
        }
      }

      &-number {
        font-weight: 900;
        font-size: 64px;
        color: #F12E45;

        @media (max-width: 500px) {
          font-size: 36px;
          line-height: 1em;
        }
      }
    }

    &__question {
      padding-bottom: 32px;
      border-bottom: 1px solid #C4C4C4;
      font-weight: 500;
      font-size: 11px;
      line-height: 14px;
      color: #000000;
      padding-left: 34px;

      @media (min-width: 500px) {
        font-size: 13px;
        line-height: 17px;
      }
    }

    &__answers {
      padding: 30px;
      list-style: none;
    }

    &__answer {
      padding-bottom: 30px;
    }

    &__radio {
      position: absolute;
      opacity: 0;
      left: -9999px;
    }

    &__label {
      display: flex;

      &:before {
        content: '';
        margin-right: 20px;
        flex: 18px 0 0;
        height: 18px;
        border: 2px solid rgba(0, 0, 0, 0.54);
        border-radius: 2px;
      }
    }

    input:checked ~ &__label {
      &:before {
        border-color: #F12E45;
        background: url("../assets/img/i-checked.svg") no-repeat center / 26px;
      }
    }

    &__answer {
      font-size: 11px;
      line-height: 13px;
      color: #000000;

      @media (min-width: 500px) {
        font-size: 13px;
        line-height: 17px;
      }
    }
  }
</style>