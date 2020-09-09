<table class="table table-hover">
  <tr>
      <th>ID</th>
      <th>Package Name</th>
      <th>User</th>
      <th>Total</th>
      <th>Status</th>
  </tr>
  <tr>
      <td>{{ $model->id }}</td>
      <td>{{ $model->company_package->package_name }}</td>
      <td>{{ $model->user->name }}</td>
      <td>{{ $model->transaction_total}}</td>
      <td>{{ $model->transaction_status }}</td>
  </tr>
</table>
{!! Form::model($model, [
  'route' => $model->exists ? ['companyTransaction.update', $model->id] : 'companyTransaction.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group row">
  <label class="col-sm-12 col-md-12 "> <B>Update Status Pembayaran</B></label>
  <div class="input-group">
    <div class="col-sm-12 col-md-12">
      <select class="form-control custom-select selectric @error('transaction_status') is-invalid @enderror" name="transaction_status" id="transaction_status">
       @if ($model->exists)
       <option value="{{ $model->transaction_status }}" selected>Status. Pembayaran: {{  $model->transaction_status}}</option>
       @else
       <option value="" selected disabled>~ Choose Package ~</option>
       @endif
       <option value="Success">Success</option>
       <option value="Pending">Pending</option>
       <option value="Expired">Expired</option>
       <option value="Failed">Failed</option>
      </select>
    </div>
  </div>
</div>
{!! Form::close() !!}
