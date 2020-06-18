<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <form method="post" class="needs-validation">
                        <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                        <div class="card-body">
                            <h5 class="card-title">Create new Category</h5>
                            <h6 class="card-subtitle mb-2 text-muted">this is mr Ahmed Hifny assignment email: <a href="mailto:ahmed.mohmmed.abdelaziz@gmail.com" class="btn btn-sm btn-dark">ahmed.mohmmed.abdelaziz@gmail.com</a></h6>
                            <div class="form-group">
                                <label for="name">category name</label>
                                <input type="text" name="name" class="form-control <?=($validation&&$validation->hasError('name'))?'is-invalid':''?>" id="name" placeholder="category name">
                                <?php if ($validation&&$validation->hasError('name')): ?>
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('name')?>
                                    </div>
                                <? endif; ?>
                            </div>
                                <div class="form-group parent_category" >
                                    <label for="parent_category">parent category</label>
                                    <select class="form-control category" data-stage="0" name="parent" id="parent_category" reqired>
                                    <option value="0">--parent--</option>
                                    <?php foreach($parents as $parent): ?>
                                    <option value="<?=$parent->id?>"><?=$parent->name?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="stage-0"></div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-success">save</button>
                            <a href="<?=base_url('/')?>" class="btn btn-sm btn-danger">cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="<?=base_url('assets/js/main.js')?>"></script>
<?= $this->endSection() ?>