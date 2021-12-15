<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ProfilePageBandNetwork</title>
    <link rel="stylesheet" href="resources/views/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/views/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="resources/views/assets/css/styles.min.css">
    <style>
        .connectionListItem {
            border: none;
            color: gray;
            padding: 15px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body style="height: 630px;">
    <div class="container" style="height: 550px;">
        <div class="row" style="height: 550px;">
            <div class="col-md-4 d-md-flex justify-content-md-center align-items-md-center">
                <ul class="navbar-nav">
                    <?php 
                        use Illuminate\Support\Facades\DB;
                        $userId = "samkbplayer212";
                        $connections = DB::select('
                            select C.connId, U.userId, U.imageLink, U.name
                                from MusicianUsers U, Connections C,
                                    (select connId, max(timestamp) as maxTimestamp
                                        from Messages group by connId) as M
                                where (C.userIdOne = ? and C.userIdTwo = U.userId
                                        or C.userIdOne = U.userId
                                            and C.userIdTwo = ?)
                                    and C.connId = M.connId
                                order by M.maxTimestamp desc
                        ', [$userId, $userId]);

                        foreach($connections as $connection) { ?>
                        <li>
                            <a href="#">
                                <div class="connectionListItem">
                                    <?php echo $connection->name; ?>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>