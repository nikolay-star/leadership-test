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
    <div class="timer">
      {{ time }}
    </div>
  </div>
</template>

<script>
  const secondsInterval = 91;

  import dataItems from '../assets/questions.json'
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
        resultsStat: {
          P: 0,
          T: 0,
          H: 0,
          O: 0
        },
        time: '00:00',
        seconds: secondsInterval,
        interval: null
      }
    },
    created () {
      this.initNextQuestion()
    },
    methods: {
      initNextQuestion () {
        // if (dataItems.length <= this.currentTestNumber) {
        if (2 <= this.currentTestNumber) {
          this.$emit('testFinished', {
            results: this.results,
            disbalanceResults: this.resultsDisbalance,
            resultsStat: this.resultsStat
          })
          return
        }

        this.currentQuestion = dataItems[this.currentTestNumber].question;
        this.currentAnswers = dataItems[this.currentTestNumber].answers;
        this.countDown();
      },
      onOptionChanged (item) {
        this.isAnswerEmpty = false
        this.selectedItem = item
      },
      onNextQuestion () {
        if (!this.isAnswerEmpty || this.seconds <= 0) {
          clearInterval(this.interval);
          this.setResults();
          this.setDisbalanceResults();
          this.setStatResults();
          this.currentTestNumber++;
          this.isAnswerEmpty = true;
          this.selectedItem = null;
          this.seconds = secondsInterval;
          this.initNextQuestion();
        }
      },
      setResults () {
        if (this.selectedItem && this.selectedItem.result_1) {
          this.results[this.selectedItem.result_1] = this.results[this.selectedItem.result_1] + 1
        }
      },
      setDisbalanceResults () {
        if (this.selectedItem && this.selectedItem.result_1 && this.selectedItem.result_2 === 1) {
          this.resultsDisbalance[this.selectedItem.result_1] = this.resultsDisbalance[this.selectedItem.result_1] + 1
        }
      },
      setStatResults () {
        if (this.selectedItem && this.selectedItem.result_1) {
          this.resultsStat[this.selectedItem.result_3] = this.resultsStat[this.selectedItem.result_3] + 1
        }
      },
      countDown () {
        let h, m, s;

        this.interval = setInterval(() => {
          if (this.seconds > 0) {
            this.seconds--;
            h = this.seconds / 3600 ^ 0;
            m = (this.seconds - h * 3600) / 60 ^ 0;
            s = this.seconds - h * 3600 - m * 60;
            this.time = (m < 10 ? '0' + m : m) + ':' + (s < 10 ? '0' + s : s);
          } else {
            this.onNextQuestion();
          }
        }, 1000)
      }
    }
  }
</script>

<style scoped lang="less">
  .test-list {
    padding: 40px 50px 70px 0;
    box-shadow: 0 5.5px 5px rgba(0, 0, 0, 0.24), 0 9px 18px rgba(0, 0, 0, 0.18);
    max-width: 500px;
    margin: 0 auto;
    min-height: 100vh;
    position: relative;

    &__next {
      border: none;
      width: 32px;
      height: 84px;
      position: absolute;
      z-index: 20;
      background: #F12E45 url("../assets/img/i-next.svg") no-repeat center / 38px;
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

  .timer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(255,255,255,0.7);
    text-align: center;
    padding: 12px;
    font-weight: bold;
    font-size: 31px;
    color: #6D6D6D;

    @media (min-width: 640px) {
      background: transparent;
    }
  }
</style>