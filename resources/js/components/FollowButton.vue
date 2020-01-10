<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText" />
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        
        mounted() {
            console.log('Component mounted.');
            console.log('status : ' + this.status);
        },
        
        data: function(){
            return {
                status: (this.follows == true) ? true : false
            }
        },

        methods: {
            followUser(){
                axios.post('/follow/' + this.userId)
                    .then(res=> {
                        this.status= !this.status;
                        console.log(res.data);
                    })
                    .catch(errors => {
                        if(errors.response.status == 401){
                            window.location = '/login';
                        }
                    });

            }
        },

        computed: {
            buttonText(){
                return (this.status) ? "Unfollow" : "Follow";
            }
        }
    }
</script>
