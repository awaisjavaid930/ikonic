<template>
    <div class="container mt-4">
        <AlertComponent :message="message" />
        <form @submit.prevent="addProduct">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Feedback Title</label>
                <input type="text" v-model="formData.title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Category</label>
                <select v-model="formData.category" class="form-select" aria-label="Default select example">
                    <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description </label>
                <div class="form-floating">
                    <textarea v-model="formData.description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea">Comments</label>
                </div>

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
                title: '',
                product_id: this.$route.params.product_id,
                category: '',
                description : ''
            },
            categories: ['Bug', 'improvement', 'Modification'],
            message: ''
        }
    },
    methods: {
        async addProduct() {
            const res = await store.apiRequest('feedback', 'post', this.formData)
            console.log(res)
            this.message = res.data.message
            this.$router.push('/product/'+this.formData.product_id +'/feedback');
        }
    },
    components: {
        AlertComponent
    }

}
</script>