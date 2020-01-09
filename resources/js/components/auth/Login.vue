<template>
  <div class="form-container">
    <h1>Sign in</h1>
    <form 
      novalidate
      @submit.prevent="login"
    >
      <div class="input-container">
        <label>Email</label>
        <input
          v-model="loginData.email"
          type="email"
          placeholder="Enter your email address..."
          required
          autofocus
          :class="[ {'is-invalid': errorFor('email') }]"
        >
        <div
          v-for="(error, index) in errorFor('email')"
          :key="'email' + index"
          class="invalid-feedback"
        >
          {{ error }}
        </div>          
      </div>
      <div class="input-container">
        <label>Password<router-link to="/forgotpassword">Forgot Password?</router-link></label>
        <input
          v-model="loginData.password"
          required
          type="password"
          placeholder="Password"
          :class="[ {'is-invalid': errorFor('password') }]"
        >
        <div
          v-for="(error, index) in errorFor('password')"
          :key="'password' + index"
          class="invalid-feedback"
        >
          {{ error }}
        </div>       
      </div>

      <button type="submit">
        Login
      </button>
    </form>
    <div class="create-account">
      <p>
        New to CSGO-Ecosim?
        <router-link to="/register">
          Create an Account
        </router-link>
      </p>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            loginData: {
                email: 'willy@contact-weise.de',
                password: '1234'
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
        login() {
            axios.post('/api/login', this.loginData)
                .then(response => {
                    console.log(response)
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