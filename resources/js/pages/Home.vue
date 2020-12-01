<template>
<div class="container mt-4 pt-2">
    <div class="row">
        <div class="col-md-4" v-if="renderComponent">
            <h4>Crypto-currency prices</h4>
            <btc-component></btc-component>
            <mintme-btc-component></mintme-btc-component>
            <eth-component></eth-component>
            <mintme-eth-component></mintme-eth-component>
        </div>
        <div class="col-md-4">
            <mintme-usd-calc-component></mintme-usd-calc-component>
        </div>
        <div class="col-md-4">
            <usd-mintme-calc-component></usd-mintme-calc-component>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <p class="text-center">
                The data on this site is automatically updated every 15 minutes. <br>
                The API of <a href="https://www.coingecko.com/" target="_blank" rel="noopener noreferrer">CoinGecko</a>  and <a href="https://www.mintme.com/" target="_blank" rel="noopener noreferrer">MintMe</a> are used to get the value of the cryptocurrencies.
            </p>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "Home",
    props: [
        'btcValue',
        'mintmeBtcValue'
    ],
    data(){
        return{
            renderComponent: true
        }
    },
    mounted(){
        this.$nextTick(function () {
            window.setInterval(() => {
                this.updateComponents();
            },60000);
        })
    },
    methods:{
        updateComponents(){
            this.renderComponent = false
            this.$nextTick(() => {
                this.renderComponent = true
            })
        }
    }
}
</script>

<style scoped>

</style>
