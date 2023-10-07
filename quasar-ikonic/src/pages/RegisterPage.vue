<template>
    <q-page-container>
        <q-page class="flex-center row">
            <div class="q-pa-sm col-md-6">
                <q-form @submit="addUser" class="q-gutter-md q-px-lg">
                    <q-input filled v-model="formData.name" label="Your Name *" lazy-rules
                        :rules="[val => val && val.length > 0 || 'Please type name']" />

                    <q-input type="email" filled v-model="formData.email" label="Your Email *" lazy-rules
                        :rules="[val => val && val.length > 0 || 'Please type email']" />

                    <q-input filled v-model="formData.password" type="password" label="Your Password *" lazy-rules
                        :rules="[val => val !== null && val !== '' || 'Please type your password']" />
                    <div>
                        <q-btn label="Register" type="submit" color="primary" />
                        <q-btn label="Login" @click="$router.push('/')" color="primary" flat class="q-ml-sm" />
                    </div>
                </q-form>

            </div>
        </q-page>
    </q-page-container>
</template>

<script>
import { useAuthStore } from 'src/stores/example-store';
var store = useAuthStore();
export default {
    name: 'RegisterPage',
    data() {
        return {
            formData: {
                name: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        async addUser(e) {
            e.preventDefault();
            let res = await store.register(this.formData)
        }


    },
}
</script>
