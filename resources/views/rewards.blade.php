@extends('base')

@section('content')

<div class="fixSummary">
  <div class="pure-g">
    <div class="pure-u-2-3">
      {{ trans('rewards.outstanding_balance') }} : $ <span>@{{ currentBalance | numberWithComma }}</span>
    </div>
    <div class="pure-u-1-3">
      <button type="button" name="button" class="pure-button pure-button-primary button-error pull-right" v-on:click="signOut()">Sign-out</button>
    </div>
  </div>
</div>

@if(Auth::user()->hasRole('admin'))
<div class="card" style="margin-top: 4em;">
  <div class="card-container">
    <h4>{{trans('rewards.input.legend')}}</h4>
      <input id="optDeposit" type="radio" name="recordType" value="1" v-model="recordType">
      <label for="optDeposit">
          <span></span>Deposit
      </label>
      <input id="optWithdraw" type="radio" name="recordType" value="2" v-model="recordType" checked>
      <label for="optWithdraw">
          <span></span>Withdraw
      </label>
      <div class="input-div">
        <input id="itemDescription" name="itemDescription" v-model="itemDescription" class="itemDescription" type="text" placeholder="{{ trans('rewards.input.itemDescription') }}" value="{{ old('itemDescription') }}">
      </div>
      <div class="input-div">
        <input id="amount" name="amount" v-model="amount" type="number" class="amount" placeholder="0.00" value="{{ old('amount') }}">
      </div>
      <div class="input-div">
        <input id="recordDate" name="recordDate" v-model="recordDate" class="datepicker-here" data-autoClose='true' data-language='en' data-date-format="yyyy-mm-dd" value="{{ old('recordDate') }}"></input>
      </div>
      <button class="pure-button pure-button-primary" v-on:click="saveRecord()">Save</button>
      <div class="error_msg_container" v-if="error_messages">
        <span class="error_msg"> <i class="fa fa-exclamation-circle"></i> @{{ error_messages }}</span>
      </div>
  </div>
</div>
@endif

<div class="card">
  <div class="card-container">
    <h4>{{trans('rewards.history.legend')}}</h4>

    <div class="pure-g transaction-history" v-for="item in rewardList">
      <div class="pure-u-1-3">@{{ item.recordDate | customDate }}</div>
      <div class="pure-u-1-2">@{{ item.item }}</div>
      <div class="pure-u-1-6 @{{ (item.type == 1 ) ? 'deposit' : 'withdraw' }}"><div class=" pull-right">@{{ item.amount | numberWithComma }}</div></div>
    </div>

    <div class="pure-g">
      <div class="pure-u-1-2">
        <button class="pure-button @{{ (previousPageUrl !== null) ? 'pure-button-primary' : 'pure-button-disabled' }}" type="button" name="prevButton" v-on:click="getRewardList(previousPageUrl)">Previous</button>
      </div>
      <div class="pure-u-1-2">
        <button class="pure-button @{{ (nextPageUrl !== null) ? 'pure-button-primary' : 'pure-button-disabled' }} pull-right" type="button" name="nextButton" v-on:click="getRewardList(nextPageUrl)">Next</button>
      </div>
    </div>

  </div>
</div>

@include('footer')

@stop
