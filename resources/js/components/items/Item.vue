<template>
  <div class="card w-100">
    <div class="card-body">
      <router-link :to="{ name: 'item', params: { id }}">
        <h5>{{ name }}</h5>
        <img
          :src="getPathOfImage(image_filename)"
          height="25"
        >
      </router-link>
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
        restricted_to: {
            type:  String,
            default: 'none'
        },
        image_filename: {
            type:  String,
            default: 'none'
        }
    },
    mounted() {
        console.log(this.itemTitle)
    },
    methods: {
        getPathOfImage(imageFileName) {
            const images = require.context('../../../assets/images/equipment/', false, /\.png$/)
            return images(`./${imageFileName}`)
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
