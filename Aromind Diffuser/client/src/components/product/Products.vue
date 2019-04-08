<template>
    <div class="row">
        <!-- <my-product v-for="product in products" @delete-product="deleteProduct(product)" :authenticatedUser="authenticatedUser" :product="product"></my-product> -->
        <my-product v-for="product in products" @delete-product="deleteProduct(product)" :authenticatedUser="authenticatedUser" :product="product"></my-product>
    </div>
</template>

<script>
import Product from './Product.vue'
import swal from 'sweetalert'

export default {
    data () {
        return {
            products: []
        }
    },

    components: {
        'my-product': Product
    },

    created () {
        axios.get('/api/products')
        .then(response => {
            this.products = response.body
        })
    },

    methods: {
        deleteProduct (product) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this product!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function() {
                axios.delete('/api/products/' + product.id)
                .then(response => {
                    let index = this.products.indexOf(product)

                    this.products.splice(index, 1)

                    swal("Deleted!", "Your product has been deleted", "success");
                })
            }.bind(this)
            );
        }
    }
}
</script>
