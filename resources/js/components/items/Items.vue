<template>
  <div class="main-container">
    <div v-if="loading">
      <h1>Loading.....</h1>
    </div>
    <div v-else>
      <div class="items-header">
        <h1>
          Stored Items
        </h1>
        <button>
          <router-link :to="'/items/create'">
            Create Item
          </router-link>
        </button>
      </div>
      <div
        v-for="(category, index) in sortedItemsInCategories"
        :key="index"
      >
        <h3>{{ itemCategories[index] }}</h3>
        <div class="category-container">
          <div
            v-for="item in category"
            :key="item.name"
          >
            <listed-item v-bind="item" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import ListedItem from './ListedItem'

export default {
    components: {
        ListedItem
    },
    data() {
        return {
            items: null,
            sortedItemsInCategories: [],
            itemCategories: [
                'Pistols', 'Heavies', 'SMGs', 'Rifles', 'Grenades', 'Equipment'
            ],
            loading: false
        }
    },
    computed: {

    },
    created() {
        this.loading = true
        axios.get('/api/items').then(response => {
            this.items = response.data.data
            console.log(this.items)
            const types = ['pistol', 'heavy', 'smg', 'rifle', 'grenade', 'equipment']
            types.forEach(type => {
                this.sortedItemsInCategories.push(this.items.filter(item => item.type === type).sort(this.sortByRestriction))
            })
            console.log(this.sortedItemsInCategories)
            this.loading = false
        })
    },
    methods: {
        sortByRestriction(a, b) {
            let rankA = 0
            if(a.restricted_to === 'none') rankA = 2
            if(a.restricted_to === 'ct') rankA = 1
            let rankB = 0
            if(b.restricted_to === 'none') rankA = 2
            if(b.restricted_to === 'ct') rankB = 1
            //console.log(rankA)
            return ((rankA < rankB) ? 1 : -1)
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
