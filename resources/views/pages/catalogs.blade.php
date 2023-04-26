@extends('layaouts.master')

@section('title', 'Каталоги')

@section('content')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Управление <b>каталогами</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Добавить новый запись</span></a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($catalogs as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->title }}</td>
                <td>
                    <a href="#editEmployeeModal" class="edit" data-id="{{ $value->id }}" data-title="{{ $value->title }}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#" class="delete" data-id="{{ $value->id }}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('catalogs.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Добавить запись</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Отмена">
                    <input type="submit" class="btn btn-success" name="create" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('catalogs.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h4 class="modal-title">Изменить запись</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" name="title" id="updateTitle" class="form-control" required>
                    </div>
                    <input type="hidden" name="id" id="updateId">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Отмена">
                    <input type="submit" class="btn btn-info" name="update" value="Обновить">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $(".edit").click(function() {
        document.getElementById("updateId").value = this.getAttribute('data-id');
        document.getElementById("updateTitle").value = this.getAttribute('data-title');
        // this.getAttribute('data-catalogid')
        // $('#catalogSelect2 option[value="1"]')
    });

    $(".delete").click(function() {
        var id = this.getAttribute('data-id');

        $.ajax({
            type: 'get',
            url: 'deletecatalog',
            data: {
                'id': id
            },
            success: function (data) {
                location.reload();
            }
        });
    });
});
</script>
@endsection
