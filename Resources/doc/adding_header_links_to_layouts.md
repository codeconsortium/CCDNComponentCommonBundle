Adding Header Links To Layouts.
===============================

If you wish to add a link to the header links in the default template of the common bundle, then you can  add something like this to your app/config.

Just specify the fully qualified bundle name, a label to be translated and a route name for each link you wish to add.

``` yml
#
# for CCDNComponent CommonBundle
#
ccdn_component_common:
    header_bar_links:
        - { bundle: CCDNComponentDashboardBundle, label: 'ccdn_component_dashboard.layout.header_links.dashboard', route: 'ccdn_component_dashboard_index' }
        - { bundle: CCDNUserMemberBundle, label: 'ccdn_user_member.layout.header_links.members', route: 'ccdn_user_member_index'}
        - { bundle: CCDNForumForumBundle, label: 'ccdn_forum_forum.layout.header_links.forum', route: ccdn_forum_user_category_index }
```

The above are examples of links used in CCDN bundles.

- [Return back to the docs index](index.md).
