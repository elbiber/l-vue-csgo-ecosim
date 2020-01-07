<template>
  <router-link :to="{ name: 'item', params: { id }}">
    <div class="item-container">
      <div class="">
        <h4 :class="restricted_to">
          {{ name }}
        </h4>
        <p>Type:       {{ type.charAt(0).toUpperCase() + type.slice(1) }}</p>
        <p>Price:      {{ price }}</p>
        <p>Kill Award: {{ kill_award }}</p>
        <p>Restricted to: {{ restricted_to }}</p>
      </div>
      <img
        :src="'/images/' + image_filename"
        onerror="this.src='/images/no_image.png';"
        height="25"
      >
    </div>
  </router-link>
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
    }
}
</script>

<style lang="scss" scoped>

</style>
