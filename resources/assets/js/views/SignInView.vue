<template>
  <div class="container vh-100">
		<div class="row">
			<transition name="bounce">
				<article class="message is-danger" v-if="sendFail">
					<div class="message-body card notification is-transparent">
					Erreur lors de la connection. Verifier votre email / mot de passe.
					<a class="button" v-on:click="close()">
						<span class="icon is-small">
							<i class="fas fa-times"></i>
						</span>
					</a>
					</div>
				</article>
			</transition>
		</div>
    <div class="row vh-100">
      <div class="col-lg-10 col-xl-9 mx-auto my-auto">
        <div class="card card-authentification flex-row my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Login</h5>
            <form class="form-authentification">

              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" v-model="emailInput" placeholder="Email address" required>
                <label for="inputEmail">Email address</label>
              </div>
              
              <hr>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" v-model="passwordInput" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <div class="btn btn-lg btn-primary btn-block text-uppercase" v-on:click="loginAccount">Login</div>
              <a class="d-block text-center mt-2 small" href="/signup">Sign Up</a>
            </form>
          </div>
					<div class="card-img-right d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	/* eslint-disable */
  export default {
		async beforeMount() {
      this.options.headers.Authorization = 'Bearer '+this.$store.getters.getUserToken
      await this.isUserLoggin()
  	},
    data: () => ({
			mailError: false,
			passwordError: false,
			sendFail: false,
			sendProgress: false,
			emailInput: 'af@gmail.com',
			passwordInput: 'secret',
			regEmail: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
			user:{
				email: '',
				password: ''
			},
			options: {
				data: {},
				headers: {
					'Authorization': ''
				},
			},
		}),
		methods: {
			isUserLoggin: async function() {
				var isConnected = await this.$store.dispatch('isConnected', this.options)
				if(isConnected){
					window.location.href = '/'
				}
			},
			loginAccount: function(){
				this.mailError = this.emailInput == '' ? true : false
				this.passwordError = this.passwordInput == '' ? true : false
				if(!this.mailError && !this.passwordError){
					this.user.email = this.emailInput
					this.user.password = this.passwordInput
					this.sendProgress = true
					window.axios
					.post('http://localhost:8000/api/auth/login', this.user, this.header)
					.then(response => {
						console.log(response.data.token)
						this.successLogin(response.data.token)
						window.location.href = '/'
					})
					.catch(error => {
						this.sendFail = true
					})
					.finally(() => this.sendProgress = false)
				}
			},
			isEmailValid: function(){
				this.mailError = (this.emailInput == '')? true : (this.regEmail.test(this.emailInput)) ? false : true;
			},
			passwordChange: function(){
				this.passwordError = false
			},
			reset: function(event){
				this.emailInput = this.passwordInput = ''
				this.mailError = this.passwordError = false
			},
			close: function(event){
				this.sendFail = false
			},
			successLogin: function(token){
				console.log(token)
				this.$store.commit('login', {token: token})
			}
		}
	}
</script>