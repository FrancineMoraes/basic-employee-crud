<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">@isset($title){{$title}}@endisset</h4>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
	Você clicou em deletar o item @isset($item) {{$item}} @endisset <br> Você tem certeza que deseja executar essa ação?
</div>
<div class="modal-footer">
	<form action="{{(isset($route)? $route : '')}}" method="post">
		 {{method_field('delete')}}
         {{csrf_field()}}
		<button type="submit" class="btn btn-success">Sim</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
	</form>
</div>