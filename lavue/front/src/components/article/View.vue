<template>
    <div>
        <div class="container" id="view">
            <h2>Community</h2>
            <hr>
            <br>
            <div class="row">
                
            </div>
            <div>
                <router-link class="view btn btn-outline-secondary1" id="list" :to="'/shop/'">List</router-link>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    created () {
        this.$http.get('api/articles/' + this.$route.params.article)
        .then(response => {
            this.article = response.body
        })
    },

    data () {
        return {
            article: {}
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
</style>