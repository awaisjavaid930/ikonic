<template>
    <div class="container mt-4">
        <h3>
            All Feedback
        </h3>
        <router-link class="btn btn-primary my-2" :to="'/feedback/add/'+ $route.params.product_id">Product</router-link>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody >
                <tr v-for="(feedback_list, index) in feedback_lists" :key="feedback_list">
                    <th scope="row">{{ index + 1 }}</th>
                    <td> {{ feedback_list.title }}</td>
                    <td>
                        <router-link class="btn btn-primary" :to="'/product/' + feedback_list.id">Edit</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import { useAuthStore } from '../../store/auth';
const store = useAuthStore();
export default {
    name: 'ProductList',
    data() {
        return {
            feedback_lists: [],
        }
    },
    methods: {
        async getItems() {
            const res = await store.apiRequest("feedback/" + this.$route.params.product_id+'/detail', "get")
            if (res.status == 200) {
                
                this.feedback_lists = res.data.data;
            }
        }
    },
    mounted() {
        this.getItems()
    },

}
</script>