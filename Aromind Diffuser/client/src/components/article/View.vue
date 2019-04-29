<template>
  <div>
    <div class="container" id="view">
      <h2 id="font">Community-Custom Card</h2>
      <hr>
      <!-- <div>
        <h3>{{ article.title }}</h3>
        <div class="row" style="margin-left: 0%;">
          <h5><i class='fas fa-user'></i> {{ article.user_id }}</h5>
          <h6 style="margin-left: 1.3%; margin-top: 0.2%;">{{ article.created_at }}</h6>
          <div class="row" style="margin-left: 67%; margin-top: 0.2%;">
            <h6>조회수0 추천0 댓글0</h6>
          </div>
        </div>
      </div>
      <hr style="margin-top: 0.3%;"> -->
      <div class="row" style="margin-left: 0.3%; margin-top: 6%; margin-bottom: 6%;">
        <div>
          <b-media no-body class="align-items-center">
            <b-media-aside vertical-align="center" class="card" style="padding-top: 3%; padding-bottom: 3%; padding-left: 2%; padding-right: 2%;">
              <b-img :src="'http://localhost:8000/' + article.image" width="382" height="382" />
            </b-media-aside>

            <b-media-body class="ml-5">
              <h3 style="color: white;">dddddddddddddddddddddddddddddDDDdddd</h3>
              <div style="margin-bottom: 10%;">
                <h1>{{ article.title }}</h1>
                <!-- <h5><i class='fas fa-user'></i> {{ article.user_id }}</h5> -->
                <h5><i class="fas fa-hat-wizard"></i> {{ article.user_id }} ></h5>
              </div>
              <div>
                <div class="row">
                  <h6 class="col-sm-2">Rosemary</h6>
                  <div class="col-sm-10 pt-1">
                    <div class="progress" style="height: 25px;">
                      <div class="progress-bar" role="progressbar" style="width: 75%; background-color: rgb(218,89,107);" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                    <br>
                    <!-- <b-progress id="progress" height="25px" :value="value" variant="success" show-progress class="mb-2"></b-progress> -->
                  </div>
                </div>
                <div class="row">
                  <h6 class="col-sm-2">Lime</h6>
                  <div class="col-sm-10 pt-1">
                    <div class="progress" style="height: 25px;">
                      <div class="progress-bar" role="progressbar" style="width: 45%; background-color: rgb(63,97,130);" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                    </div>
                    <br>
                    <!-- <b-progress id="progress" height="25px" :value="value2" variant="warning" show-progress class="mb-2"></b-progress> -->
                  </div>
                </div>
                <div class="row">
                  <h6 class="col-sm-2">Geranium</h6>
                  <div class="col-sm-10 pt-1">
                    <div class="progress" style="height: 25px;">
                      <div class="progress-bar" role="progressbar" style="width: 90%; background-color: rgb(231,202,172); color: black;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                    </div>
                    <br>
                    <!-- <b-progress id="progress" height="25px" :value="value3" variant="danger" show-progress class="mb-2"></b-progress> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <h6 class="col-sm-2" style="margin-bottom: 15%;">Mood</h6>
                <div id="mood" style="width: 78.5%; height: 25px; margin-left: 2.4%;"></div>
              </div>
              <div class="row">
                <h6 class="col-sm-2">Mood</h6>
                <div id="mood1" style="width: 5%; height: 30px;"></div>
                <div id="mood2" style="width: 5%; height: 30px; margin-left: 2%;"></div>
                <div id="mood3" style="width: 5%; height: 30px; margin-left: 2%;"></div>
              </div>
              <div class="row" style="margin-top: 1%;">
                <h6 class="col-sm-2" style="margin-bottom: 15%;">Mood</h6>
                <div id="mood1-1" style="width: 5%; height: 30px;"></div>
                <div id="mood2-1" style="width: 5%; height: 30px; margin-left: 2%;"></div>
                <div id="mood3-1" style="width: 5%; height: 30px; margin-left: 2%;"></div>
              </div>
              <button class="btn btn-primary1" style="float: right; width: 23%; height: 42px;"><i class="fas fa-file-download"></i> Download</button>
            </b-media-body>
          </b-media>
        </div>
      </div>
      <hr>
      <div>
        <!-- <h5 style="float: left; color: rgb(234,119,142);">▶</h5> -->
        <h5 style="margin-top: 3%;">{{ article.description }}</h5>
      </div>
      <br>
      <div>
        <router-link class="view btn btn-outline-secondary1" id="list" :to="'/community/'">List</router-link>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    created () {
      axios.get('http://localhost:8000/api/articles/' + this.$route.params.article)
      .then(response => {
        this.article = response.data
      })
    },

    data () {
      return {
        article: {},
        value: 75,
        value2: 45,
        value3: 90
      }
    },

  }
</script>

<style>
  #view {
    margin-top: 6%;
  }

  #list {
    color: rgb(234,119,142);
    width: 11%;
    float: right;
  }

  #list:hover {
    color: white;
  }

  #font {
    font-family: 'Rubik', sans-serif;
  }

  #name {
    font-family: 'Rubik', sans-serif;
    font-weight: bold;
  }

  #menu {
    font-family: 'Noto Sans KR', sans-serif;
    font-weight: bold;
  }

  #progress {
    color: rgb(234,119,142);
  }

  #mood {
    background: rgb(0,251,56);
    background: linear-gradient(90deg, rgba(0,251,56,1) 0%, rgba(0,254,26,1) 33%, rgba(0,245,142,1) 67%, rgba(0,238,243,1) 100%);
  }

  #mood1 {
    background: #00fb38;
  }

  #mood2 {
    background: #00f58e;
  }

  #mood3 {
    background: #00eef3;
  }

  #mood1-1 {
    background: #00fb38;
    border-radius: 15%;
  }

  #mood2-1 {
    background: #00f58e;
    border-radius: 15%;
  }

  #mood3-1 {
    background: #00eef3;
    border-radius: 15%;
  }
</style>
