# Authentication

Martha\GitHub-API currently provides the ability to authenticate using Access Tokens.

## Access Token Authentication

To authenticate with an access token, the token must be passed in an array to the constructor of the client class: 

```php
<?php

use Martha\GitHub\Client;

$client = new Client(array('access_token' => 'FOO'));
```

All subsequent requests against the API will pass along the `access_token` for authentication purposes. 

## Other Authentication Methods

The plan is to allow for all available authentication methods with GitHub. They will be added at a later date.
If you wish to contribute in this effort, please do so!
