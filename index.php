<?php
require "config.php";
if(isset($_POST['task-desc']) && !empty($_POST['task-desc'])) {
    $task = addslashes($_POST['task-desc']);
    $hour_start = addslashes($_POST['task-hour-start']);
    $hour_finish = addslashes($_POST['task-hour-finish']);

    $sql = "INSERT INTO tasks (`desc`, `hour_start`, `hour_finish`, `hour_add`) values ";
    $sql.= "(:task, :hour_start, :hour_finish, NOW())";

    $sql = $pdo->prepare($sql);
    $sql->bindValue(':task', $task);
    $sql->bindValue(':hour_start', $hour_start);
    $sql->bindValue(':hour_finish', $hour_finish);
    $sql->execute();

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tarefas</title>
    <meta charset="utf-8"/>
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!--bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--custom css-->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
</head>

<body>
    <div class="container" id="task-area">

        <h1>Tasks</h1><br/>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Create Task</h4></div>
                    <div class="panel-body">
                        <form class="form-group" id="form-create-task" method="POST">
                            <div class="task-item">
                            Task Desc.<br/>
                            <input class="form-control" type="textarea" name="task-desc" autofocus/>
                            </div>
                            <div class="task-item">
                            Start<br/>
                            <input class="form-control" name="task-hour-start"  placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}" type="text"/>
                            </div>
                            <div class="task-item">
                            Finish<br/>
                            <input class="form-control" name="task-hour-finish"  placeholder="00:00" pattern="[0-9]{2}:[0-9]{2}" type="text"/>
                            </div>
                            <input id="btn-create-task" type="submit" class="btn btn-lg btn-default" value="Create"/>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--row-->

        <div class="row">
            <div class="col-sm-12">
                <br/><br/>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Task List:<h4></div>
                    <div class="panel-body">
                        <?php
                        $sql = "SELECT * FROM tasks ORDER BY hour_start";
                        $sql = $pdo->query($sql);
                        
                        if($sql->rowCount() > 0) {
                            foreach($sql->fetchAll() as $task):
                            ?>
                                <?php if($task['finish'] == '0'): ?>
                                <div class="wrapper">
                                    <a class="check" href="checkTask.php?id=<?php echo $task['id'];?>"><input type="checkbox" name="check"/></a>
                                    <div class="alert alert-warning task">
                                        <a  href="removeTask.php?id=<?php echo $task['id'];?>" class="close close_unfinished">&times;</a>
                                        <span class="task-name"><?php echo $task['desc'];?></span>
                                        <span class="task-hour"><?php echo date('H:i', strtotime($task['hour_start'])).'-'.date('H:i', strtotime($task['hour_finish']));?></span>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="wrapper">
                                    <a class="check" href="checkTask.php?id=<?php echo $task['id'];?>&u=true"><input type="checkbox" name="check" checked/></a>
                                    <div class="alert alert-success task">
                                        <a  href="removeTask.php?id=<?php echo $task['id'];?>" class="close">&times;</a>
                                        <span class="task-name"><?php echo $task['desc'];?></span>
                                        <span class="task-hour"><?php echo date('H:i', strtotime($task['hour_start'])).'-'.date('H:i', strtotime($task['hour_finish']));?></span>
                                    </div>
                                    <div class="strike"></div>
                                </div>
                                <?php endif;?>
                        <?php
                            endforeach;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div><!--row-->

    </div><!--container-->
</body>
</html>
