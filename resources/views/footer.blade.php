<script type="text/javascript">
new Vue({
  el : "#main-app",
  data : {
    rewardList : null,
    firstPageUrl :  '{{ url('getRewardList?page=1') }}',
    nextPageUrl : '{{ url('getRewardList?page=1') }}',
    previousPageUrl : null,
    token : null,
    // form elements
    recordDate : null,
    recordType : null,
    itemDescription : null,
    amount : null
  },
  methods : {
    getRewardList : function(_url)
    {
      if(!(_url === null)){
        this.$http.get(_url).then((response) => {
          this.rewardList = response.json().data;
          this.nextPageUrl = response.json().next_page_url;
          this.previousPageUrl = response.json().prev_page_url;
        });
      }
    },
    saveRecord : function(){
      this.$http.post('{{ url('/rewards') }}', { 'recordType':this.recordType, 'itemDescription':this.itemDescription, 'amount':this.amount, 'recordDate':this.recordDate }, {headers : {'X-CSRF-TOKEN': document.querySelector('#csrf_token').getAttribute('content')}})
        .then((response) => {
          this.amount = this.itemDescription = null;
          this.getRewardList(this.firstPageUrl);
        }, (response) => {
          var errMsg = response.json();
        });
        return false;
    },
    signOut : function()
    {
      this.$http.post('{{ url('/logout') }}', null, { headers : {'X-CSRF-TOKEN': document.querySelector('#csrf_token').getAttribute('content')} })
        .then(null, (response) => {
          window.location.href='{{ url('') }}';
        });
    }
  },
  ready : function () {
    this.getRewardList(this.nextPageUrl);
  }
});

Vue.filter('customDate', function(value){
  var _date_arr = value.split(/[- :]/);
  var _date = new Date(_date_arr[0], _date_arr[1], _date_arr[2], _date_arr[3], _date_arr[4], _date_arr[5]);
  return (_date.getFullYear() + '-' + _date.getMonth() + '-' + _date.getDate())
    .replace(/\d+/g, function(m){
      return "0".substr(m.length - 1) + m;
    });
});
</script>
