<a href="{{ route('provider.show', $provider_id) }}" class="btn btn-info btn-sm">
  <i class="fa fa-eye"></i></a>

<button class="btn btn-primary btn-sm"
  data-idprovider="{{$provider_id}}"
  data-nameprovider="{{$name}}"
  data-lastnameprovider="{{$lastname}}"
  data-phone1provider="{{$phone1}}"
  data-phone2provider="{{$phone2}}"
  data-emailprovider="{{$email}}"
  data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>

  <a provider_id="{{ $provider_id }}" class="btn btn-danger btn-sm status-provider">
      <span class="fa fa-trash"></span>
  </a>
