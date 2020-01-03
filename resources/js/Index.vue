<template>
  <div>
    <navbar />
    <router-view class="main-container" />
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue'

export default {
    name: 'App',
    components: {
        Navbar
    }
}
</script>

<style lang="scss">

</style>
