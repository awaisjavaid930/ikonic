<template>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <AlertComponent :message="message" />

                <div class="card">
                    <div class="card-header">
                        Register Form
                    </div>
                    <div class="card-body">
                        <form @submit="register">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input v-model="formData.name" type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input v-model="formData.email" type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input v-model="formData.password" type="password" class="form-control"
                                    id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
import { useAuthStore } from '@/store/auth'
import AlertComponent from '@/components/notification/AlertComponent.vue';

const store = useAuthStore();

export default {
    name: 'RegisterPage',
    data() {
        return {
            formData: {
                name: '',
                email: '',
                password: '',
            },
            message : ''
        }
    },
    methods: {
        async register(e) {
            e.preventDefault();
            let res = await store.register(this.formData)
            if (res.data.status == '200') {
                this.message =  res.data.message ;
                this.$router.push('/login')
            }
        }
    },
    components : {
        AlertComponent
    }
}
</script>