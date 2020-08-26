<table class="table table-hover">
  <tr>
      <th>ID</th>
      <th>Package Name</th>
      <th>Package Feature</th>
  </tr>
  <tr>
      <td>{{ $model->id }}</td>
      <td>{{ $model->companyPackage->package_name }}</td>
      <td>{{ $model->feature_name }}</td>
  </tr>
</table>