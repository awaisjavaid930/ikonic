<template>
    <div class="container mt-4">
        <AlertComponent :message="message" />
        <form @submit.prevent="updateProduct">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Title</label>
                <input type="text" v-model="formData.title" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script>
import { useAuthStore } from '../../store/auth';
import AlertComponent from '@/components/notification/AlertComponent';
const store = useAuthStore();

export default {
    name: 'ProductAdd',
    data() {
        return {
            formData: {
                title: ''
            },
            message: ''
        }
    },
    methods: {
        async updateProduct() {
            const res = await store.apiRequest('product/'+ this.$route.params.id, 'PUT', this.formData)
            this.message = res.data.message
            this.$router.push('/product')
        },
         async getProduct() {
            const res = await store.apiRequest('product/'+ this.$route.params.id, 'get')
            this.formData = res.data.data
        }
    },
    mounted() {
        this.getProduct()
    },
    components: {
        AlertComponent
    }

}
</script>