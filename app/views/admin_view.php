
<div class="col-md-10 col-md-offset-1">
    <?php
    foreach ($data['data'] as $task) {
        $id = $task['id'];
        $image = $task['image'];
        $name = $task['name'];
        $text = $task['text'];
        $email = $task['email'];
        $is_done = $task['is_done'];
        $is_done_text='';
        if ($is_done) {
            $is_done_text = 'is_done';
        }
        echo "<button class='task_conteiner admin_decoration block_decoration $is_done_text' data-toggle='modal' data-target='#myAdminModal'>";
        echo <<<HTML
<div class="table-responsive">
    <span class="hidden admin-is-done">$is_done</span>
    <span class="hidden admin-id">$id</span>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Icon</th>
            <th>Name</th>
            <th>Email</th>
            <th>Text</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <div class="block-logo">
                    <img id="admin-image" class="block-logo-img" src="/$image"/>
                </div>
            </td>
            <td class="admin-name">$name</td>
            <td class="admin-email">$email</td>
            <td class="admin-text">$text</td>
        </tr>
    </table>
</div>
HTML;
        echo '</button>';
    }

    if (isset($data['page'])){
        $page=$data['page'];
    }
    echo <<<HTML
<div class='modal fade' id='myAdminModal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>";    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-lg-8 col-lg-offset-2">
                <form id="change-form" class="block_decoration" action="/admin/create/" method="post">
                    <input type="text" name="page" class="hidden" value='$page'>
                    <input type="text" name="id" id="admin-id" class="hidden">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <p name="name" class="form-control" id="admin-name"></p>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <p name="email" class="form-control" id="admin-email"></p>
                    </div>
                    <div class="form-group">
                        <label for="admin-text">Task</label>
                        <textarea class="form-control" name="text" rows="5" id="admin-text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="is_done">Is done?</label>
                        <input type="checkbox" name="is-done" id="admin-is-done">
                    </div>
                    <div class="form-group clearfix">
                        <button type="submit" class="btn btn-success pull-right" id="change">Change task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
HTML;
    ?>
    <?php
    //pagination
    if ($data['pagination']){
        $page=$data['page'];
        $previos_page=$page-1;
        $next_page=$page+1;
        echo '<nav aria-label="Page navigation">';
        echo '<ul class="pagination">';
        if ($data['page']>1){
            echo "<li><a href='/admin/index/$previos_page' aria-label='Previous'>";
            echo '<span aria-hidden="true">&laquo;</span>';
            echo '</a></li>';
        }
        for ($i=1;$i<=$data['count_of_page'];$i++) {
            echo '<li';
            if ($i==$data['page']){
                echo ' class="active"';
            }
            echo '><a href="/admin/index/'.$i.'">'.$i.'</a></li>';
        }
        if ($data['page']<$data['count_of_page']){
            echo "<li><a href='/admin/index/$next_page' aria-label='Next'>";
            echo '<span aria-hidden="true">&raquo;</span>';
            echo '</a></li>';
        }
        echo '</ul></nav>';
    }
    ?>
</div>
</div>
