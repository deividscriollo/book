require_once 'smsapi/Autoload.php';

$client = new \SMSApi\Client('login');
$client->setPasswordHash( ('Haslo_API_w_md5') );

$smsapi = new \SMSApi\Api\SmsFactory();
$smsapi->setClient($client);

try {

    $actionSend = $smsapi->actionSend();

    $actionSend->setTo('600xxxxxx'); // Numer odbiorcy w postaci 48xxxxxxxxx lub xxxxxxxxx
    $actionSend->setText('Treść wiadomości w UTF-8');
    $actionSend->setSender('Nazwa Nadawcy'); // Nazwa musi zostać pierw dodana przez panel, wpisując ECO zostanie wysłana wiadomość ECO

    $response = $actionSend->execute();

    foreach( $response->getList() as $status ) {
        echo  $status->getNumber() . ' ' . $status->getPoints() . ' ' . $status->getStatus();
    }
} catch ( \SMSApi\Exception\SmsapiException $e ) {
    echo 'ERROR: ' . $e->getMessage();
}