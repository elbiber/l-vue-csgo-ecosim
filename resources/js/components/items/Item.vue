<template>
  <div class="card w-100">
    <div class="card-body">
      <router-link :to="{ name: 'item', params: { id }}">
        <h5>{{ name }}</h5>
      </router-link>
      <p class="card-text">
        {{ type }}
      </p>
      <p class="card-text">
        {{ price }}
      </p>
    </div>
  </div>
</template>

<script>
export default {
    props: {
        id: {
            type:  Number,
            default: 0
        },
        name: {
            type:  String,
            default: ''
        },
        type: {
            type:  String,
            default: ''
        },
        price: {
            type:  Number,
            default: 0
        },
        kill_award: {
            type:  Number,
            default: 0
        },
        restricted_ot: {
            type:  String,
            default: 'none'
        }
    },
    mounted() {
        console.log(this.itemTitle)
    }
}
</script>

<style lang="scss" scoped>
     @import '~bootstrap/scss/bootstrap';
</style>
