<template>
<div class="row mt-2">
    <img src="assets/img/mintme.png" class="rounded float-right" style="width:8%;height:8%" alt="mintme">
    <div class="mt-1 ml-2">
        {{noNotation(mintmeEthVaule)}} ETH
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            mintmeEthVaule: '',
        }
    },
    mounted() {
        axios.get('/mintme/vs/eth')
            .then(res => {
                this.mintmeEthVaule = res.data;
            })
            .catch(err => {
                console.error(this.mintmeEthVaule);
            })
    },
    methods:{
        noNotation(x) {
          if (Math.abs(x) < 1.0) {
            var e = parseInt(x.toString().split('e-')[1]);
            if (e) {
                x *= Math.pow(10,e-1);
                x = '0.' + (new Array(e)).join('0') + x.toString().substring(2);
            }
          } else {
            var e = parseInt(x.toString().split('+')[1]);
            if (e > 20) {
                e -= 20;
                x /= Math.pow(10,e);
                x += (new Array(e+1)).join('0');
            }
          }
          return x;
        }
    }
}
</script>
