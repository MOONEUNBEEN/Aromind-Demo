<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="opacity: 0.9;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                  <router-link class="navbar-brand" :to="'/'">
                      <img src="/src/img/logo1-7.png" width="150" class="d-inline-block align-top" alt="">
                  </router-link>
                </li>
                <li class="nav-item active">
                    <router-link class="nav-link" to="/" style="color: black;">
                      <a>Home</a>
                    </router-link>
                </li>
                <li class="nav-item active">
                    <router-link class="nav-link" to="/login" v-if="! isAuth" style="color: black;">
                      <a>Login</a>
                    </router-link>
                </li>
                <li class="nav-item active">
                    <router-link class="nav-link" to="/register" v-if="! isAuth" style="color: black;">
                      <a>Register</a>
                    </router-link>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;">
                    Shop
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Aromind Diffuser</a>
                    <router-link class="dropdown-item" to="/shop">
                      <a>Aroma Oils</a>
                    </router-link>
                  </div>
                </li>
                <li class="nav-item active">
                    <router-link class="nav-link" to="/community" v-if="isAuth" style="color: black;">
                      <a>Community</a>
                    </router-link>
                </li>
                <li class="nav-item active">
                    <router-link class="nav-link" to="/logout" v-if="isAuth" style="color: black;">
                      <a>Logout</a>
                    </router-link>
                </li>
            </ul>
        </div>
    </nav>
  </div>
</template>

<script>
export default {
    data () {
      return {
        isAuth: null
      }
    },

    created () {
      this.isAuth = this.$auth.isAuthenticated()

      this.setAuthenticatedUser()
    },

    methods: {
      setAuthenticatedUser () {
        this.$http.get('api/user')
        .then(response => {
          this.$auth.setAuthenticatedUser(response.body)

          console.log(this.$auth.getAuthenticatedUser())
        })
      }
    }
}
</script>

<style>
    .router-link-active {
      background-color: blue;
      color: white;
    }

    .dropdown-item:visited {
      background-color: white;
      color: black;
    }

    .dropdown-item:link {
      background-color: white;
      color: black;
    }
</style>