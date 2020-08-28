<table class="table table-hover">
  <tr>
      <th>ID</th>
      <th>Package Name</th>
      <th>Price</th>
  </tr>
  <tr>
      <td>{{ $model->id }}</td>
      <td>{{ $model->package_name }}</td>
      <td>@currency($model->price)</td>
  </tr>
</table>