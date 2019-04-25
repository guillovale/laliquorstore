<?php

return [
    #'class' => 'yii\db\Connection',
    #'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    #'username' => 'root',
    #'password' => '',
    #'charset' => 'utf8',

	# connection sqlite
	'class' => 'yii\db\Connection',
	'dsn' => 'sqlite:@app/db/liquor.db',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
