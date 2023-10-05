<template>
    <q-page-container>
        <q-page class="flex-center">
            <div class="q-pa-lg">
                Register Page
                <q-form @submit="onSubmit" @reset="onReset" class="q-gutter-md q-px-lg">
                    <q-input filled v-model="formData.email" label="Your Email *" lazy-rules
                        :rules="[val => val && val.length > 0 || 'Please type email']" />

                    <q-input filled v-model="formData.password" type="text" label="Your Password *" lazy-rules :rules="[
                        val => val !== null && val !== '' || 'Please type your password',
                        val => val > 0 && val < 100 || 'Please type a real age'
                    ]" />
                    <div>
                        <q-btn label="Submit" type="submit" color="primary" />
                        <q-btn label="Register" to="/register" color="primary" flat class="q-ml-sm" />
                    </div>
                </q-form>

            </div>
        </q-page>
    </q-page-container>
</template>

<script>
export default {
    name: 'RegisterPage',
    data() {
        return {
            formData: {
                email: '',
                password: ''
            }
        }
    },
}
</script>
