CCDNComponent CommonBundle Configuration Reference.
===================================================

All available configuration options are listed below with their default values.

``` yml
#
# for CCDNComponent CommonBundle
#
ccdn_component_common:               
    service:              
        provider:             
            profile_provider:     
                class:                CCDNComponent\CommonBundle\Component\Provider\Profile\SimpleProfileProvider 
                fallback_avatar:      bundles/ccdncomponentcommon/images/profile/anonymous_avatar.gif 
    header:               
        brand:                
            route:                # 
            label:                Code Consortium 

```

- [Return back to the docs index](index.md).
