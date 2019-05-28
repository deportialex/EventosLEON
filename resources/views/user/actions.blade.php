<button class="btn btn-primary btn-sm"
  data-iduser="{{$id}}"
  data-nameuser="{{$name}}"
  data-emailuser="{{$email}}"
  data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>

<a class="btn btn-danger btn-sm" onclick="add( {{ $id }} );" data-id="{{$id}}">
  <i class="fa fa-trash"></i></a>
