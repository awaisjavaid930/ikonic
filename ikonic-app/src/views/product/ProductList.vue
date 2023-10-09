<template>
    <div class="container mt-4">
        <h3>
            All Product
        </h3>
        <router-link class="btn btn-primary my-2" to="/product/add">Product</router-link>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product_list, index) in product_lists" :key="product_list">
                    <th scope="row">{{ index + 1 }}</th>
                    <td> {{ product_list.title }}</td>
                    <td>
                        <router-link class="btn btn-primary" :to="'/product/' + product_list.id">Edit</router-link>
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
            product_lists: [],
        }
    },
    methods: {
        async getItems() {
            const res = await store.apiRequest('product', 'get')
            this.product_lists = res.data.data;
        }
    },
    mounted() {
        this.getItems()
    },

}
</script>