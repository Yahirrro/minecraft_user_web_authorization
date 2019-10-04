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
        <div class="col-md-3">
            <label for="Username">ユーザーID (Username)</label>
            <input id="Username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="submit">
            <img src="https://minotar.net/avatar/user/" alt="">

        </div>
        <div class="col-md-9">

        </div>
    </div>
</main>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- FontAwesome -->
<script defer="" src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>


<script type="text/javascript">
    $("#Username").keyup(function(){
        var val = $(this).val();
        $("#output").html('<img width="50" src="https://minotar.net/helm/' + val + '" alt="">' + val + '<small>さん</small>');
        $(function(){
            $.getJSON("../json/sample.json", function(sample_list){
                for(var i in sample_list){
                    var h = '<dt>'
                        + sample_list[i].list
                        + '</dt>'
                        + '<dd>'
                        + sample_list[i].content
                        + '</dd>';
                    $("dl#wrap").append(h);
                }
            });
        });
    });
</script>


</body>
</html>