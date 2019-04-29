<template>
  <div class="col-md-4" style="margin-bottom: 1%;">
    <b-card no-body>
      <router-link class="view" :to="'/articles/' + article.id">
        <img :src="'http://localhost:8000/' + article.image" alt="" style="width: 87%; padding-top: 15%; margin-bottom: 13%;" class="card-img-top rounded mx-auto d-block">
        <div class="overlay" :id="article.id" @mouseover="$emit('view-article')" @mouseleave="$emit('out-article')">
          <div class="text">{{ article.title }}</div>
        </div>
      </router-link>
      <b-list-group flush>
        <b-list-group-item>
          <a href="#" class="btn btn-danger" role="button" @click="$emit('delete-article')" style="margin-left: 8%;width: 40%;">
            Delete
          </a>
          <router-link class="btn btn-outline-info" :to="'/article/' + article.id + '/edit'" style="width: 40%;">
            Edit
          </router-link>
        </b-list-group-item>
      </b-list-group>
    </b-card>
  </div>
</template>

<script>
  export default {
    props: ['article', 'authenticatedUser'],
  }
</script>

<style>
  .view {
    color: black;
  }

  .view:visited {
    color: black;
    text-decoration: none;
  }

  .view:hover {
    color: rgb(234,119,142);
    text-decoration: none;
  }

  #font {
    font-family: 'Overpass', sans-serif;
  }

  .overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;
    background-color: black;
  }

  /* .container:hover .overlay {
    opacity: 0.6;
  } */

  .text {
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
  }

</style>
