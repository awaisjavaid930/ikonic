<template>
    <div class="container mt-4">
        <h3>
            ({{ data.title }}) Role Permission
        </h3>
        
        <form @submit.prevent="assignPermission"> 
            <div class="row">
                <div class="col-md-3" v-for="permission in permssion_list" :key="permission.id">
                    <div class="form-group form-check">
                        <input :checked="getPermssion(permission.name)" @change="setPermssion(permission.name)" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1"> {{ permission.name }} </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> Submit </button>
        </form>

    </div>
</template>
<script>
import { useAuthStore } from '../../store/auth';
const store = useAuthStore();
export default {
    name: 'ProductList',
    data() {
        return {
            data: '',
            permissions: [],
            permssion_list: [],
        }
    },
    methods: {
        async getItems() {
            const res = await store.apiRequest('roles/' + this.$route.params.id, 'get');
            this.permssion_list =  res.data.permission ;
            this.data = res.data.data;
        },
        async assignPermission(){
            let data = {
                permissions: this.permissions,
                role: this.data.title
            }
            const res = await store.apiRequest('assign/permssion' , 'post', data);
            if(res.data.status == 200 )
            {
                this.$router.push('/permission')
            }
        },
        setPermssion(value) {
            return this.permissions.push(value);
        },
        getPermssion(permission){
            let is_exist = this.data.permissions.find(item => item.name === permission);
            if (is_exist) {
                return 'checked';
            }
        }
    },
    mounted() {
        this.getItems()
    },

}
</script>