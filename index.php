
<?php
ini_set('memory_limit', '-1');

use Discord\Discord;
use React\Http\Browser;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;
use Psr\Http\Message\ResponseInterface;
use React\EventLoop\Factory;

include 'vendor/autoload.php';
$loop = Factory::create();
$discord = new Discord([
    'token' => 'token a ser gerado no discord for developers',
    'loop' => $loop,
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    // Listen for messages.
    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        echo "{$message->author->username}: {$message->content} ", PHP_EOL;
        if (strtolower($message->content) == '!andamento') {
            $message->reply("Link da Planilha :");
            $message->reply("link");
        }
    });
});


$discord->run();

// $discord->on('ready', function (Discord $discord) {
//     foreach ($discord->guilds as $guild) {
//         echo "Guild: {$guild->name} (" . $guild->members->count() . " membros)" . PHP_EOL;
//         echo "Channels: " . PHP_EOL;
//         foreach ($guild->channels as $channel) {
//             echo "\t\t{$channel->name}" . PHP_EOL;
//         }
//         echo "Membros: " . PHP_EOL;
//         foreach ($guild->members as $member) {;
//             echo "\t\t{$member->user->username}" . PHP_EOL;
//         }
//     }
// });
// $discord->on('message', function (Message $message, Discord $discord) use ($browser) {
//     if (strtolower($message->content) == 'andamento') {
//         $message->reply('teste de mensagem');
//     }
// });
