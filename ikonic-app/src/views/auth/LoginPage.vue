<template>
  <div class="container">
    <div class="row">
      <div class="col-md-7">
      <AlertComponent  :message="message" />
        <div class="card">
          <div class="card-header">
            Login Form
          </div>
          <div class="card-body">
            <form @submit.prevent="login">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input v-model="formData.email" type="email" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input v-model="formData.password" type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
import AlertComponent from '@/components/notification/AlertComponent.vue';
import { useAuthStore } from '@/store/auth';
const auth = useAuthStore();
export default {
  name: 'RegisterPage',
  data() {
    return {
      formData: {
        email: '',
        password: ''
      },
      message : ''
    }
  },
  methods: {
    async login() {
      const res = await auth.login(this.formData)
      console.log(res)
      if (res.data.status == '200') {
        this.message = res.data.message
        this.$router.push('/dashboard')
      } else if(res.data.status == '404') {
        this.message = res.data.message
      }
    }
  },
  components : {
    AlertComponent
  }
}
</script>