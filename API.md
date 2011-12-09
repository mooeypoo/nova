* When a user is created or activated, we need to create an API key for them to use for authentication
* At the same time, that token is inserted into the api\_keys table
* When a user is deleted or deactivated, we need to wipe out that API key from the api\_keys table so they no longer have access
* When a user goes to use something that's protected, the system will need to pass along their API key to verify they're allowed to access that method