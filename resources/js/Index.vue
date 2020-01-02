<template>
    <div>
        <navbar/>
        <div class="container mt-4 mb-4 pr-4 pl-4">
            <router-view></router-view>
        </div>
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
