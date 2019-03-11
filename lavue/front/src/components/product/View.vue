<template>
    <div>
        <div class="container" id="view">
            <h2>Shop-Aroma Oils</h2>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img :src="'http://localhost:8000/' + product.image" alt="" style="width: 60%;" class="card-img-top rounded mx-auto d-block">
                            <div class="form-group">
                                <label for="">Name</label>
                                <p>{{ product.name }}</p>
                                
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <p>{{ product.price }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <div>{{ product.description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    created () {
        this.$http.get('api/products/' + this.$route.params.product)
        .then(response => {
            this.product = response.body
        })
    },

    data () {
        return {
            product: {}
        }
    },

}
</script>

<style>
    #view {
        margin-top: 6%;
    }
</style>