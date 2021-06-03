<!-- Extendemos del Layout Principal -->
<?= $this->extend('layout/main') ?>
<!-- Seccion Titulo -->
<?= $this->section('title') ?>
Lista de Países
<?= $this->endSection() ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/datatables-bulma/css/dataTables.bulma.min.css') ?>">
<?= $this->endSection() ?>
<!-- Seccion Contenido -->
<?= $this->section('content') ?>
<div class="field">
    <a class="button is-dark" href="<?= base_url(route_to('category_create')) ?>">Agregar Nuevo País</a>
</div>
<div class="field has-addons">
    <div class="control">
        <div class="select is-dark">
            <select name="countries" id="country">
                <option value="">Todos</option>
                <?php foreach ($countries as $country):?>
                <option value="<?=$country->name?>"><?=$country->name?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="control">
        <button type="submit" class="button is-dark">Filtro por País</button>
    </div>
</div>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" id="table">
    <thead>
        <tr>
            <th><abbr title="nro">Nro</abbr></th>
            <th><abbr title="name">Nombre</abbr></th>
            <th><abbr title="created_at">Creado</abbr></th>
            <th><abbr title="updated_at">Actualizado</abbr></th>
            <th><abbr title="actions">Acciones</abbr></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><abbr title="nro">Nro</abbr></th>
            <th><abbr title="name">Nombre</abbr></th>
            <th><abbr title="created_at">Creado</abbr></th>
            <th><abbr title="updated_at">Actualizado</abbr></th>
            <th><abbr title="actions">Acciones</abbr></th>
        </tr>
    </tfoot>
    <tbody>
    </tbody>
</table>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables-bulma/jquery/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables-bulma/js/dataTables.bulma.min.js') ?>"></script>
<script>
$(document).ready(function() {
    table = $('#table').DataTable({
        //Traducciones
        language: {
            url: '<?= base_url('/assets/datatables-bulma/translate/spanish.json'); ?>'
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= base_url(route_to('datatables_paises')); ?>',
            //headers: {'<?= csrf_header() ?>':'<?= csrf_hash() ?>'},
            //Si se cambia el método a post descomentar la linea de los header
            method: 'GET',
            //Envió información  
            data: function(data) {
                data.country = $('#country').val();
            },
        },
        lengthMenu: [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        //Orden predeterminado
        order: [
            [1, "asc"]
        ],
        columns: [{
                //Enumera los registros
                data: 'no',
                orderable: false
            },
            {
                data: 'name'
            },
            {
                data: 'created_at',
            },
            {
                data: 'updated_at',
            },
            {
                data: 'action',
                orderable: false,
            },
        ],
    });
    //Captura los cambios del select y recarga la tabla
    $('#country').change(function(event) {
        table.ajax.reload();
    });
});
</script>
<?= $this->endSection() ?>