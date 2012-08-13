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
        account_route: ccdn_user_user_account_show
        profile_route: ccdn_user_profile_show
        header_bar_links:
            - { bundle: CCDNComponentDashboardBundle, label: 'ccdn_component_dashboard.layout.header_links.dashboard', route: 'ccdn_component_dashboard_index' }
            - { bundle: CCDNUserMemberBundle, label: 'ccdn_user_member.layout.header_links.members', route: 'ccdn_user_member_index'}
            - { bundle: CCDNForumForumBundle, label: 'ccdn_forum_forum.layout.header_links.forum', route: ccdn_forum_forum_index }

```

- [Return back to the docs index](index.md).
