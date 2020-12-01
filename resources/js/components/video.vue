<template>
    <div class="">
        <div class="flex-video">
        	<video width="210" height="157.5" controls="">
        		<source :src="link" type="video/mp4">
        	</video>
        </div>   
      <div class="caption">
        <p>
            <button
                class="btn btn-primary"
                @click="getShortLink()"
                >
                    Get link
            </button>

            <span id="le" >
                {{ shortLinkUpadted }}
            </span>
            <button id="copyBtn"
                v-show="le"
                class="btn btn-success"
                v-clipboard:copy="shortLinkUpadted"
                v-clipboard:success="onCopy"
                v-clipboard:error="onError"
                >
                    {{ copyStatus }}
            </button>
            
        </p>
      </div>
    </div>
</template>

<script>
	export default{

		props: [
		'link'
		],
        data(){
            return{
                shortLink: '',
                le: false,
                copyStatus: 'Copy'
            }
        },
        computed:{
            shortLinkUpadted(){
                return this.shortLink
            }
        },
        methods:{
            getShortLink(){
                var data = JSON.stringify({"long_url":"http://knail.cf/"+this.link,"domain":"bit.ly"});
                var config = {
                  method: 'post',
                  url: 'https://api-ssl.bitly.com/v4/shorten',
                  headers: { 
                    'Authorization': 'Bearer 101dc4d7f02d018de99c8845ed81c74f2007abd1', 
                    'Content-Type': 'application/json'
                  },
                  data : data
                };

                axios(config).then((response) => {
                  this.shortLink = response.data.link
                  console.log(this.shortLink)
                  this.le = true
                }).catch((error) => {
                  console.log(error)
                })
            },
            onCopy(){
                this.copyStatus = "Copied!";
            },
            onError() {
              alert('Failed to copy texts')
            }
        }
	};
</script>

<style scoped>
#le{
    display: none;
}
</style>