<template>
  <div class="main-container">
    <div v-if="loading">
      Data is loading ......
    </div>
    <div
      v-else
      class="item-container"
    >
      <img
        :src="'/images/' + item.image_filename"
        onerror="this.src='/images/no_image.png';"
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
    created() {
        this.loading = true
        const config = {

            headers: { Authorization: 'Bearer ' + this.$store.getters.currentUser.token }
        }
        axios.get(`/api/items/${this.$route.params.id}`, config)
            .then(response => {
                this.item = response.data.data
                this.loading = false
            })
    }
}
</script>
