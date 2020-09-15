<table class="table table-hover">
  <tr>
      <th>ID</th>
      <th>Category</th>
      <th>SubCategory Name</th>
  </tr>
  <tr>
      <td>{{ $model->id }}</td>
      <td>{{ $model->category->category_name }}</td>
      <td>{{ $model->subcategory_name }}</td>
  </tr>
</table>