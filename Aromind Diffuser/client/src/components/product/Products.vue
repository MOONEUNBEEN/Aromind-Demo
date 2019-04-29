<template>
  <div class="row">
    <!-- <my-product v-for="product in products" @delete-product="deleteProduct(product)" :authenticatedUser="authenticatedUser" :product="product"></my-product> -->
    <my-product v-for="product in products" v-bind:key="product.id" @delete-product="deleteProduct(product)" :authenticatedUser="authenticatedUser" :product="product"></my-product>
  </div>
</template>

<script>
  import Product from './Product.vue'
  import swal from 'sweetalert'
  import axios from 'axios'

  export default {
    data () {
      return {
        products: []
      }
    },

    computed: {
      authenticatedUser () {
        return this.$auth.getAuthenticatedUser()
      }
    },

    components: {
      'my-product': Product
    },
    created () {
      axios.get('http://localhost:8000/api/products')
      .then(response => {
        //this.products = response.body
        //this.products = response
        this.products = response.data
        //console.log(response)
        console.log(response.data)
        //console.log(response.body)
      })
      .catch(err => {
        console.log(err)
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
          axios.delete('http://localhost:8000/api/products/' + product.id)
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
