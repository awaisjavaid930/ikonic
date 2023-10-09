<template>
    <div v-if="message">
        <!-- <div class="alert alert-primary" role="alert">
            {{ message  }}
              <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> -->
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            {{ message }}
                
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "AlertComponent",
    props: {
        message: {
            type: String,
            required: true
        }
    }
}
</script>