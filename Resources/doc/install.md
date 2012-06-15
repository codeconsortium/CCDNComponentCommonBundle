Installing CCDNComponent CommonBundle 1.0
==========================================

## Dependencies:

No depedencies for this bundle.

## Installation:

Installation takes only 8 steps:

1. Download and install the dependencies.
2. Register bundles with autoload.php.
3. Register bundles with AppKernel.php.  
4. Run vendors install script.
5. Update your app/config/routing.yml
6. Update your app/config/config.yml. 
7. Symlink assets to your public web directory.
8. Warmup the cache.

### Step 1: Download and install the dependencies.
   
Append the following to end of your deps file (found in the root of your Symfony2 installation):

``` ini
[CCDNComponentCommonBundle]
    git=http://github.com/codeconsortium/CommonBundle.git
    target=/bundles/CCDNComponent/CommonBundle

```

### Step 2: Register bundles with autoload.php.

Add the following to the registerNamespaces array in the method by appending it to the end of the array.

``` php
// app/autoload.php
$loader->registerNamespaces(array(
    'CCDNComponent'    => __DIR__.'/../vendor/bundles',
	**...**
));
```

### Step 3: Register bundles with AppKernel.php.  

In your AppKernel.php add the following bundles to the registerBundles method array:  

``` php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
		new CCDNComponent\CommonBundle\CCDNComponentCommonBundle(),
		**...**
	);
}
```

### Step 4: Run vendors install script.

From your projects root Symfony directory on the command line run:

``` bash
$ php bin/vendors install
```

### Step 5: Update your app/config/routing.yml.

In your app/config/routing.yml add:  

``` yml
CCDNComponentCommonBundle:
    resource: "@CCDNComponentCommonBundle/Resources/config/routing.yml"
    prefix: /
```

### Step 6: Update your app/config/config.yml. 

``` yml
#
# for CCDNComponent CommonBundle
#
ccdn_component_common:
    header:
        registration_route: fos_user_registration_register
        login_route: fos_user_security_login
        logout_route: fos_user_security_logout
        account_route: cc_user_account_show
        profile_route: cc_profile_show
        header_bar_links:
            - { bundle: CCDNComponentDashboardBundle, label: 'layout.header_links.dashboard', route: 'cc_dashboard_index' }
            - { bundle: CCDNUserMemberBundle, label: 'layout.header_links.members', route: 'cc_members_index'}
            - { bundle: CCDNForumForumBundle, label: 'layout.header_links.forum', route: cc_forum_index }

```

### Step 7: Symlink assets to your public web directory.

From your projects root Symfony directory on the command line run:

``` bash
$ php app/console assets:install --symlink web/
```

### Step 8: Warmup the cache.

From your projects root Symfony directory on the command line run:

``` bash
$ php app/console cache:warmup
```

## Next Steps.

Installation should now be complete!

If you need further help/support, have suggestions or want to contribute please join the community at [Code Consortium](http://www.codeconsortium.com)

- [Return back to the docs index](index.md).
- [Configuration Reference](configuration_reference.md).
