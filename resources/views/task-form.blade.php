@extends('layouts.base')

@section('content')
<h1>Assign Deal</h1>
<form action="/savetask" method="post">
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
  <div class="form-group">
    <label for="SubjectId">Subject</label>
    <input type="text" class="form-control" id="SubjectId" name="Subject">
  </div>
  <div class="form-group">
    <label for="DuoDateId">Duo Date</label>
    <input type="date" class="form-control" id="DuoDateId" name="DuoDate">
  </div>
  <div class="form-group">
    <label for="ContactsId">Contacts</label>
    <select class="form-control" id="ContactsId" name="Contacts">
      @foreach ($ContactsCollection->data as $Contact)
        <option value="{{ $Contact->id }}">{{ $Contact->Full_Name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="DealId">Deal</label>
    <select class="form-control" id="DealId" name="Deal">
      @foreach ($DealCollection->data as $Deal)
        <option value="{{ $Deal->id }}">{{ $Deal->Deal_Name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="StatusId">Status</label>
    <select class="form-control" id="StatusId" name="Status">
      <option value="Deferred">Deferred</option>
      <option value="Not Started">Not Started</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
@stop
