<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form>
                    <div class="form-group">
                        <span>Content</span>
                        <textarea type="text" class="form-control" v-model="form.content"/>
                    </div>
                    <div class="form-group">
                        <span>Size</span>
                        <input type="number" class="form-control" v-model="form.size"/>
                    </div>
                    <div class="form-group">
                        <span>Background color</span>
                        <input type="color" class="form-control" v-model="form.background_color"/>
                    </div>
                    <div class="form-group">
                        <span>Fill</span>
                        <input type="color" class="form-control" v-model="form.fill_color"/>
                    </div>
                    <button type="button" class="btn btn-success mt-2" @click="onSubmit">
                        Generate
                    </button>
                </form>
            </div>
            <div class="col-6">
                <img :src="image.qr_code" :height="image.height" :width="image.length">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "QrCodesComponent",
    data() {
        return {
            qr_codes: [],
            form: {
                content: '',
                size: '',
                background_color: '#ffffff',
                fill_color: '#000000'
            },
            image: {},
        }
    },
    methods: {
        onSubmit() {
            axios.post('qr-codes/store', this.form).then(response => {
                this.image = response.data.data;
            });
        }
    }
}
</script>

<style scoped>

</style>
