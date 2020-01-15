<template>
  <div class="main-container">
    <p>{{ currentUser.name }}</p>
    <p>{{ currentUser.email }}</p>
    <p>{{ currentUser.email_verified_at }}</p>
    <p v-if="currentUser.email_verified_at">{{ currentUser.created_at }}</p>
    <p v-else>Email not verified</p>
    
  </div>
</template>



<script>
export default {
    mounted() {
        console.log('Component mounted.')
    },
    computed: {
        currentUser() {
          console.log(this.$store.getters.currentUser.created_at)
            return this.$store.getters.currentUser
        }
    }
}
</script>