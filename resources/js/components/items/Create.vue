
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
          :class="[ {'is-invalid': errorFor('name') }]"
        >
        <div
          v-for="(error, index) in errorFor('name')"
          :key="'name' + index"
          class="invalid-feedback"
        >
          {{ error }}
        </div>
      </div>
      <div class="input-container">
        <label for="type">Type</label>
        <select
          v-model="item.type"
          :class="[ {'is-invalid': errorFor('type') }]"
        >
          <option
            value="pistol"
          >
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
        <div
          v-for="(error, index) in errorFor('type')"
          :key="'type' + index"
          class="invalid-feedback"
        >
          {{ error }}
        </div>
      </div>
      <div class="input-container">
        <label for="price">Price</label>
        <input
          id="price"
          v-model="item.price"
          type="number"
          placeholder="Price"
          required
          :class="[ {'is-invalid': errorFor('price') }]"
        >
        <div
          v-for="(error, index) in errorFor('price')"
          :key="'price' + index"
          class="invalid-feedback"
        >
          {{ error }}
        </div>
      </div>

      <div class="input-container">
        <label for="kill_award">Kill Award</label>
        <input
          id="kill_award"
          v-model="item.kill_award"
          type="number"
          placeholder="Kill Award"
          required
          :class="[ {'is-invalid': errorFor('kill_award') }]"
        >
        <div
          v-for="(error, index) in errorFor('kill_award')"
          :key="'kill_award' + index"
          class="invalid-feedback"
        >
          {{ error }}
        </div>
      </div>
      <div class="input-container">
        <label for="restricted_to">Restricted To</label>
        <select
          v-model="item.restricted_to"
          :class="[ {'is-invalid': errorFor('restricted_to') }]"
        >
          <option
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
        <div
          v-for="(error, index) in errorFor('restricted_to')"
          :key="'restricted_to' + index"
          class="invalid-feedback"
        >
          {{ error }}
        </div>
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
  </form>
  </div>
</template>

<script>
export default {
    data() {
        return {
            item : {
                name: 'Test',
                type: 'pistol',
                price: 1000,
                kill_award: 200,
                restricted_to: 'none',
                image_filename: 'test.png'
            },
            status: null,
            errors: null

        }
    },
    computed: {
        hasErrors() {
            return 422 === this.status && this.errors !== null
        },
        hasAvailability() {
            return 200 === this.status
        },
        noAvailability() {
            return 404 === this.status
        }
    },
    methods: {
        createItem() {
            console.log(this.item)
            axios.post('/api/items', this.item)
                .then(response => {
                    this.status = response.status
                })
                .catch(error => {
                    if (422 === error.response.status) {
                        this.errors = error.response.data.errors
                    }
                    this.status =error.response.status
                })
                .then(() => this.loading = false)
        },
        errorFor(field) {
            return this.hasErrors && this.errors[field] ? this.errors[field] : null
        }
    }
}
</script>
