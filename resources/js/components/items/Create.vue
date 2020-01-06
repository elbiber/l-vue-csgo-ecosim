<template>
  <div
    class="form-container"
  >
    <h1>Create Item</h1>
    <form
      novalidate
      class="register-form"
      @submit.prevent="createItem"
    >
      <div class="input-container">
        <label for="name">Name</label>
        <input
          id="name"
          v-model="item.name"
          type="text"
          placeholder="Item name"
          required
          autofocus
        >
      </div>
      <div class="input-container">
        <label for="type">Type</label>
        <select v-model="item.type">
          <option
            disabled
            value=""
          >
            Please select one
          </option>
          <option value="pistol">
            Pistol
          </option>
          <option value="heavy">
            Heavy
          </option>
          <option value="smg">
            SMG
          </option>
          <option value="rifle">
            Rifle
          </option>
          <option value="grenade">
            Grenade
          </option>
          <option value="equipment">
            Equipment
          </option>
        </select>
      </div>
      <div class="input-container">
        <label for="price">Price</label>
        <input
          id="price"
          v-model="item.price"
          type="number"
          placeholder="Price"
          required
        >
      </div>
      <div class="input-container">
        <label for="kill_award">Kill Award</label>
        <input
          id="kill_award"
          v-model="item.kill_award"
          type="number"
          placeholder="Kill Award"
          required
        >
      </div>
      <div class="input-container">
        <label for="restricted_to">Restricted To</label>
        <select v-model="item.restricted_to">
          <option
            disabled
            value=""
          >
            Please select one
          </option>
          <option value="none">
            No Restriction
          </option>
          <option value="ct">
            Coutner Terrorists
          </option>
          <option value="t">
            Terrorists
          </option>
        </select>
      </div>
      <div class="input-container">
        <label for="image_filename">Image Filename</label>
        <input
          id="image_filename"
          v-model="item.image_filename"
          type="text"
          placeholder="Image Filename"
          required
        >
      </div>
      <button
        type="submit"
      >
        Add Item to Database
      </button>
    </form>
  </div>
</template>

<script>
export default {
    data() {
        return {
            item : {
                name: null,
                type: null,
                price: null,
                kill_award: null,
                restricted_to: null,
                image_filename: null
            }

        }
    },
    methods: {
        createItem() {
            console.log(this.item)
            axios.post('/api/items', this.item)
        }
    }
}
</script>

<style lang="scss" scoped>

</style>

