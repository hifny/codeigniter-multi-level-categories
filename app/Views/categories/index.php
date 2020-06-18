<?= $this->extend('default') ?>
<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories 
                        <a href="<?=base_url('categories/create')?>" class="btn btn-success"> create category</a>
                        </h5>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">lineage</th>
                                <th scope="col">created at</th>
                                <th scope="col">updated at</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($parents as $parent): ?>
                                <tr>
                                    <th scope="row"><?=$parent->id?></th>
                                    <td><?=$parent->name?></td>
                                    <?php if(!$parent->parent): ?>
                                    <td>--parent--</td>
                                    <?php else:?>
                                    <td><?=parent($parent->parent)->name ?></td>
                                    <?php endif;?>
                                    <td><?=$parent->created_at?></td>
                                    <td><?=$parent->updated_at?></td>
                                </tr>
                                <?=children_row($parent->id)?>
                            <? endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>