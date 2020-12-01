<template>
<div class="row mt-3">
    <img src="assets/img/eth.png" class="rounded float-right" style="width:16%;height:16%" alt="btc">
    <h4 class="mt-3 ml-2">
        ${{formatCurrency(ethValue)}}
    </h4>
</div>
</template>

<script>
export default {
    data() {
        return {
            ethValue: '',
        }
    },
    mounted() {
        axios.get('/eth/vs/usd')
            .then(res => {
                this.ethValue = res.data.ethereum.usd;
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
