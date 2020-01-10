<template>
  <div class="form-container">
    <h1>Sign in</h1>
    <form 
      novalidate
      @submit.prevent="authenticate"
    >
      <div class="input-container">
        <label>Email</label>
        <input
          v-model="formLogin.email"
          type="email"
          placeholder="Enter your email address..."
          required
          autofocus
          :class="[ {'is-invalid': errorFor('email') || wrongCredentials }]"
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
          v-model="formLogin.password"
          required
          type="password"
          placeholder="Password"
          :class="[ {'is-invalid': errorFor('password') || wrongCredentials }]"
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
import { login } from './../../auth'
export default {
    data() {
        return {
            formLogin: {
                email: 'wilber.heller@example.com',
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
        wrongCredentials() {
            return 401 === this.status
        },
        hasAvailability() {
            return 200 === this.status
        },
        noAvailability() {
            return 404 === this.status
        }
    },
    methods: {
        authenticate(){
            this.$store.dispatch('login')

            login(this.$data.formLogin)
                  .then(response => {
                    console.log(response)
                    this.$store.commit('loginSuccess', response.data)
                    this.$router.push({ path: '/dashboard' })
                })
                .catch(error => {
                    if (422 === error.response.status) {
                        this.errors = error.response.data.errors
                    }
                    
                    this.status =error.response.status
                    this.$store.commit('loginFailed', { error })
                })
        },
        errorFor(field) {
            return this.hasErrors && this.errors[field] ? this.errors[field] : null 
        }
    }
    
}
</script>