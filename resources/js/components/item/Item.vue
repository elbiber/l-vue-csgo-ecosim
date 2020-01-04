<template>
  <div>
    <div v-if="loading">
      Data is loading ......
    </div>
    <div
      v-else
      class="item-container"
    >
      <img
        :src="pathOfFileImage"
        height="50"
      >
    </div>
  </div>
</template>

<script>

export default {
    components: {

    },
    data() {
        return {
            item: null,
            loading: false
        }
    },
    computed: {
        pathOfFileImage() {
            const images = require.context('../../../assets/images/equipment/', false, /\.png$/)
            return images(`./${this.item.image_filename}`)
        }
    },
    created() {
        this.loading = true
        axios.get(`/api/items/${this.$route.params.id}`)
            .then(response => {
                this.item = response.data.data
                this.loading = false
            })
    }
}
</script>
