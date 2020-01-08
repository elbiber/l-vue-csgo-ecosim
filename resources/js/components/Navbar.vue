<template>
  <div
    class="header"
    fixed="top"
  >
    <div class="left-side">
      <h2 class="title">
        CSGO-ECOSIM
      </h2>
      <nav>
        <ul class="nav-links">
          <li
            v-for="link in links"
            :key="link.text"
          >
            <router-link :to="link.route">
              {{ link.text }}
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
    <div class="right-side">
      <router-link
        v-if="isLoggedIn"
        :to="{name: 'login'}"
      >
        <button @click="logout">
          Sign out
        </button>
      </router-link>
      <router-link
        v-else
        :to="{name: 'login'}"
      >
        <button>Sign in</button>
      </router-link>
      <router-link
        v-if="!isLoggedIn"
        :to="{name: 'register'}"
      >
        <button>Sign Up</button>
      </router-link>
    </div>
  </div>
</template>


<script>

export default {
    data: () => ({
        links: [
            { text: 'Simulator', route: '/simulator' },
            { text: 'Items', route: '/items' },
            { text: 'Profile', route: '/profile' }
        ]
    }),
    computed: {
        isLoggedIn() {
            return false
            //return this.$store.getters.isLoggedIn
        }
    },
    methods: {
        signOut() {
            // localStorage.removeItem('token')
        },
        logout() {
            /*       this.$store.dispatch('logout').then(() => {
                this.$router.push('/login')
            }) */
        }
    }
}

</script>


<style lang="scss" scoped>


</style>




