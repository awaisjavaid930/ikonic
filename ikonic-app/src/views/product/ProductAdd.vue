<template>
    <div class="container mt-4">
        <AlertComponent :message="message" />
        <form @submit.prevent="addProduct">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Title</label>
                <input type="text" v-model="formData.title" class="form-control" >
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
                title : ''
            },
            message : ''
        }
    },
    methods: {
        async addProduct() {
            const res = await store.apiRequest('product', 'post', this.formData)
            this.message = res.data.message
            this.$router.push('/product')
        }
    },
    components : {
        AlertComponent
    }

}
</script>