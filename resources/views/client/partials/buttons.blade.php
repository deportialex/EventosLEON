<a href="{{ route('client.show', $client_id) }}" class="btn btn-info btn-sm">
  <i class="fa fa-eye"></i></a>

  <button class="btn btn-primary btn-sm"
    data-idclient="{{$id}}"
    data-nameclient="{{$name}}"
    data-lastnameclient="{{$lastname}}"
    data-phone1client="{{$phone1}}"
    data-phone2client="{{$phone2}}"
    data-emailclient="{{$email}}"
    data-prestigeclient="{{$prestige}}"
    data-commentsclient="{{$comments}}"
    data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>

  <a client_id="{{ $client_id }}" class="btn btn-danger btn-sm status-client">
      <span class="fa fa-trash"></span>
  </a>
