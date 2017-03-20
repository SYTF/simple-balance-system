<template lang="html">
  <div class="SiteHeader">
      <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
              <strong>{{ account_name }}</strong>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 text-right">
              <button type="button" name="button" class="btn btn-danger" @click="logout">Logout</button>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data: function() {
        return {
            'account_name' : null
        }
    },
    mounted: function(){
        this.account_name = 'Simon Yeung';
    },
    methods: {
        logout: function(){
            var self = this;
            this.$http.post('logout').then( (response) => {

            }, (response) => {
                self.$router.push('/');
            });
        },
    }
}
</script>

<style scope>
    .SiteHeader {
        padding: 1rem;
        background-color: rgba(255, 255, 255, 0.8);
        color: #333333;
    }
</style>
