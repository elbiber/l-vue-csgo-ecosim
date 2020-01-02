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
    @import './../sass/app.scss';
    @import url('https://fonts.googleapis.com/css?family=Abel|Roboto&display=swap');
* {
    outline: none;
    font-family: 'Abel', sans-serif;
    color: $primary-text-color;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    text-decoration: none;
}
html {
  overflow: inherit;
  @include background;
}
</style>
