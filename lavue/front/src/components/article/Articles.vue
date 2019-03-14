<template>
    <div>
        <table class="table table-hover text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">-</th>
                </tr>
                <tr v-for="article in articles" @delete-article="deleteArticle(article)" :authenticatedUser="authenticatedUser" :article="article">
                    <th scope="row">{{ article.id }}</th>
                    <td>{{ article.title }}</td>
                    <td>{{ article.description }}</td>
                    <td>{{ article.created_at }}</td>
                    <td>
                        <div v-if="article.user_id == authenticatedUser.id">
                            <a href="#" class="btn btn-danger" role="button" @click="$emit('delete-article')" style="margin-left: 8%;width: 40%;">
                                    Delete
                                </a>
                            <router-link class="btn btn-outline-info" :to="'/articles/' + article.id + '/edit'" style="width: 40%;">
                                    Edit
                            </router-link>
                        </div>
                    </td>
                </tr>
        </table>
    </div>
</template>

<script>
//import Article from './Article.vue'
import swal from 'sweetalert'

export default {
    data () {
        return {
            articles: []
        }
    },

    //props: ['article', 'authenticatedUser'],

    computed: {
        authenticatedUser () {
            return this.$auth.getAuthenticatedUser()
        }
    },

    /* components: {
        'my-article': Article
    }, */

    created () {
        this.$http.get('api/articles')
        .then(response => {
            this.articles = response.body
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
                this.$http.delete('api/articles/' + article.id)
                .then(response => {
                    let index = this.articles.indexOf(article)

                    this.articles.splice(index, 1)

                    swal("Deleted!", "Your article has been deleted", "success");
                })
            }.bind(this)
            );
        }
    }
}
</script>