CCDNComponent CommonBundle Configuration Reference.
===================================================

All available configuration options are listed below with their default values.

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

- [Return back to the docs index](index.md).
