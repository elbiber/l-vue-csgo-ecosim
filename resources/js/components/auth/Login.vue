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
    <div
      v-if="wrongCredentials"
      class="error-message"
    >    
      Email or password invalid!
    </div>
    <div
      v-if="!emailVerified"
      class="error-message"
    >
      Email not verified! Check your Email
    </div>
    <div
      v-if="justVerifiedEmail"
      class="success-message"
    >
      Email successfully verified
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
import { login, sendVerificationLink } from './../../auth'
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
            return this.$store.getters.currentUser
        },
        justVerifiedEmail() {
            return this.$route.query.verified
        }
    },
    created() {
        console.log(this.$route.query)
        console.log('hello')
    },
    methods: {
        authenticate(){
            this.$store.dispatch('login')

            login(this.$data.formLogin)
                .then(response => {
                    this.$store.commit('loginSuccess', response.data)
                    if(this.currentUser.email_verified_at) {
                        this.$router.push({ path: '/dashboard' })
                    } else {
                        // eslint-disable-next-line no-console
                        console.log(response.data.access_token)
                        this.emailVerified = false
                        sendVerificationLink(response.data.access_token)
                        this.$store.commit('logout')
                    }
                })
                .catch(error => {
                    // eslint-disable-next-line no-console
                    console.log(error)
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