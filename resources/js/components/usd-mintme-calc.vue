<template>
	<div>
        <div class="row mt-2">
            <h4>USD/MINTME Calculator</h4>
        </div>
        <div class="row">
            <form autocomplete="off" v-on:submit.prevent="calculate()">
                <div class="form-group">
                    <label>MINTME amount:</label>
                    <input v-model="amount" type="text" class="form-control" placeholder="Enter amount..."/>
                    <small class="form-text text-muted">Example: 12100 or 12100.1234</small>
                </div>
                <button class="btn btn-outline-light">Calculate</button>
            </form>
        </div>
        <div class="row">
	    	<div v-if="notNumber" class="mt-2 font-weight-bold">Invalid number, please, enter a valid number.</div>
	        <div v-else class="mt-2 font-weight-bold">{{formatCurrency(resultMintme)}} MINTME</div>
        </div>
    </div>
</template>

<script>
	export default{
		data(){
			return {
				amount: '',
				btcValue: '',
				mintmeBtcValue: '',
				resultMintme: 0,
				notNumber: false
			}
		},
		methods:{
			calculate(){

				if (isNaN(this.amount) || this.amount == "") {

					this.notNumber = true

				} else {


					axios.get('/calc/usd/vs/mintme/'+this.amount)
		            .then(res => {
		                this.resultMintme = res.data;
		            })
		            .catch(err => {
		                console.error(err);
		            })
			        this.notNumber = false
					
				}
				
			},
			formatCurrency(x){
            var formatedNumber = new Intl.NumberFormat().format(x)
            return formatedNumber
        	}
		}
	}
</script>