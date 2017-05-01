<div class="row">
    <div class="col-md-4">
        <form id="create-form" class="block_decoration" action="/create/" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Ivan">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Example@exam.ple">
            </div>
            <div class="form-group">
                <label for="text">Task</label>
                <textarea class="form-control" name="text" rows="5" id="text" placeholder="The content of your task..."></textarea>
            </div>
            <div class="form-group">
                <label for="image">Task icon</label>
                <input type="file" name="image" class="form-control" id="image"  onchange="PreviewImage();" accept="image/jpeg,image/gif,image/png">
            </div>
            <div class="form-group clearfix">
                <button type="button" class="btn btn-success pull-left" id="preview" data-toggle="modal" data-target="#myModal">Preview</button>
                <button type="submit" class="btn btn-success pull-right" id="create">Add new task</button>
                <div class="error-box hidden" id="submit-all-error-box"></div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-2 col-md-offset-1">
                <a type="button" class="btn <?php echo ($data['sort']==0)?'btn-warning':'btn-success';?> sort-button" href="/main/sortemail/">Email sort</a>
            </div>
            <div class="col-md-2 col-md-offset-2">
                <a type="button" href="/main/sortcreation/" class="btn <?php echo ($data['sort']==1)?'btn-warning':'btn-success';?> sort-button">Creation sort</a>
            </div>
            <div class="col-md-2 col-md-offset-2">
                <a type="button" href="/main/sortstatus/" class="btn <?php echo ($data['sort']==2)?'btn-warning':'btn-success';?> sort-button">Status sort</a>
            </div>
        </div>
        <?php
            foreach ($data['data'] as $task){
                $image = $task['image'];
                $name = $task['name'];
                $text = $task['text'];
                $email = $task['email'];
                $is_done = '';
                if ($task['is_done']){
                    $is_done = 'is_done';
                }
                echo "<div class='task_conteiner block_decoration $is_done'>";
                echo <<<HTML
<div class="table-responsive">
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
                    <img class="block-logo-img" src="/$image"/>
                </div>
            </td>
            <td>$name</td>
            <td>$email</td>
            <td>$text</td>
        </tr>
    </table>
</div>
HTML;
               echo '</div>';
            }
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
                echo "<li><a href='/main/index/$previos_page' aria-label='Previous'>";
                echo '<span aria-hidden="true">&laquo;</span>';
                echo '</a></li>';
            }
            for ($i=1;$i<=$data['count_of_page'];$i++) {
                echo '<li';
                if ($i==$data['page']){
                    echo ' class="active"';
                }
                echo '><a href="/main/index/'.$i.'">'.$i.'</a></li>';
            }
            if ($data['page']<$data['count_of_page']){
                echo "<li><a href='/main/index/$next_page' aria-label='Next'>";
                echo '<span aria-hidden="true">&raquo;</span>';
                echo '</a></li>';
            }
            echo '</ul></nav>';
        }
        ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Task preview</h4>
            </div>
            <div class="modal-body block_decoration modal_decoration">
                <div class="table-responsive">
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
                                    <img class="block-logo-img" id="preview-image"/>
                                </div>
                            </td>
                            <td id="preview-name"></td>
                            <td id="preview-Email"></td>
                            <td id="preview-text"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>