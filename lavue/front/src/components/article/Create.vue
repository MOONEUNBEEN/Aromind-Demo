<template>
    <div>
        <div class="container" id="createProduct">
            <h2>Create Article</h2>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form @submit.prevent="create">
                                <!-- <div class="form-group">
                                    <label for="">Upload Image</label>
                                    <input type="file" class="form-control-file" @change="imageChanged">
                                </div> -->
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input name="title" type="text" class="form-control" v-validate="'required'" v-model="article.title">
                                    <div class="help-block alert alert-danger" v-show="errors.has('title')">
                                        {{ errors.first('title') }}
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="">Writer</label>
                                    <input name="writer" type="text" class="form-control" v-validate="'required'" v-model="article.user_id">
                                    <div class="help-block alert alert-danger" v-show="errors.has('user_id')">
                                        {{ errors.first('user_id') }}
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control" v-model="article.description"></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary1 btn-block pull-right" @click="create" value="Create">
                            </form>
                        </div>
                        <br>
                        <div>
                            <router-link class="view btn btn-outline-secondary1" id="list" :to="'/community/'">List</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            article: {
                title: '',
                description: ''
            }
        }
    },

    methods: {
        /* imageChanged (e) {
            console.log(e.target.files[0])
            var fileReader = new FileReader()

            fileReader.readAsDataURL(e.target.files[0])

            fileReader.onload = (e) => {
                this.product.image = e.target.result
            }
        }, */

        create () {
            /* this.$validator.updateDictionary({
                'al': {
                    attributes: {
                        name: 'emri'
                    }
                }
            })

            this.$validator.setLocale('al')

            this.$validator.validateAll().then(() => {
                this.$http.post('api/articles', this.article)
                .then(response => {
                    this.$router.push('/community')
                })
            }) */

            this.$http.post('api/articles', this.article)
            .then(response => {
                this.$router.push('/community')
            })
        }
    }
}
</script>

<style>
    #createProduct {
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