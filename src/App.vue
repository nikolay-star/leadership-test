<template>
  <div id="app">
    <Welcome
      v-if="!isRegistered"
      @submitForm="onSubmitForm" />

    <Description
      v-if="isRegistered && !isStarted"
      @testStarted="isStarted = true" />

    <TestList
      v-if="isRegistered && isStarted && !isFinished"
      @testFinished="onTestFinished"
    />

    <Results
      v-if="isFinished"
      :resultsList="results"
      :disbalanceResults="disbalanceResults"
    />
  </div>
</template>

<script>
import './assets/css/main.css';
import Welcome from './components/Welcome.vue'
import Description from '@/components/Description'
import TestList from '@/components/TestList'
import Results from '@/components/Results'

export default {
  name: 'app',
  data: () => {
    return {
      isRegistered: false,
      isStarted: false,
      isFinished: false,
      results: {},
      disbalanceResults: {}
    }
  },
  components: {
    Results,
    TestList,
    Description,
    Welcome
  },
  methods: {
    onSubmitForm() {
      // TODO: add ajax
      this.isRegistered = true;
    },
    onTestFinished(res) {
      this.results = res.results;
      this.disbalanceResults = res.disbalanceResults;
      this.isFinished = true;
    }
  }
}
</script>

