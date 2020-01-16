<template>
  <div class="form-container">
    <h1>Reset your password</h1>
    <form 
      novalidate
      @submit.prevent="reset"
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

      <button type="submit">
        Send password reset email
      </button>
    </form>
    <div
v-if="hasTooManyRequests"
class="error-message">    
          Too many requests. Try again later.
    </div>
    <div
v-if="emailSent"
      class="success-message">    
      Reset link sent successfully!
    </div>
    <div class="single-line-container">
      <p class="is-invalid">
        New to CSGO-Ecosim?
        <router-link to="/register">
          Create an Account
        </router-link>
      </p>
    </div>
  </div>
</template>

<script>
import { resetPassword } from './../../auth'
export default {
    data() {
        return {
            formLogin: {
                email: 'willy@contact-weise.de'
            },
            status: null,
            errors: null
        }
    },
    computed: {
        hasErrors() {
            return 422 === this.status && this.errors !== null
        },
        hasTooManyRequests() {
            return 429 === this.status
        },
        emailSent() {
            return 200 === this.status
        },
        wrongCredentials() {
            return 401 === this.status
        }
    },
    methods: {
        reset(){
            resetPassword(this.$data.formLogin)
                .then(response => {
                    console.log(response.status)
                    this.status = response.status
                })
                .catch(error => {
                    console.log( error.response)
                    if (422 === error.response.status) {
                        this.errors = error.response.data.errors
                    }                    
                    this.status =error.response.status
                })
        },
        errorFor(field) {
            return this.hasErrors && this.errors[field] ? this.errors[field] : null 
        }
    }
    
}
</script>