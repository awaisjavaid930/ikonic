<template>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Ikonic</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
              <router-link class="nav-link" to="/product">Product</router-link>
          </li>
          <li class="nav-item">
              <router-link class="nav-link" to="/permission">Role & Permission</router-link>
          </li>
        </ul>
        <button @click="logout" class="btn btn-outline-success" type="submit">Logout</button>
      </div>
    </div>

  </nav>
  <router-view />
  <AlertComponent :message="message" />
</template>
<script>
import { useAuthStore } from '@/store/auth'
import AlertComponent from '../notification/AlertComponent.vue';
const store = useAuthStore();
export default {
  name: 'MenubarComponent',
  data() {
    return {
      message: ''
    }
  },
  methods: {
    async logout() {
      const res = await store.logout();
      this.message = res.data.message;
      return this.$router.push('/')
    }
  },
  components: {
    AlertComponent
  }
}
</script>