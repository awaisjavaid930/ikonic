<template>
    <div class="container mt-4">
        <h3>
            All Roles
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
                <tr v-for="(role, index) in role_lists" :key="role">
                    <th scope="row">{{ index + 1 }}</th>
                    <td> {{ role.title }}</td>
                    <td>
                        <router-link class="btn btn-primary" :to="'/role/' + role.id">Edit</router-link>
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
            role_lists: [],
        }
    },
    methods: {
        async getItems() {
            const res = await store.apiRequest('roles', 'get')
            this.role_lists = res.data.data;
        }
    },
    mounted() {
        this.getItems()
    },

}
</script>