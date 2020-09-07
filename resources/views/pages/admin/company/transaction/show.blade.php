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