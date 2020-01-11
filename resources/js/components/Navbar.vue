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
        v-if="isLoggedin"
        :to="{name: 'profile'}"
      >
        {{ currentUser.name  }}
      </router-link>
      <router-link
        v-if="isLoggedin"
        :to="{name: 'login'}"
      >
        <button @click="logout">
          Sign out
        </button>
      </router-link>
      <div v-else>
        <router-link
          :to="{name: 'login'}"
        >
          <button>Sign in</button>
        </router-link>
        <router-link
          :to="{name: 'register'}"
        >
          <button>Sign Up</button>
        </router-link>
      </div>
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
        isLoggedin() {
            return this.$store.getters.isLoggedIn
        },
        currentUser() {
            return this.$store.getters.currentUser
        }
    },
    methods: {
        logout() {
            this.$store.commit('logout')
            this.$router.push('/login')
        }
    }
}

</script>


<style lang="scss" scoped>


</style>




