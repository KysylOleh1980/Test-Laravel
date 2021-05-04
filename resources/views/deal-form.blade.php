@extends('layouts.base')

@section('content')
<h1>Create Deal</h1>
<form action="/save" method="post">
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
  <div class="form-group">
    <label for="DealNameId">Deal Name</label>
    <input type="text" class="form-control" id="DealNameId" name="DealName">
  </div>
  <label for="AccountNameId">Account Name</label>
  <select class="form-control" id="AccountNameId" name="AccountName">
    @foreach ($AccountsCollection->data as $Account)
      <option value="{{ $Account->id }}">{{ $Account->Account_Name }}</option>
    @endforeach
  </select>
  <div class="form-group">
    <label for="ExpectedRevenueId">Expected Revenue</label>
    <input type="number" class="form-control" id="ExpectedRevenueId" name="ExpectedRevenue">
  </div>
  <div class="form-group">
    <label for="ClosingDateId">Closing Date</label>
    <input type="date" class="form-control" id="ClosingDateId" name="ClosingDate">
  </div>
 <div class="form-group">
    <label for="AmountId">Amount</label>
    <input type="number" class="form-control" id="AmountId" name="Amount">
  </div>
  <div class="form-group">
    <label for="ProbabilityId">Probability</label>
    <input type="number" class="form-control" id="ProbabilityId" name="Probability">
  </div>
  <div class="form-group">
  <label for="StageId">Stage</label>
  <select class="form-control" id="StageId" name="Stage">
    <option value="Negotiation/Review">Negotiation/Review</option>
    <option value="Closed Won">Closed Won</option>
  </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@stop
