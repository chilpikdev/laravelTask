<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-tasks">
                </span>Меню</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-folder-close"></span><a href="{{ route('catalogs.index') }}">Каталоги</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-list"></span><a href="{{ route('categories.index') }}">Категория</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-shopping-cart"></span><a href="{{ route('products.index') }}">Проодукты</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
