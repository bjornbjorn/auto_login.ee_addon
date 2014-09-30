# AutoLogin for ExpressionEngine

Will create a link that can be used to auto-login users to an EE site. Useful for linking from e.g. intranets where the user should not be required to login each time.

Install the addon, and create a user to be used for auto login.

Put this in your config:

```
    $config['autologins'] = array(
        array(
            'username' => 'autologinuser',
            'password' => 'autologinpassword'
        )
    );
```

Navigate to Addons -> Modules -> AutoLogin to get the URL for autologin.
