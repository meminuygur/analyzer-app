<!DOCTYPE html>

<head>
    <title>Phrase Analyser</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>


<div class="container">

    <h2>Phrase Analyser</h2>

    <div class="panel pane-default">

        <div class="panel-body">
            <form action="/phrase.php" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="text" value="<?php echo @$stats->getPhrase(); ?>" />
                </div>
            </form>
            <?php
                $letters =  array_filter(str_split($stats->getPhrase()));
            ?>
            <?php if( $stats->getPhrase()): ?>
            <div class="table">

                <table class="table table-condensed table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Character Symbol</th>
                            <th>Character Encountered</th>
                            <th>Character Info</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach( $letters as $letter ) :?>
                            <?php if( $letter != ' '): ?>

                                <tr>
                                    <td><?php echo $letter ?></td>
                                    <td><?php echo $stats->getCountValue($letter) ?></td>
                                    <td>
                                        <span class="label label-default">Before :: <?php echo $stats->getBeforeChars($letter) ? implode(', ',$stats->getBeforeChars($letter)) : 'none' ?></span>
                                        <span class="label label-default">After :: <?php echo $stats->getAfterChars($letter) ? implode(', ',$stats->getAfterChars($letter)) : 'none' ?></span>
                                        <?php if($stats->getMaxDistance($letter)) :?>
                                            <span class="label label-default">Longest Distance :: <?php echo  $stats->getMaxDistance($letter) ?></span>
                                        <?php endif ?>
                                    </td>
                                </tr>

                                <?php else: ?>

                                <tr class="danger">
                                    <td colspan="3" class="text-center">EMPTY ROW</td>
                                </tr>

                            <?php endif;?>

                        <?php endforeach;?>

                    </tbody>

                </table>

            </div>

            <?php endif; ?>

        </div>

    </div>


</div>

</body>
</html>