@extends('layaouts.master')

@section('title', 'Продукты')

@section('content')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Управление <b>продуктами</b></h2>
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
                <th>Каталог</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Цена акции</th>
                <th>Начало акции</th>
                <th>Конец акции</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($products as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->getCatalog->title }}</td>
                <td>{{ $value->getCategory->title }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->promoprice }}</td>
                <td>{{ $value->promostart }}</td>
                <td>{{ $value->promoend }}</td>

                <td>
                    <a href="#editEmployeeModal" class="edit" data-id="{{ $value->id }}" data-catalogid="{{ $value->catalog_id }}" data-categoryid="{{ $value->category_id }}" data-title="{{ $value->title }}" data-price="{{ $value->price }}" data-promoprice="{{ $value->promoprice }}" data-promostart="{{ $value->promostart }}" data-promoend="{{ $value->promoend }}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
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
            <form action="{{ route('products.store') }}" method="POST">
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
                    <div class="form-group">
                        <label>Каталог</label>
                        <select name="catalog_id" id="catalogSelect" class="form-control" required>
                            <option disabled selected value> -- выберите каталог -- </option>
                            @foreach ($catalogs as $value)
                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" id="categorySelect" class="form-control" required>
                            <option disabled selected value> -- выберите каталог -- </option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Цена</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Цена акции</label>
                        <input type="text" name="promoprice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Начало акции</label>
                        <input type="date" name="promostart" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Конец акции</label>
                        <input type="date" name="promoend" class="form-control" required>
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
            <form action="{{ route('products.update') }}" method="POST">
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
                    <div class="form-group">
                        <label>Каталог</label>
                        <select name="catalog_id" id="catalogSelect2" class="form-control" required>
                            <option disabled selected value> -- выберите каталог -- </option>
                            @foreach ($catalogs as $value)
                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" id="categorySelect2" class="form-control" required>
                            <option disabled selected value> -- выберите каталог -- </option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Цена</label>
                        <input type="text" name="price" id="updatePrice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Цена акции</label>
                        <input type="text" name="promoprice" id="updatePromoprice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Начало акции</label>
                        <input type="date" name="promostart" id="updatePromostart" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Конец акции</label>
                        <input type="date" name="promoend" id="updatePromoend" class="form-control" required>
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

        $('#catalogSelect').change(function () {
            var id = this.value;
            $.ajax({
                type: 'get',
                url: 'getcategory',
                data: {
                    'CatalogId': id
                },
                success: function (data) {
                    var $category = $('#categorySelect');
                    $category.empty();
                    $category.append(data);
                }
            });
        });

        $('#catalogSelect2').change(function () {
            var id = this.value;
            $.ajax({
                type: 'get',
                url: 'getcategory',
                data: {
                    'CatalogId': id
                },
                success: function (data) {
                    var $category = $('#categorySelect2');
                    $category.empty();
                    $category.append(data);
                }
            });
        });

        $(".edit").click(function() {
            document.getElementById("updateId").value = this.getAttribute('data-id');
            document.getElementById("updateTitle").value = this.getAttribute('data-title');
            document.getElementById("updatePrice").value = this.getAttribute('data-price');
            document.getElementById("updatePromoprice").value = this.getAttribute('data-promoprice');
            document.getElementById("updatePromostart").value = this.getAttribute('data-promostart');
            document.getElementById("updatePromoend").value = this.getAttribute('data-promoend');
            // this.getAttribute('data-catalogid')
            // this.getAttribute('data-categoryid')
            // $('#catalogSelect2 option[value="1"]')
        });

        $(".delete").click(function() {
            var id = this.getAttribute('data-id');

            $.ajax({
                type: 'get',
                url: 'deleteproduct',
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
