<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Register</h5>
            <form class="form-signin">
              <div class="form-label-group">
                <input type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUserame">Username</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                <label for="inputEmail">Email address</label>
              </div>
              
              <hr>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              
              <div class="form-label-group">
                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                <label for="inputConfirmPassword">Confirm password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
              <a class="d-block text-center mt-2 small" href="#">Sign In</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	/* eslint-disable */
  export default {
	computed:{
      redirectIfAlreadyConnected () {
		  console.log("aaa")
        if(this.$store.getters.doesConnected)
		  this.$router.push('user-panel')
		return true
      }
    },
    data: () => ({
		mailError: false,
		passwordError: false,
		sendFail: false,
		sendSucess: false,
		sendProgress: false,
		emailInput: '',
		passwordInput: '',
		regEmail: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
		user:{
			email: '',
			password: '',
			user_agents: window.navigator.userAgent
		},
		header: {
			headers: {
				'Access-Control-Allow-Origin': '*'
			}
		}
	}),
	methods: {
		loginAccount: function(){
			this.mailError = this.emailInput == '' ? true : false
			this.passwordError = this.passwordInput == '' ? true : false
			if(!this.mailError && !this.passwordError){
				this.user.email = this.emailInput
				this.user.password = this.passwordInput
				this.sendProgress = true
				this.$axioshttp
				.post('http://localhost:5000/api/users/login', this.user, this.header)
				.then(response => {
					this.successLogin(response.data.data.id, response.data.data.username)
					this.$router.push('user-panel')
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
			this.sendSucess = false
			this.sendFail = false
		},
		successLogin: function(id, username){
			this.$store.commit('login', {id: id, name: username})
		}
	}
}
</script>
<style lang="scss">
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-img-left {
  width: 45%;
  /* Link to your background image using in the property below! */
  background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
  background-size: cover;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}
</style>