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
        - { bundle: CCDNComponentDashboardBundle, label: 'layout.header_links.dashboard', route: 'cc_dashboard_index' }
        - { bundle: CCDNUserMemberBundle, label: 'layout.header_links.members', route: 'cc_members_index'}
        - { bundle: CCDNForumForumBundle, label: 'layout.header_links.forum', route: cc_forum_index }
```

The above are examples of links used in CCDN bundles.

- [Return back to the docs index](index.md).
