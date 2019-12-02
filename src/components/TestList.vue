<template>
  <div class="test-list">
    <TestItem
      :testItemNumber="currentTestNumber"
      :question="currentQuestion"
      :answersList="currentAnswers"
      @optionChanged="onOptionChanged"
    />
    <button
      :class="isAnswerEmpty ? 'disabled' : ''"
      class="test-list__next"
      @click="onNextQuestion"
    >
      <span>Дальше</span>
    </button>
    <div class="timer"></div>
  </div>
</template>

<script>
  import dataItems from '../assets/questions.json';
  import TestItem from '@/components/TestItem'

  export default {
    name: 'TestList',
    components: { TestItem },
    data: () => {
      return {
        currentTestNumber: 0,
        currentQuestion: '',
        currentAnswers: [],
        isAnswerEmpty: true,
        selectedItem: null,
        results: {
          I: 0,
          U: 0,
          K: 0,
          P: 0
        },
        resultsDisbalance: {
          I: 0,
          U: 0,
          K: 0,
          P: 0
        },
      }
    },
    created() {
      this.initNextQuestion();
    },
    methods: {
      initNextQuestion() {
        if (dataItems.length <= this.currentTestNumber) {
        // if (1 <= this.currentTestNumber) {
          this.$emit('testFinished', {
            results: this.results,
            disbalanceResults: this.resultsDisbalance
          });
          return;
        }

        this.currentQuestion = dataItems[this.currentTestNumber].question;
        this.currentAnswers = dataItems[this.currentTestNumber].answers;
      },
      onOptionChanged(item) {
        this.isAnswerEmpty = false;
        this.selectedItem = item;
      },
      onNextQuestion() {
        if (!this.isAnswerEmpty) {
          this.setResults();
          this.setDisbalanceResults();
          this.currentTestNumber++;
          this.isAnswerEmpty = true;
          this.initNextQuestion();
        }
      },
      setResults() {
        if (this.selectedItem && this.selectedItem.result_1) {
          this.results[this.selectedItem.result_1] = this.results[this.selectedItem.result_1] + 1;
        }
      },
      setDisbalanceResults() {
        if (this.selectedItem && this.selectedItem.result_1 && this.selectedItem.result_2 === 1) {
          this.resultsDisbalance[this.selectedItem.result_1] = this.resultsDisbalance[this.selectedItem.result_1] + 1;
        }
      }
    }
  }
</script>

<style scoped lang="less">
  .test-list {
    padding: 40px 50px 40px 0;
    box-shadow: 0 5.5px 5px rgba(0, 0, 0, 0.24), 0 9px 18px rgba(0, 0, 0, 0.18);
    max-width: 480px;
    margin: 0 auto;
    min-height: 100vh;
    position: relative;

    &__next {
      border: none;
      width: 21px;
      height: 56px;
      position: absolute;
      z-index: 20;
      background: #F12E45 url("../assets/img/i-next.svg") no-repeat center / 24px;
      cursor: pointer;
      right: 0;
      top: 50%;
      transform: translateY(-50%);

      &:hover {
        opacity: 0.8;
      }

      &.disabled {
        opacity: 0.2;
        cursor: not-allowed;
      }

      span {
        display: none;
      }
    }
  }
</style>