
<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link  rel="stylesheet" href="<?=base_url("bootstrap/css/bootstrap.min.css")?>">
    <style>
        .chat-box {
            height: 400px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            padding: 10px;
        }
        .message-left {
            text-align: left;
            background:rgb(78, 255, 107);
            padding: 8px;
            margin: 5px;
            border-radius: 10px;
            display: inline-block;
        }
        .message-right {
            /* text-align: right; */
            background: #0d6efd;
            color: white;
            padding: 8px;
            margin: 5px;
            border-radius: 10px;
            display: inline-block;
        }
        body {
            background:#f3f4f6;
        }
    </style>
</head>
<body class="container mt-4">

    <h3 class="mb-3"><?= $user1_name ?> -> <?= $user2_name ?></h3>

    <div class="chat-box mb-3">
        <?php foreach ($messages as $msg): ?>
            <?php if ($msg['sender_id'] == $user1): ?>
                <div class="d-flex justify-content-end">
                    <div class="message-right">
                        
                        <?= esc($msg['message']) ?> <br><small><?= $msg['created_at'] ?></small>
                        <div class="d-flex gap-1 justify-content-end mb-7">
                            <a href="<?= site_url('chat/edit/'.$msg['id']) ?>" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="<?= site_url('chat/delete/'.$msg['id']) ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Supprimer ce message ?');">Supprimer</a>
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <div class="message-left"><?= esc($msg['message']) ?> <br><small><?= $msg['created_at'] ?></small></div>
            <?php endif; ?>
            <br>
        <?php endforeach; ?>
    </div>

    <form method="post" action="<?= site_url('chat/send') ?>" class="d-flex">
        <input type="hidden" name="sender_id" value="<?= $user1 ?>">
        <input type="hidden" name="receiver_id" value="<?= $user2 ?>">
        <input type="text" name="message" class="form-control me-2" placeholder="Tapez un message...">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

</body>
</html>