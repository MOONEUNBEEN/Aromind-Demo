<template>
    <div>
        <table class="table table-hover text-center">
            <!-- <tr>
                <div v-if="article.user_id == authenticatedUser.id">
                    <a href="#" class="btn btn-danger" role="button" @click="$emit('delete-article')" style="margin-left: 8%;width: 16%;">
                        Delete
                    </a>
                    <router-link class="btn btn-outline-info" :to="'/articles/' + article.id + '/edit'" style="width: 16%;">
                        Edit
                    </router-link>
                </div>
            </tr> -->
        </table>
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
</style>