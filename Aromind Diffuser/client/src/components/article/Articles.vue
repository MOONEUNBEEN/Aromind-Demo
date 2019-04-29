<template>
    <div class="row">
      <my-article id="cards" v-for="article in articles" v-bind:key="article.id" @delete-article="deleteArticle(article)" @view-article="hoverArticle(article)" @out-article="hoverOutArticle(article)" :authenticatedUser="authenticatedUser" :article="article"></my-article>
    </div>
</template>

<script type="text/javascript">
  import Article from './Article.vue'
  import swal from 'sweetalert'
  import axios from 'axios'

  export default {
    data () {
      return {
        articles: [],
        active: false,
      }
    },

    computed: {
      authenticatedUser () {
        return this.$auth.getAuthenticatedUser()
      }
    },

    components: {
      'my-article': Article
    },

    created () {
      axios.get('http://localhost:8000/api/articles')
      .then(response => {
        this.articles = response.data
        this.articles.forEach((article) => {
          this.$set(article, 'hover', false)
        })
      })
    },

    methods: {
      deleteArticle (article) {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this article!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function() {
          axios.delete('http://localhost:8000/api/articles/' + article.id)
          .then(response => {
            let index = this.articles.indexOf(article)

            this.articles.splice(index, 1)

            swal("Deleted!", "Your article has been deleted", "success");
          })
        }.bind(this)
        );
      },

      hoverArticle(article) {
        console.log(article.id)
        var hoverr = document.getElementById(article.id)
        //hoverr.style.backgroundColor = 'black'
        hoverr.style.opacity = '0.6'
      },

      hoverOutArticle(article) {
        console.log(article.id)
        var hoverr = document.getElementById(article.id)
        hoverr.style.opacity = '0'
      }
    }
  }
</script>
