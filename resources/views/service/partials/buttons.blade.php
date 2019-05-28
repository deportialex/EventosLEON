<a href="{{ route('service.show', $service_id) }}" class="btn btn-info btn-sm">
  <i class="fa fa-eye"></i></a>

<button class="btn btn-primary btn-sm"
  data-idservice="{{$id}}"
  data-service_name="{{$name}}"
  data-description="{{$description}}"
  data-cost="{{$cost}}"
  data-provider_id="{{$provider_id}}"
  data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>

  <a service_id="{{ $service_id }}" class="btn btn-danger btn-sm status-service">
      <span class="fa fa-trash"></span>
  </a>
