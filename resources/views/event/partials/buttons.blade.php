<a href="{{ route('event.show', $event_id) }}" class="btn btn-info btn-sm">
  <i class="fa fa-eye"></i></a>

<button class="btn btn-primary btn-sm"
  data-idprovider="{{$event_id}}"
  data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>

  <a provider_id="{{ $event_id }}" class="btn btn-danger btn-sm status-provider">
      <span class="fa fa-trash"></span>
  </a>
