<?php return function () {
    $dsn = sprintf('%s:host=%s;port=%d;dbname=%s',
        getenv('DB_TYPE'),
        getenv('DB_HOST'),
        getenv('DB_PORT'),
        getenv('DB_NAME'));

    return Yii::createObject(\yii\db\Connection::class, [[
        'dsn' => $dsn,
        'username' => getenv('DB_USER'),
        'password' => getenv('DB_PASS'),
        'charset' => 'utf8',
    ]]);
};
