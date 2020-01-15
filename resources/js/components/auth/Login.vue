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
    <div v-if="wrongCredentials" class="error-message">    
      Email or password invalid!
    </div>
    <div v-if="!emailVerified" class="error-message">    
        <p>
        Email not verified!
        <router-link to="/register">
          Resend link
        </router-link>
      </p>
    </div>
    <div class="single-line-container">
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
                email: 'willy@contact-weise.de',
                password: '12345678'
            },
            status: null,
            errors: null,
            emailVerified: true
        }
    },
    computed: {
        hasErrors() {
            return 422 === this.status && this.errors !== null
        },
        wrongCredentials() {
            return 401 === this.status
        },
        currentUser() {
            // console.log(this.$store.getters.currentUser.created_at)
            return this.$store.getters.currentUser
        }
    },
    methods: {
        authenticate(){
            this.$store.dispatch('login')

            login(this.$data.formLogin)
                .then(response => {
                    this.$store.commit('loginSuccess', response.data)
                    console.log(this.currentUser.email_verified_at)
                    if(this.currentUser.email_verified_at) {
                        this.$router.push({ path: '/dashboard' })
                    } else {
                        this.emailVerified = false
                        sendVerificationLink()
                        this.$store.commit('logout')
                    }
                    
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