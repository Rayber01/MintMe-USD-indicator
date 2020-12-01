<template>
    <div>
        <button class="btn btn-primary" @click="triggerUpload()" v-show="!loading">Upload video...</button>
        <img src="assets/img/358.png" alt="" v-show="loading">
        <input type="file" @change="selectFile" id="file1" name="file1">
        <form method="POST" enctype="multipart/form-data" action="/api/photo" v-show="false">
            <input type="file" name="photo"/>
            <input type="text" name="description"/>
            <input type="text" name="productId">
        </form>
        <div class="row">
            <div class="col-2" v-for="(item, index) in linkUpdates">
                <video-component :link="'storage/video/'+item"></video-component>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                photo: null,
                description: '',
                productId: 0,
                links: [],
                loading: false,
            }
        },
        mounted(){
            axios.get('/video').then((response) => {
              this.links = response.data
            }).catch((error) => {
              console.error(error)
            })
        },
        computed: {
            linkUpdates(){
                return this.links
            }
        },
        methods: {
            selectFile(event) {
                this.loading = true
                this.photo = event.target.files[0];
                const data = new FormData();
                data.append('photo', this.photo);
                data.append('description', this.description);
                data.append('productId', this.productId);
                axios.post("/video", data);
                axios.get('/video').then((response) => {
                  this.links = response.data
                }).catch((error) => {
                  console.error(error)
                })
                this.loading = false
            },
            triggerUpload() {
                document.getElementById('file1').click();
            }
    }
};
</script>

<style scoped>
#file1{
    display: none;
}
</style>