<template>
  <q-page-container>
    <q-page class="flex-center row">
      <div class="q-pa-sm col-md-6">
        <q-form @submit="login" class="q-gutter-md q-px-lg">
          <q-input filled v-model="formData.email" label="Your Email *" lazy-rules
            :rules="[val => val && val.length > 0 || 'Please type email']" />

          <q-input filled v-model="formData.password" type="text" label="Your Password *" lazy-rules :rules="[
            val => val !== null && val !== '' || 'Please type your password'
          ]" />
          <div>
            <q-btn label="Login" type="submit" color="primary" />
            <q-btn label="Register" @click="$router.push('/register')" color="primary" flat class="q-ml-sm" />
          </div>
        </q-form>

      </div>
    </q-page>
  </q-page-container>
</template>

<script>
import { useAuthStore } from 'src/stores/example-store';
const authStore = useAuthStore();
export default {
  name: 'IndexPage',
  data() {
    return {
      formData: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    login(e){
      e.preventDefault();
      authStore.login(this.formData)
      
    }
  },
}
</script>
