@if($actionData['edit'])
    <a href="{{ route($actionData['editUrl'], $id) }}" class="btn btn-primary"> Edit</a>
@endif

@if($actionData['delete'])
    <a href="{{ route($actionData['deleteUrl'], $id) }}" class="btn btn-danger"> Delete</a>
@endif

@if($actionData['view'])
    <a href="{{ route($actionData['viewUrl'], $id) }}" class="btn btn-success"> View</a>
@endif
