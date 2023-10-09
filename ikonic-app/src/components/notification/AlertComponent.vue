<template>
    <div v-if="message">
        <div class="alert alert-primary" role="alert">
            {{ message  }}
              <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</template>
<script>
export default {
    name: "AlertComponent",
    props : {
        message : {
            type :String,
            required : true
        }
    }
}
</script>