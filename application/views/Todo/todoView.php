<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="bg-light">

    <div class="container mt-4">
        <!-- 01. Content-->
        <h1 class="text-center mb-4">To Do List</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <form id="todo-form" action="<?= site_url('TodoController/store/') ?>" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="task" id="todo-input"
                                    placeholder="Tambah task baru" required>
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group mb-4" id="todo-list">
                            <?php if (!empty($data)): ?>
                                <?php foreach ($data as $item): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="task-text">
                                            <?php if ($item['status'] == '0'): ?>
                                                <del>
                                                    <?php echo $item['List']; ?>
                                                </del>
                                            <?php else: ?>
                                                <?php echo $item['List']; ?>
                                            <?php endif; ?>
                                        </span>
                                        <input type="text" class="form-control edit-input" style="display: none;"
                                            value="<?php echo $item['List']; ?>">
                                        <div class="btn-group">
                                            <form action="<?= site_url('todoController/delete/' . $item['id_List']) ?>" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm delete-btn mr-1"
                                                    name="clear">✕</button>
                                            </form>
                                            <form action="<?= site_url('todoController/update/' . $item['id_List']) ?>" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                <button type="submit" class="btn btn-primary btn-sm edit-btn" aria-expanded="false" name="status" value="0">✎</button>
                                            </form>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
