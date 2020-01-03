<template>
  <div>
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
          <item v-bind="item" />
        </div>
      </div>
    </div>
    <!--     <h1>Pistols</h1>
    <div
      v-for="pistol in pistols"
      :key="pistol.name"
    >
      <item v-bind="pistol" />
    </div>
    <h1>Heavys</h1>
    <div
      v-for="heavy in heavies"
      :key="heavy.name"
    >
      <item v-bind="heavy" />
    </div> -->
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
            pistols: [],
            heavies: [],
            smgs: [],
            rifles: [],
            grenades: [],
            equipment: [],
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
            this.sortedItemsInCategories.push(this.items.filter(item => item.type === 'pistol').sort(this.sortByRestriction))
            this.sortedItemsInCategories.push(this.items.filter(item => item.type === 'heavy').sort(this.sortByRestriction))
            this.sortedItemsInCategories.push(this.items.filter(item => item.type === 'smg').sort(this.sortByRestriction))
            this.sortedItemsInCategories.push(this.items.filter(item => item.type === 'rifle').sort(this.sortByRestriction))
            this.sortedItemsInCategories.push(this.items.filter(item => item.type === 'grenade').sort(this.sortByRestriction))
            this.sortedItemsInCategories.push(this.items.filter(item => item.type === 'equipment').sort(this.sortByRestriction))
            this.loading = false
        })
    },
    methods: {
        sortByRestriction(a, b) {
            return ((a.restrictedTo > b.restrictedTo) ? 1 : -1)
        }
    }
}
</script>

<style lang="scss" scoped>
.category-container {
      display: flex;
      margin: 20px;
    }
</style>
