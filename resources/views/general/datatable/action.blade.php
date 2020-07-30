@if($actionData['icon'] && $actionData['text'])
    @if($actionData['view'])
        <a href="{{ route($actionData['viewUrl'], $id) }}" class="btn btn-success">
            <i class="{{$actionData['viewIcon']}}"> View</i>
        </a>
    @endif

    @if($actionData['edit'])
        <a href="{{ route($actionData['editUrl'], $id) }}" class="btn btn-primary">
            <i class="{{$actionData['editIcon']}}"> Edit</i>
        </a>
    @endif

    @if($actionData['delete'])
        <a href="{{ route($actionData['deleteUrl'], $id) }}" class="btn btn-danger">
            <i class="{{$actionData['deleteIcon']}}"> Delete</i>
        </a>
    @endif

@elseif($actionData['icon'])
    @if($actionData['view'])
        <a href="{{ route($actionData['viewUrl'], $id) }}" class="btn btn-success">
            <i class="{{$actionData['viewIcon']}}"></i>
        </a>
    @endif

    @if($actionData['edit'])
        <a href="{{ route($actionData['editUrl'], $id) }}" class="btn btn-primary">
            <i class="{{$actionData['editIcon']}}"></i>
        </a>
    @endif

    @if($actionData['delete'])
        <a href="{{ route($actionData['deleteUrl'], $id) }}" class="btn btn-danger">
            <i class="{{$actionData['deleteIcon']}}"></i>
        </a>
    @endif
@else
    @if($actionData['view'])
        <a href="{{ route($actionData['viewUrl'], $id) }}" class="btn btn-success">
            View
        </a>
    @endif

    @if($actionData['edit'])
        <a href="{{ route($actionData['editUrl'], $id) }}" class="btn btn-primary">
            Edit
        </a>
    @endif

    @if($actionData['delete'])
        <a href="{{ route($actionData['deleteUrl'], $id) }}" class="btn btn-danger">
            Delete
        </a>
    @endif
@endif

