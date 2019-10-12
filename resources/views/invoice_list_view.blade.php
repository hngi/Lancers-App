
@extends('layouts.master')  


@section('content')
<section>
             <button style="width: 8rem;
              background-color: #0ABAB5;
              color: #fff;padding: 6px 0;border:0;margin:16px" id="create">Create Invoice</button>
<br>


<span style="margin:16px "><strong>INVOICE</strong></span><br>

<select style="margin: 16px;padding: 4px 16px;border-radius: 5%">
  <optgroup>
    <option value="all">ALL</option>
        <option value="paid">PAID</option>
        <option value="unpaid">UNPAID</option>


  </optgroup>
</select>

<br>
<div style="align-content: center;padding: 48px;">
<table style="max-width:80%;align-self: center">
  <tr>
<td><b>Invoice</b></td>
<td><b>Client</b></td>
<td><b>Project</b></td>
<td><b>Issued</b></td>
<td><b>Status</b></td>
<td><b>Amount</b></td>

  </tr>

  @foreach($projects as $project)

<tr style="border: 1px solid lightgray;padding-top: 16px ">
<td>2</td>
<td>{{$project["client_name"]}}</td>
<td>{{$project["title"]}}</td>
<td>{{$project->invoice["issue_date"]}}</td>
<td>{{$project->invoice["status"]}}</td>
<td>{{$project->invoice["amount"]}}</td>

  </tr>

  @endforeach
</table>
</div>
  </section>
@endsection