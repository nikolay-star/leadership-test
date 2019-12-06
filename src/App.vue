<template>
  <div id="app">
    <Welcome
      v-if="!isRegistered"
      @submitForm="onSubmitForm"/>

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
      :resultsStat="resultsStat"
      @saveCanvasImgs="onSaveImgs"
    />
  </div>
</template>

<script>
import { post } from 'axios';
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
      disbalanceResults: {},
      resultsStat: {},
      userData: {},
      resultImgs: {}
    }
  },
  components: {
    Results,
    TestList,
    Description,
    Welcome
  },
  methods: {
    onSubmitForm(formData) {
      this.userData = formData;
      this.isRegistered = true;
    },
    async onSaveImgs(imgs) {
      this.resultImgs = imgs;

      let bodyFormData = new FormData();
      let bodyData = {
        ...this.userData,
        ...this.resultImgs
      }

      for (let item in bodyData) {
        bodyFormData.append(item, bodyData[item])
      }

      await post('/test/sendmessage.php', bodyFormData);
    },
    onTestFinished(res) {
      this.results = res.results;
      this.disbalanceResults = res.disbalanceResults;
      this.resultsStat = res.resultsStat;
      this.isFinished = true;
    }
  }
}
</script>

