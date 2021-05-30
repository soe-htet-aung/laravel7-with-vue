<template>
    <div class="container" style="background: red;">
        <div class="row mt-3 mb-3 justify-content-center">

            <h2>Body</h2>

        </div>
        
    </div>
</template>

<script>
export default {
    name: 'bodyComponent',
    data() {
        return {
            buses: []
        }
    },
    methods: {
        getBuses() {
            axios.get('api/bus')
            .then(
                response => {
                    this.buses = response.data;
                    console.log(response.data)
                },
            )
        }
    },
    created() {
        this.getBuses();
    }
}
</script>

<style>
    .shop_img {
        height: 250px;
        width: 250px;
    }
</style>