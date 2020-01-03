<template>
  <div>
    <div
        v-for="(item, index) in items"
        :key="index"
      >
      <item v-bind="item"/>
    </div>
  </div>
</template>

<script>

import Item from './Item'

export default {
    components: {
        Item
    },
    data() {
        return {
            items: null,
            loading: false
        }
    },
    computed: {

    },
    created() {
        this.loading = true
        axios.get('/api/items').then(response => {
            this.items = response.data.data
            this.loading = false
        })
    }
}
</script>
