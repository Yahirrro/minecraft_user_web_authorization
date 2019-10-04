<?php
include 'encryption_key.php';
?>
<!doctype html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="common/style/design.css">
    <title>Minecraft User Web Authorization</title>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<header class="top">
    <div class="g_logo">
        <img id="logo" src="https://morino.party/wp-content/themes/morinotheme/common/assets/server-icon.png"><h1>Portal</h1>
    </div>
    <div class="container title">
        <h1><i class="fas fa-user-check"></i>認証システム</h1>
        <p>もりのパーティのすべてのサービスをご利用になるためには、認証が必要です。</p>
    </div>
    <img class="user" src="image/Yahirrro.png" alt="">
</header>

<main>
    <div class="container">
        <h2 id="output">ユーザー名を入力してください</h2>
        <div class="row">
            <div class="col-md-6">
                <label for="Username">ユーザーID (Username)</label>
                <div class="input-group mb-3">
                    <input id="Username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="submit">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="submit">確定</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <code id="uuid_token">ここに表示されたコマンドをMinecraft内で打ってください</code>
            </div>
        </div>
    </div>
</main>

<article>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3><span>1.</span>ユーザー名を入力し、確定ボタンを押す</h3>
            </div>
            <div class="col-md-4">
                <h3><span>2.</span>右に表示されるコマンドを発動</h3>
            </div>
            <div class="col-md-4">
                <h3><span>3.</span>完了！</h3>
            </div>
        </div>
    </div>
</article>

<!-- FontAwesome -->
<script defer="" src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>

<script type="text/javascript">

    $("#Username").keyup(function(){
        let val = $(this).val();
        $("#output").html('<img width="50" src="https://minotar.net/helm/' + val + '" alt="">' + val + '<small>さん</small>');
    });
    $("#submit").click(function () {
        let user = $("#Username").val();
        $.getJSON('https://portal.morino.party/token_issuance.php',
            {json: 'true',token: 'sPlrkI*VzxoLEiSL',username: user},
            function (data){
                var command = '/auth ' + data.uuid_token;
                $("#uuid_token").text(command);
            }
        )
    });

</script>



</body>
</html>