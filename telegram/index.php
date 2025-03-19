    <?php
      $msg = $_GET['msg'];

      $apiKey      = "1546187071:AAE5iWhxnoaVNV2CbTQPw8am9EHeUYVKJQc";
      $groupChatID = "-341604779";
      $url = "https://api.telegram.org/bot" . $apiKey . "/sendMessage?chat_id=" . $groupChatID . "&text=" . $msg;

      $sendAlert = file_get_contents( $url );
    ?>
