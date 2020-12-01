<template>
<div class="row">
    <img src="assets/img/btc.png" class="rounded float-right" style="width:16%;height:16%" alt="btc">
    <h4 class="mt-3 ml-2">
        ${{formatCurrency(btcValue)}}
    </h4>
</div>
</template>

<script>
export default {
    data() {
        return {
            btcValue: '',
        }
    },
    mounted() {
        axios.get('/btc/vs/usd')
            .then(res => {
                this.btcValue = res.data.bitcoin.usd;
            })
            .catch(err => {
                console.error(err);
            })
    },
    methods:{
        formatCurrency(x){
            var formatedNumber = new Intl.NumberFormat().format(x)
            return formatedNumber
        }
    }
}
</script>
