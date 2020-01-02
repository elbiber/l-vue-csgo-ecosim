<template>
  <div class="header" fixed="top">
    <div class="left-side">
    <h2 class="title">CSGO-ECOSIM</h2>
    <nav>
      <ul class="nav-links">
        <li v-for="link in links" v-bind:key="link.text">
          <router-link :to="link.route">{{ link.text }}</router-link>
        </li>
      </ul>
    </nav>
    </div>
    <div class="right-side">
      <router-link v-if="isLoggedIn" to="/signin"><button v-on:click="logout">Sign out</button></router-link>
      <router-link v-else to="/login"><button>Sign in</button></router-link>
      <router-link v-if="!isLoggedIn" to="/register"><button>Sign Up</button></router-link>
    </div>
  </div>

</template>


<script>

export default {
    data: () => ({
        links: [
            { text: 'Simulator', route: '/' },
            { text: 'Equipment', route: '/Equipment' },
            { text: 'Profile', route: '/profile' }
        ]
    }),
    methods: {
        signOut() {
            // localStorage.removeItem('token')
        },
        logout() {
            /*       this.$store.dispatch('logout').then(() => {
                this.$router.push('/login')
            }) */
        }
    },
    computed: {
        isLoggedIn() {
            return false
            //return this.$store.getters.isLoggedIn
        }
    }
}

</script>


<style lang="scss" scoped>

@import '../../sass/app.scss';
.header {
  display: flex;
  justify-content: space-between;
  padding: 10px 10%;
  margin-bottom: 10vh;
  background-color: $primary-background-color;
  * {
    background-color: $primary-background-color;
  }

  .title {
    cursor: pointer;
  }
  .left-side {
    display: flex;
    align-items: center;
    .title {
      cursor: pointer;
      margin-right: 40px;
    }
    .nav-links {
      list-style: none;
      li {
        display: inline-block;
        padding: 0px 20px;
        a {
          transition: all 0.3s ease 0s;
          &:hover {
            @include easeOut;
            color:$hover-color;
          }
        }
        &:nth-child(1) {
          padding: 0px 20px 0px 0px;
        }
      }
    }
  }
  button {
    margin-left: 20px;
    padding: 9px 25px;
    background-color: $secondary-background-color;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease 0s;
  }

  button:hover {
    background-color: $hover-color;
  }
  .router-link-exact-active {
    color:$hover-color;
  }
}

</style>




